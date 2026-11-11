<?php
// Conversion HTML -> PDF via Gotenberg (remplace mPDF depuis le 11/11/2026).
// Gotenberg tourne sur Docker1 (10.0.0.96:3005, LAN uniquement, /opt/gotenberg).

if (!defined('GOTENBERG_URL')) {
  define('GOTENBERG_URL', 'http://10.0.0.96:3005');
}

// Échappe une valeur saisie par l'utilisateur avant de l'insérer dans le HTML du PDF.
function pdf_e($valeur)
{
  return htmlspecialchars((string) $valeur, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// Convertit $html en PDF et l'envoie au navigateur.
// $disposition : 'inline' (affichage) ou 'attachment' (téléchargement).
// $options : champs Gotenberg (marginTop, paperWidth, ...), voir la doc de /forms/chromium/convert/html.
function gotenberg_pdf($html, $nom_fichier, $disposition = 'inline', $options = array())
{
  $options = array_merge(array(
    'paperWidth' => '210mm',
    'paperHeight' => '297mm',
    'printBackground' => 'true',
  ), $options);

  $frontiere = '----zelogs' . bin2hex(random_bytes(12));
  $corps = '';
  foreach ($options as $nom => $valeur) {
    $corps .= "--$frontiere\r\n"
      . "Content-Disposition: form-data; name=\"$nom\"\r\n\r\n"
      . $valeur . "\r\n";
  }
  $corps .= "--$frontiere\r\n"
    . "Content-Disposition: form-data; name=\"files\"; filename=\"index.html\"\r\n"
    . "Content-Type: text/html; charset=utf-8\r\n\r\n"
    . $html . "\r\n"
    . "--$frontiere--\r\n";

  $contexte = stream_context_create(array('http' => array(
    'method' => 'POST',
    'header' => "Content-Type: multipart/form-data; boundary=$frontiere\r\n"
      . 'Content-Length: ' . strlen($corps) . "\r\n",
    'content' => $corps,
    'timeout' => 90,
    'ignore_errors' => true,
  )));

  $pdf = @file_get_contents(GOTENBERG_URL . '/forms/chromium/convert/html', false, $contexte);
  $statut = isset($http_response_header[0]) ? $http_response_header[0] : '';

  // on nettoie toute sortie déjà produite avant d'envoyer le PDF
  while (ob_get_level() > 0) {
    ob_end_clean();
  }

  if ($pdf === false || strpos($statut, ' 200') === false || strncmp($pdf, '%PDF', 4) !== 0) {
    error_log('zelogs gotenberg : échec de la conversion (' . ($statut ?: 'pas de réponse') . ') ' . substr((string) $pdf, 0, 300));
    http_response_code(503);
    header('Content-Type: text/plain; charset=utf-8');
    echo "La génération du PDF est momentanément indisponible. Merci de réessayer plus tard.";
    exit;
  }

  header('Content-Type: application/pdf');
  header('Content-Disposition: ' . ($disposition === 'attachment' ? 'attachment' : 'inline') . '; filename="' . $nom_fichier . '"');
  header('Content-Length: ' . strlen($pdf));
  header('Cache-Control: private, max-age=0, must-revalidate');
  echo $pdf;
  exit;
}

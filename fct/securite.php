<?php
// Outils de sécurité communs (ajoutés le 11/11/2026)

// échappement HTML de toute valeur affichée
function e($valeur)
{
  return htmlspecialchars((string) $valeur, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// jeton anti-CSRF lié à la session
function csrf_jeton()
{
  if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
  }
  return $_SESSION['csrf'];
}

function csrf_champ()
{
  return '<input type="hidden" name="csrf" value="' . e(csrf_jeton()) . '">';
}

function csrf_valide()
{
  return isset($_POST['csrf'], $_SESSION['csrf']) && is_string($_POST['csrf']) && hash_equals($_SESSION['csrf'], $_POST['csrf']);
}

// date AAAA-MM-JJ valide, sinon $defaut
function date_valide($date, $defaut = null)
{
  if (!is_string($date)) {
    return $defaut;
  }
  $d = DateTime::createFromFormat('!Y-m-d', $date);
  return ($d && $d->format('Y-m-d') === $date) ? $date : $defaut;
}

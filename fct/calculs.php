<?php

//retourne le nombre de sauts par mois dans l'année demandée
function nbsautsmois($annee)
{
  for($m=1; $m<=12; $m++)
  {
    global $DB_con;

    $sql= $DB_con->query('
    SELECT SUM(nb)
    FROM `Item`
    WHERE MONTH(date)="'.$m.'"
    AND YEAR(date)="'.$annee.'"
    AND membreid="'.$_SESSION['membreid'].'"
    ');
    
    $recap = $sql->fetch();
    $recapsaut[$m]=$recap[0];
    if($recapsaut[$m]<="0"){$recapsaut[$m]="0";}
  }
  return $recapsaut;
}

function date_premier_saut($membreid)
{
    global $DB_con;
  $sql = $DB_con->prepare("SELECT MIN(date)
  FROM `Item`
  WHERE  `membreid` =  :membreid ");
  $sql->bindParam(':membreid', $membreid);
  $sql->execute();
  $data = $sql->fetch();

  if($data[0]=="")
  {
    $data[0]=0;
  }
  $datepremier =$data[0];
  return $datepremier;
}


function date_dernier_saut($membreid)
{
  global $DB_con;
  $sql = $DB_con->prepare("SELECT MAX(date)
  FROM `Item`
  WHERE  `membreid` =  :membreid ");
  $sql->bindParam(':membreid', $membreid);
  $sql->execute();
  $data = $sql->fetch();

  if($data[0]=="")
  {
    $data[0]=0;
  }
  $datedernier =$data[0];
  return $datedernier;
}



function heures_et_minutes($minutes_entree)
{
  $heures = floor($minutes_entree / 60);
  $minutes = $minutes_entree % 60;
  return $heures.'h'.$minutes.'m';
}



function tps_vol($membreid,$annee)
{
  if($annee!=0){$arg1="AND YEAR(date)=".$annee;}ELSE{$arg1="";}
  global $DB_con;
  $sql = '
  SELECT tpsvol, nb
  FROM `Item`
  WHERE  `membreid` =  "'.$membreid.'"
  '.$arg1.'
  ';
  $data = $DB_con->prepare($sql);
  $data ->execute();
  $res= $data->fetchAll();
  $tps=0;
  foreach($res as $ligne)
  {
    $tps=$tps + ($ligne['nb']*$ligne['tpsvol']);
  }
  return $tps;
}

function num_array_ligne($lignes,$date)  //retourne la clé du tableau à la premiere date trouvée après la date donnée (numéro de ligne)
{
  $date = new DateTime($date);
  $key=array_search($date->format('Y-m-d'), array_column($lignes, 'date'));

  while($key===false)
  {
    $date->modify('+1 day');
    //echo $date->format('Y-m-d');
    $key=array_search($date->format('Y-m-d'), array_column($lignes, 'date'));
  }
  return $key;
}

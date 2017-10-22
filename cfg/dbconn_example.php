<?php
//renommer le fichier en dbconn.php
$DB_host = "";
$DB_port = "";
$DB_user = "";
$DB_pass = "";
$DB_name = "";


try
{
	$DB_con = new PDO("mysql:host={$DB_host};port={$DB_port};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->exec("SET CHARACTER SET utf8");
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

//appeler $DB_con contient la connexion à la db

?>

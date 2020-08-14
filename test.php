<?php
// --- Init
$api_user = "02IH62";
$api_secret = "fWb2K77D83KCxEal";
//$sServeur = "http://192.168.0.46/api";										// Local : action=periph.history n'est pas géré en local.
$sServeur = "https://api.eedomus.com";
$urlValue = "$sServeur/get?action=periph.history&periph_id=1942250&start_date=".urlencode('2010-01-01 00:00:00')."&end_date=".urlencode('2030-01-01 00:00:00')."&api_user=".$api_user."&api_secret=".$api_secret;
// --- Associatif, depth=5, renvoyer un array
$sGetAPI = json_decode(utf8_encode(file_get_contents($urlValue)), TRUE, 5, JSON_OBJECT_AS_ARRAY);
 var_dump($sGetAPI);
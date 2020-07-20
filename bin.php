<?php

ini_set('display_errors', 0 );
error_reporting(0);

function apaga1($txt){
  $arquivo3 = fopen($txt, 'w');
  fclose($arquivo3);
}


function cc($bin){
    $data = file_get_contents('https://lookup.binlist.net/'.$bin);

    preg_match('/,"scheme":"([^<]+)","type":/i', $data, $matches);
    $bandeira = $matches[1];

    preg_match('/"type":"([^<]+)","brand":"/i', $data, $matches);
    $tipo = $matches[1];

    preg_match('/"brand":"([^<]+)","country":/i', $data, $matches);
    $marca = $matches[1];

    preg_match('/,"name":"([^<]+)","emoji"/i', $data, $matches);
    $pais = $matches[1];

    preg_match('/"currency":"([^<]+)","latitude"/i', $data, $matches);
    $moeda = $matches[1];

    preg_match('/},"bank":{"name":"([^<]+)","url"/i', $data, $matches);
    $banco = $matches[1];

    preg_match('/","url":"([^<]+)","phone":"/i', $data, $matches);
    $site = $matches[1];

    $name = 'tratado.txt';
    $file = fopen($name, 'a');

    fwrite($file, ucfirst($bandeira));
    fwrite($file, '
💳Cartão -> ');

    fwrite($file, ucfirst($tipo));
    fwrite($file, '
💳Cartão -> ');

    fwrite($file, $marca);
    fwrite($file, '
💳Cartão -> ');

    fwrite($file, $pais);
    fwrite($file, '
💳Cartão -> ');

    fwrite($file, $moeda);
    fwrite($file, '
💳Cartão -> ');

    fwrite($file, $banco);
    fwrite($file, '
💳Cartão -> ');

    fwrite($file, $site);
    fwrite($file, '
💳Cartão -> ');
  fclose($name);
};

apaga1('tratado.txt');


?>

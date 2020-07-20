<?php

//ini_set('display_errors', 0 );
//error_reporting(0);


//So the bot doesnt stop.
set_time_limit(0);
ini_set('display_errors', 'on');

include "envia.php";

// Edit these settings
$chan = "#brazil";
$server = "irc.chknet.eu";
$port = 6667;
$nick = "Xtreme_box";

// STOP EDITTING NOW.
$socket = fsockopen("$server", $port);
fputs($socket,"USER $nick $nick $nick $nick :$nick\n");
fputs($socket,"NICK $nick\n");
fputs($socket,"JOIN ".$chan."\n");

while(1) {
    while($data = fgets($socket, 1024)) {

	$name = 'arquivo.txt';
	$file = fopen($name, 'a');

    //fwrite($file, strstr($data, 'Nome:'));
    fwrite($file, strstr($data, 'RESULTADO DA CONSULTA:'));
    fwrite($file, strstr($data, 'BIN: '));
    fwrite($file, strstr($data, 'APROVADA ✔'));
    fwrite($file, strstr($data, 'SEM VBV ✔ '));
    fwrite($file, strstr($data, 'SEM MSC ✔ '));
    //fwrite($file, strstr($data, ':chkViadex24!'));
    echo($data);
    envia();
	flush();


            $ex = explode(' ', $data);
        $rawcmd = explode(':', $ex[3]);
        $oneword = explode('<br>', $rawcmd);
            $channel = $ex[2];
        $nicka = explode('@', $ex[0]);
        $nickb = explode('!', $nicka[0]);
        $nickc = explode(':', $nickb[0]);

        $host = $server[1];
        $nick = $nick[1];
            if($ex[0] == "PING"){
                fputs($socket, "PONG ".$ex[1]."\n");
            }

        $args = NULL; for ($i = 4; $i < count($ex); $i++) { $args .= $ex[$i] . ' '; }

            if ($rawcmd[1] == "!sayit") {
                fputs($socket, "PRIVMSG ".$channel." :".$args." \n");
            }
        elseif ($rawcmd[1] == "!md5") {
            fputs($socket, "PRIVMSG ".$channel." :MD5 ".md5($args)."\n");
        }

    }
}
?>

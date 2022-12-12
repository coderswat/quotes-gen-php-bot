<?php
/*made by coderswat
for any enquiry contact @coderswat 
demo version of this bot at https://telegram.dog/coderswatqbot */
$api = "https://zenquotes.io/api/random";
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$api);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$get = curl_exec($curl);
curl_close($curl);
$dec = json_decode($get,1);
$quote = $dec[0]['q'];
$author = $dec[0]['a'];
$tex = 'Quote : '.$quote.'

Author : '.$author.'

Bot By @coderswat';
$msg = urlencode($tex);
$input = file_get_contents('php://input');
$update = json_decode($input);
$message = $update->message;
$chatid = $message->chat->id;
$text = $message->text;
$token = "Enter Your Telegram Bot Token Here";
if($text == "/gen"){
botSend($msg,$token,$chatid);
}elseif ($text == "/start") {
  botSend("Hello send /gen to generate quotes",$token,$chatid);
}else{
  botSend("What?",$token,$chatid);
}

function botSend($reply,$token,$chatid){
  file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chatid&text=$reply");
}
?>
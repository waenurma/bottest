<?php

$strAccessToken = "xviohUE+5QdxOT7I4a4GSib8bzX+z9fsAL90nHOyWdzEoDfAXrptOEiThyBV95C3LIYAYB4tmpOVpr+/IXFPMAYfj9t+ziQ167YyiV/0aVDVjTBxfdyRS/lKOhUt0ewSvQQ7FBcOkeKZ3E79QamkKgdB04t89/1O/w1cDnyilFU=";
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/bot/message/reply%22;  
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

/*Return HTTP Request 200*/
http_response_code(200);


// ---------------------------------------------------ส่ง user id---------------------------------------

if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];


// ---------------------------------------------บัตรประชาชน---------------------------------------------

}else if($arrJson['events'][0]['message']['text'] == "1959900506758"){
  $arrPostData = array();
  $data=$arrJson['events'][0]['message']['text'];

  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = strlen($data); //เป็นการนับ
  


// ---------------------------------------------เลขสมาชิก---------------------------------------------

}else if($arrJson['events'][0]['message']['text'] == "1234567890"){
    $arrPostData = array();
    $data=$arrJson['events'][0]['message']['text'];
    $cutstring=substr($data, 5 ,10 ); //เป็นการตัดข้อความ


    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = $cutstring; 
    
  //-------------------------------------------------ตอบตรงคำถาม------------------------------------------

}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";


// --------------------------------------------ตอบกลับที่เราพิมพ์------------------------------------------

}else if($arrJson['events'][0]['message']['text'] == "เหมืนเดิม"){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = $arrJson['events'][0]['message']['text'];

// --------------------------ถ้าข้อความไม่ตรงเงือนไขทั้งหมดจะตอบเงือนไขสุดท้าย----------------------------------

}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "กรอกข้อมูลไม่ถูกต้องกรุณา กรอกข้อมูลใหม่!!!";
}
// -----------------------------------------------------------------------------------------------------
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>


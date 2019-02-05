<?php 
  /*
    LINE Example Webhook v.1
  */
  require 'sendMessage.php';
  require 'LINETypeMessage.php';
  /*Get Data From POST Http Request*/
	$datas = file_get_contents('php://input');
  /*Decode Json From LINE Data Body*/
	$deCode = json_decode($datas,true);
  /*GET Reply Token*/
	$replyToken = $deCode['events'][0]['replyToken'];
  /*Message Type*/
  $messageType = $deCode['events'][0]['message']['type'];
  /*Check Mesage Type Image*/
  if($messageType == 'image'){
    /*Get Content Function*/
    $id = $deCode['events'][0]['message']['id'];
    getContent($id);
  }

  /*Function Write File LOG*/
	file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

  /*Set Reply Token*/
	$dataSendMessage['replyToken'] = $replyToken;

  /*Example TEXT Message*/
  $dataSendMessage['messages'][0] = getFormatTextMessage("ทดสอบ");
  /*Example Sitcker Message*/
	$dataSendMessage['messages'][1] = getFormatStickerMessage(1,1);
  /*Example Image Message*/
  $originalContentUrl = "https://example.com/original.jpg";
  $previewImageUrl = "https://example.com/preview.jpg";
  $dataSendMessage['messages'][2] = getFormatImageMessage($originalContentUrl,$previewImageUrl);
  /*
    Example Video Message
    * OriginalContentURL
    URL of video file (Max: 1000 characters)
    HTTPS
    mp4
    Max: 1 minute
    Max: 10 MB
    * previewImageURL
    URL of preview image (Max: 1000 characters)
    HTTPS
    JPEG
    Max: 240 x 240
    Max: 1 MB
  */
  $originalContentUrl = "https://example.com/original.mp4";
  $previewImageUrl = "https://example.com/preview.jpg";
  $dataSendMessage['messages'][3] = getFormatVideoMessage($originalContentUrl,$previewImageUrl);

  /*Json Encode*/
	$encodeJson = json_encode($dataSendMessage);

  /*Set URL*/
  $functionals['url'] = "https://api.line.me/v2/bot/message/reply";
  $functionals['token'] = getTokenData();

  /*Function Send Message*/
	sentMessage($encodeJson,$functionals);
  /*Return HTTP Request 200*/
	http_response_code(200);

	
?>
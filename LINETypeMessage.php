<?php
	/*Function SET Message Format*/
	function getFormatTextMessage($text)
	{
		$datas = [];
		$datas['type'] = 'text';
		$datas['text'] = $text;

		return $datas;
	}

	/*Function SET Sticker Format*/
	function getFormatStickerMessage($packageId,$stickerId)
	{
		$datas = [];
		$datas['type'] = 'sticker';
		$datas['packageId'] = $packageId;
		$datas['stickerId'] = $stickerId;

		return $datas;
	}

	/*Function SET Image Format*/
	function getFormatImageMessage($originalUrl,$previewImageUrl)
	{
		$datas = [];
		$datas['type'] = 'image';
		$datas['originalContentUrl'] = $originalUrl;
		$datas['previewImageUrl'] = $previewImageUrl;

		return $datas;
	}

	/*Function SET Video Format*/
	function getFormatVideoMessage($originalUrl,$previewImageUrl)
	{
		$datas = [];
		$datas['type'] = 'video';
		$datas['originalContentUrl'] = $originalUrl;
		$datas['previewImageUrl'] = $previewImageUrl;

		return $datas;
	}

	/*Function GET Token*/
	function getTokenData()
	{
		$token = "mHJbIuf7LlUNKYzzGctAgYvSvjemEQCAcSxfCvMT5c+ubYC0VrZ8p6MPogSvvnYHKE3YBM74JKkmBTlTPy/3ZPcYRKMdF1cN2PhXgC5sANgOAC0Hjte0S40RiumBonyRdlXAybCytWDSP0XtnOdnzgdB04t89/1O/w1cDnyilFU=";

		return $token;
	}

	/*Function GET Content*/
	function getContent($id)
	{
		$token = getTokenData();
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.line.me/v2/bot/message/".$id."/content",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Bearer ".$token,
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  	echo "cURL Error #:" . $err;
		} else {
		  	define('UPLOAD_DIR', 'tmp_image/');
		  	$img=base64_encode($response);
			$data = base64_decode($img);
			$file = UPLOAD_DIR . uniqid() . '.png';
			$success = file_put_contents($file, $data);
		}
	}

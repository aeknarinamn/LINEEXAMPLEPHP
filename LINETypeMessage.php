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
		$token = "WMOsQ/4hWzaWxHAtvHw7H36SYWtU2RLT87CeKZk674MrmfcenRwApr+/9BIL1HkuWI9h3e8aDuQ6siofBjQ/rVh49uQEpz8r5It/hnguWF2Vd91lEBWHyQaYuNDvEfkruzMBbLrTXK5cs9wvmKhR/1GUYhWQfeY8sLGRXgo3xvw=";

		return $token;
	}
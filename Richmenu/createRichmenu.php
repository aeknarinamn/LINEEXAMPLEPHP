<?php
	/*Run create richmenu */
	require '../LINETypeMessage.php';

	$token = getTokenData();
	$encodeJson = setFormatCreateRichmenu();

	$curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.line.me/v2/bot/richmenu",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $encodeJson,
      CURLOPT_HTTPHEADER => array(
        "authorization: Bearer ".$token,
        "cache-control: no-cache",
        "content-type: application/json; charset=UTF-8",
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        var_dump($err);
    } else {
    	var_dump($response);
    }

    function setFormatCreateRichmenu()
    {
    	$datas = [];
    	$datas['size']['width'] = 2500;
    	$datas['size']['height'] = 1686;
    	$datas['selected'] = false;
    	$datas['name'] = "Nice richmenu";
    	$datas['chatBarText'] = "Tap here";
    	$datas['areas'][0]['bounds']['x'] = 0;
    	$datas['areas'][0]['bounds']['y'] = 0;
    	$datas['areas'][0]['bounds']['width'] = 2500;
    	$datas['areas'][0]['bounds']['height'] = 1686;
    	$datas['areas'][0]['action']['type'] = "postback";
    	$datas['areas'][0]['action']['data'] = "action=buy&itemid=123";

    	return json_encode($datas);
    }
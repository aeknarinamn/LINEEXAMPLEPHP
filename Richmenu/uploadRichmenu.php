<?php
	/*Run upload image at Richmenu */
	require '../LINETypeMessage.php';

	$token = getTokenData();
	/* Set RichmenuId */
	$richmenuId = "richmenu-5e086e28a41e3234190631a809df2fec";
	/* Image max filesize 1M */
	$file = fopen('image/rich_menu.jpg', 'r');
	$size = filesize('image/rich_menu.jpg');
	$fildata = fread($file,$size);

	$curl = curl_init();

	curl_setopt_array($curl, array(
	    CURLOPT_URL => "https://api.line.me/v2/bot/richmenu/".$richmenuId."/content",
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_BINARYTRANSFER => true,
	    CURLOPT_ENCODING => "",
	    CURLOPT_MAXREDIRS => 10,
	    CURLOPT_TIMEOUT => 30,
	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    CURLOPT_CUSTOMREQUEST => "POST",
	    CURLOPT_POSTFIELDS => $fildata,
	    CURLOPT_INFILE => $file,
	    CURLOPT_HTTPHEADER => array(
	      "authorization: Bearer ".$token,
	      "Cache-Control: no-cache",
	      "Content-Type: image/png",
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
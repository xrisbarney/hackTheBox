<?php

	// //The URL that we want to GET.
	$url = 'http://139.59.202.58:30712';
	$curl = curl_init($url);
	
	curl_setopt($curl, CURLOPT_COOKIE, 'PHPSESSID=12345ABCDE67890');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	$result = curl_exec($curl);

	$regex = '/\w{20}/';
	preg_match($regex,$result,$match);

	$response = httpPost($url,
		array("hash"=>md5($match[0]))
	);

	function httpPost($url, $data){
	    $curl = curl_init($url);
	    curl_setopt($curl, CURLOPT_COOKIE, 'PHPSESSID=12345ABCDE67890');
	    curl_setopt($curl, CURLOPT_POST, true);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($curl);
	    curl_close($curl);
	    return $response;
	}
	echo $response;



?>
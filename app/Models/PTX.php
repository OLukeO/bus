<?php

//https://gist.github.com/ckhung/4558dec03460d34b431e78ce541f36ba

$_SERVER['PTX_ID'] = 'FFFFFFFF-FFFF-FFFF-FFFF-FFFFFFFFFFFF';
$_SERVER['PTX_KEY'] = 'FFFFFFFF-FFFF-FFFF-FFFF-FFFFFFFFFFFF';

$time_string = gmdate('D, d M Y H:i:s').' GMT';
$signature = base64_encode(hash_hmac('sha1', "x-date: $time_string", $_SERVER['PTX_KEY'], true));

$opts = [
    'http' => [
        'method' => 'GET',
        'header' => 'Authorization:hmac username="'.$_SERVER['PTX_ID'].'", algorithm="hmac-sha1", headers="x-date", signature="'."$signature\"\n".
        "x-date:$time_string\n",
        "Accept-Encoding: gzip, deflate\n",
    ],
];

$ret = file_get_contents(
    'http://ptx.transportdata.tw/MOTC/v2/Rail/TRA/Station?$top=5&$format=JSON', false, stream_context_create($opts)
);

echo $ret;

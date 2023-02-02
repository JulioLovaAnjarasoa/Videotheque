<?php

function get_from_api($url)
{
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $url);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $curl_data = curl_exec($curl_handle);
    curl_close($curl_handle);

    return $curl_data;
}

<?php
require_once 'vendor/autoload.php';

use \Dotenv;

class TMDBApi
{
    public $api_key;
    public $api_url;
    public function __construct()
    {
        $this->api_key = $_ENV['API_KEY'];
        $this->api_url = $_ENV['API_URL'];
    }
    public function get_from_api($endpoint, $queries = null)
    {
        if (!is_null($queries)) {
            $queryString = "&";
            foreach ($queries as $query) {
                $queryString .= implode("=", $query);
                $queryString .= "&";
            }
        }

        $url = $this->api_url . '/' . $endpoint . '?api_key=' . $this->api_key . '' . $queryString;
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $curl_data = curl_exec($curl_handle);
        curl_close($curl_handle);

        return $curl_data;
    }
}

<?php

class WebSocket
{

  public function getHostName($url){

    $host = $url;
    $host = str_replace('http://', '', $host);
    $host = str_replace('https://', '', $host);
    $page = $host;
    $hn = explode('/', $host);
    $result['host'] = $hn[0];
    $result['page'] = str_replace($result['host'], '', $page);

    return $result;
  }


  public function getUrl($host, $url){

    $ip_address = gethostbyname($host);

    $client = stream_socket_client("tcp://" . $ip_address . ":80", $errno, $errorMessage);

    if ($client === false) {
        throw new UnexpectedValueException("Failed to connect: $errorMessage");
    }

    $header = "GET " . $url . " HTTP/1.0\r\n";
    $header .= "Host: " . $host . "\r\n";    
    $header .= "User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36\r\n";
    $header .= "Accept: */*\r\n";
    $header .= "Connection: Keep-Alive\r\n\r\n";

    fwrite($client, $header);
    $result = stream_get_contents($client);

    fclose($client);

    return $result;
  }

}

?>

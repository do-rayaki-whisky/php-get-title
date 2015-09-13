<?php

  include('socket.php');
  include('reg.php');

  if(isset($_POST['URL'])){

    $WebService = new WebSocket();
    $regex = new Regex();
    $data = $WebService->getHostName($_POST['URL']);

    $content = $WebService->getUrl($data['host'], $data['page']);
    $title = $regex->getTitleFormHtml($content);

    echo $title;

  } 
?>

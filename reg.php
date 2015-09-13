<?php

class Regex
{

  public function getTitleFormHtml($html_content){

    $pattern = "/<title>(.*)<\/title>/";

    if(preg_match($pattern, $html_content, $matches)){

    	return $matches[1];

    } else {

    	return 'Can not get title.';

    }

  }

 }

?>

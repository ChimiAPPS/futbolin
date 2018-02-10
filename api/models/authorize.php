<?php

class Authorize {

  const AUTH = '481SD-5SI84-SKI1O-AH4J8';

  public static function valid($token){
    if($token == self::AUTH)
      return true;
    else
      return false;
  }

}

?>

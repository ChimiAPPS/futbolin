<?php

require_once('authorize.php');

class API
{
  function __construct(){}

  public static function AccessHeader($server){
    if (isset($server['HTTP_ORIGIN'])) {
      header("Access-Control-Allow-Origin: {$server['HTTP_ORIGIN']}");
      header('Access-Control-Allow-Credentials: true');
      header('Access-Control-Max-Age: 86400');
    }

    if ($server['REQUEST_METHOD'] == 'OPTIONS') {
      if (isset($server['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
      if (isset($server['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$server['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
      exit(0);
    }
  }

  public static function Data($input){
    $data = json_decode($input);
    if(isset($data) && Authorize::valid($data->token))
      return $data;
    else
      return false;
  }

  public static function SendResponse($response, $success=false){
    if($response && !$success)
      $response['authorize'] = true;
    else if(!$response && $success)
      $response = array('authorize' => true);
    else
      $response = array('authorize' => false);

    header('Content-Type: application/json');
    echo json_encode($response);
  }

}

?>

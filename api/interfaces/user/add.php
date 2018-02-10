<?php

require_once('../../models/api.php');
require_once('../../models/user.php');

API::AccessHeader($_SERVER);

$data = API::Data(file_get_contents("php://input"));


if (!$data)
  exit();

if (User::exists($data->user->email)){
  $result = array('created' => false);
  API::SendResponse($result);
}else{
  $user = new User();
  $user->add($data->user);
  $result = array('created' => true);
}

?>

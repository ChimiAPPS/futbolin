<?php

require_once('db.php');

class User{

  private $data = array(
    'id'    => null,
    'alias' => null,
    'name'  => null,
    'email' => null,
    'team'  => null
  );

  function __construct($id = null){
    if(isset($id)){
      $db = new DB();
      $query  = "select alias, name, email, team_id from user where id = $id ";
      $db_res = $db->query($query);
      $row = $db_res->fetch_assoc();
      $this->id = $id;
      $this->alias = $row['alias'];
      $this->name = $row['name'];
      $this->email = $row['email'];
      $this->team = $row['team_id'];
      $db->close();
    }
  }

  public function add($user){
    $db = new DB();
    $alias = $user->alias;
    $name = $user->name;
    $email = $user->email;
    $password = hash('md5', $user->password);
    $query  = "insert into user (alias, name, email, password) ";
    $query .= "values('$alias','$name','$email','$password')";
    $this->id = $db->insert($query);
    $this->alias = $alias;
    $this->name = $name;
    $this->email = $email;
    $db->close();
  }

  public function __get($varName){
    return $this->data[$varName];
  }
    
  public function __set($varName, $value){
    $this->data[$varName] = $value;
  }

  public static function exists($eamil){
    $db = new DB();
    $query  = "select id from user where email = '$eamil' ";
    $db_res = $db->query($query);
    return (mysqli_num_rows($db_res) > 0);
  }
  
}

?>

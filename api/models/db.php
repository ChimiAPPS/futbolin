<?php

class DB {

  private $con;

  function __construct() {
    $this->con = new mysqli('162.241.244.85', 'montregr_futbol', '2}LR=pXI&B}T', 'montregr_futbolin');
  }

  function query($query){
    $result = $this->con->query($query);
    return $result;
  }

  function insert($query){
    $this->con->query($query);
    return $this->con->insert_id;
  }

  function update($query){
    $this->con->query($query);
    return $this->con->affected_rows;
  }

  function result_as_array($result, $columns){
    $array = array();
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $array_item = array();
        foreach ($columns as $column) {
          $array_item[$column] = $row[$column];
        }
        array_push($array, $array_item);
      }
    }
    return $array;
  }

  function close(){
    $this->con->close();
  }

  static function injectionPrevent($value){
    $dangerous_chars = array("'", '"', '\\', '%', '*');
    return str_replace($dangerous_chars, '', $value);
  }

}

?>

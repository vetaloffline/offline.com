<?
class Model_orders extends Model
  { 
    function getallorders($status){
      $query = "SELECT * 
                FROM `HistoryOForders` 
                WHERE status = '$status'";
      return array_reverse($this->db->makeQuery($query));
    }
    function getallstatus(){
      $this->query = "SELECT * 
                      FROM `status`";
      return $this->db->makeQuery($this->query);
    }

  }

?>
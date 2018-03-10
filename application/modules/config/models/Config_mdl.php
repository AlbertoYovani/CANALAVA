<?php
/**
 * Description of Config_mdl
 *
 * @author felipe de jesus
 */
class Config_mdl extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function sqlInsert($table,$data) {
        return $this->db->insert($table,$data);
    }
    public function sqlUpdate($table,$data,$condicion) {
        return $this->db->update($table,$data,$condicion);
    }
    public function sqlDelete($table,$condicion) {
        return $this->db->delete($table,$condicion);
    } 
    public function sqlQuery($query) {
        return $this->db->query($query)->result_array();
    }
    public function sqlGetData($table,$atribute="*") {
        $this->db->select($atribute);
        return $this->db->get($table)->result_array();
    }
    public function sqlGetDataCondition($table,$condicion,$atribute='*') {
        $this->db->select($atribute);
        return $this->db->get_where($table,$condicion)->result_array();
    }
    public function sqlGetLastId($table,$id) {
        $sql= $this->db->select_max($id,'last_id')->get($table)->result_array();
        return $sql[0]['last_id'];
    }
}


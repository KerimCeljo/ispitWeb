<?php
require_once __DIR__."/../dao/MidtermDao.php";

class MidtermService {
    protected $dao;

    public function __construct(){
        $this->dao = new MidtermDao();
    }

    /** TODO
    * Implement service method to return detailed cap-table
    */
    public function cap_table(){
        $results = $this->dao->cap_table();
        return $results;        

    }

    /** TODO
    * Implement service method to add cap table record
    */
    public function add_cap_table_record(){

    }

    /** TODO
    * Implement service method to return list of categories with total shares amount
    */
    public function categories(){
        $results = $this->dao->categories();
        return $results;
    }

    /** TODO
    * Implement service method to delete investor
    */
    public function delete_investor($id){

    }
}
?>

<?php

class MidtermDao {

    protected $conn;

    /**
    * constructor of dao class
    */
    public function __construct(){
        try {

        /** TODO
        * List parameters such as servername, username, password, schema. Make sure to use appropriate port
        */

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $schema = "ispitWeb";

        /*options array neccessary to enable ssl mode - do not change*/
        $options = array(
        	PDO::MYSQL_ATTR_SSL_CA => 'https://drive.google.com/file/d/1g3sZDXiWK8HcPuRhS0nNeoUlOVSWdMAg/view?usp=share_link',
        	PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,

        );



        /** TODO
        * Create new connection
        * Use $options array as last parameter to new PDO call after the password
        */
        $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password, $options);

        // set the PDO error mode to exception
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

    /** TODO
    * Implement DAO method used to get cap table
    */
    public function cap_table(){
      $stmt = $this->conn->prepare("SELECT share_class_id FROM cap_table");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /** TODO
    * Implement DAO method used to add cap table record
    */
    public function add_cap_table_record(){

      $sql = "INSERT INTO cap_table (share_class_id, share_class_category_id, investo_id, diluted_shares, )
    VALUES (:share_class_id, :share_class_category_id, :investo_id, :diluted_shares)";

    $statement = $this->conn->prepare($sql);
/*
    foreach ($data as $dataRow) {

        foreach ($dataRow as $key => $value) {
                $statement->bindValue(":$key", $value);
        }
        
        // Execute the prepared statement (we preped this statement in the foreach above) 
        $statement->execute();

        // Reset the bindings for the next iteration
        $statement->closeCursor();
    }
*/

    }

    /** TODO
    * Implement DAO method to return list of categories with total shares amount
    */
    public function categories(){

      $stmt = $this->conn->prepare("SELECT sc.description, SUM(diluted_shares) AS Total FROM share_class_categories sc JOIN cap_table ct ON sc.id = ct.share_class_category_id GROUP BY sc.description");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /** TODO
    * Implement DAO method to delete investor
    */
    public function delete_investor($id){

    }
}
?>

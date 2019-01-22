<?php
class Users {
    // encapsula
    private $conn;
    private $users;

    public function __construct() {
        require_once("model/dbconnect.php");
        $this->conn=DBConnect::connect();
        $this->users=array();
    }

    public function getUsers() {
        $q=$this->conn->query("select * from employee");

        while($res=$q->fetch(PDO::FETCH_ASSOC)) {
            $this->users[]=$res;
        }

        return $this->users;
    }

    public function getUser($code) {
        $sql="SELECT empcd code, emppwd password, empfnm firstname, emplnm lastname, empnnm nickname, prmdesc profile "
            ."FROM employee, parameters "
            ."WHERE empcd=:code "
            ."AND prmid=5 "
            ."AND empprof=prmcd ";
        $sth=$this->conn->prepare($sql);
        $sth->bindParam(':code', $code, PDO::PARAM_INT);
        $sth->execute();
        $this->users=$sth->fetch(PDO::FETCH_ASSOC);

        // while($res=$sth->fetch(PDO::FETCH_ASSOC)) {
        //     print_r($res);
        //     $this->users[]=$res;
        // }

        return $this->users;
    }
}
?>
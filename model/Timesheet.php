<?php
class Timesheet {
    // encapsula
    private $conn;
    private $worksheets;

    public function __construct() {
        require_once("model/dbconnect.php");
        $this->conn=DBConnect::connect();
        $this->worksheets=array();
    }

    public function getTimesheetsByUser($code, $sdate, $edate) {
        $sql="SELECT empcd code, timdate date, IFNULL(DATE_FORMAT(timin,'%H:%i'),'-') chkin, IFNULL(DATE_FORMAT(timin,'%H:%i'),'-') chkout "
            ."FROM timesheet, employee "
            ."WHERE timempcd=empcd "
            ."AND empcd=:code "
            ."AND timdate BETWEEN :sdate AND :edate "
            ."ORDER BY timdate ";
            // echo $sql."<br>";
        $sth=$this->conn->prepare($sql);

        $sth->bindParam(':code', $code, PDO::PARAM_INT);
        $sth->bindParam(':sdate', $sdate, PDO::PARAM_STR);
        $sth->bindParam(':edate', $edate, PDO::PARAM_STR);
        $sth->execute();

        while($res=$sth->fetch(PDO::FETCH_ASSOC)) {
            $this->worksheets[]=$res;
        }
        // $this->worksheets=$sth->fetch(PDO::FETCH_ASSOC);

        return $this->worksheets;
    }

    public function getTimesheetsCurrent() {
        $sql="select timempcd code, timdate date, timin chkin, timout chkout from timesheet "
            ."where timdate = CURRENT_DATE "
            ."ORDER BY timdate, timempcd";
        $sth=$this->conn->query($sql);

        $sth->execute();

        while($res=$sth->fetch(PDO::FETCH_ASSOC)) {
            $this->worksheets[]=$res;
        }
        // $this->worksheets=$sth->fetch(PDO::FETCH_ASSOC);

        return $this->worksheets;
    }

    // public function getTimesheet($code) {
    //     $sth=$this->conn->prepare('select * from employee where empcd = :code');
    //     $sth->bindParam(':code', $code, PDO::PARAM_INT);
    //     $sth->execute();
    //     $this->users=$sth->fetch(PDO::FETCH_ASSOC);

    //     // while($res=$sth->fetch(PDO::FETCH_ASSOC)) {
    //     //     print_r($res);
    //     //     $this->users[]=$res;
    //     // }

    //     return $this->users;
    // }
}
?>
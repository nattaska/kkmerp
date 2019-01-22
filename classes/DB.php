<?php

// DATABASE connection script  

// database Connection variables
define('HOST', 'localhost'); // Database host name ex. localhost
define('USER', 'kruakroomeuk'); // Database user. ex. root ( if your on local server)
define('PASSWORD', '120360'); // Database user password  (if password is not set for user then keep it empty )
define('DATABASE', 'kruakroomeuk'); // Database name
define('CHARSET', 'utf8');

function DB()
{
    static $instance;
    if ($instance === null) {
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => FALSE,
        );
        $dsn = 'mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=' . CHARSET;
        $instance = new PDO($dsn, USER, PASSWORD, $opt);
    }
    return $instance;
}

$conn=DB();
$sql = "SELECT * FROM employee";
$q = $conn->query($sql) or die("failed!");
while($r = $q->fetch(PDO::FETCH_ASSOC)){
    echo $r['empfnm'].'<br>';
}

?>

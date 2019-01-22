<?php
    class DBConnect {
        public static function connect() {
            try {
                $HOST='localhost';
                $DATABASE='kruakroomeuk';
                $USER='kruakroomeuk';
                $PASSWORD='120360';
                $CHARSET='utf8';

                $opt = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => FALSE,
                );
                $dsn = 'mysql:host=' . $HOST . ';dbname=' . $DATABASE . ';charset=' . $CHARSET;
                $conn = new PDO($dsn, $USER, $PASSWORD, $opt);

                return $conn;
            } catch(Exception $e) {
                die("Error " . $e->getMessage());
                echo "Line error " . $e->getLine();

            }
        }
    }
?>
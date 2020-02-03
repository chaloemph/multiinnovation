<?php
    class Database {
        public static $host = "multiinnovation_db_1";
        public static $user = "root";
        public static $pass = "root";
        public static $dbname = "rtarf";


        public function __construct() {
        }

        public function coon() {
            $mysqli = mysqli_init();
            $mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
            @$mysqli->real_connect(self::$host, self::$user, self::$pass, self::$dbname);

            if ($mysqli->connect_errno) {
                echo $mysqli->connect_error;
                exit;
            }

            $mysqli -> set_charset("utf8");
            return $mysqli;
        }

        public function query($sql) {
            $mysqli = $this->coon();
            $result = $mysqli->query($sql);
            return $result? $result: '';
        }

        public function result($sql)
        {
            $result = $this->query($sql);
            return $result ? $result->fetch_assoc():'';
        }

        public function resultObj($sql)
        {
            $result = $this->query($sql);
            return $result ? $result->fetch_object():'';
        }
    }


    // $mySql = new Database();
    // $result = $mySql->result("SELECT * FROM `j3_rost` WHERE 1");


    // foreach($result as $value) {
    //     print_r($value);
    // }

?>
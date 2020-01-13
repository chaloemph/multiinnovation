<?php
    
        include 'connect.php';
        $ACK_NUM_ID = 1;
        $sql = "SELECT * FROM `ack_log` WHERE ACK_NUM_ID = ".$ACK_NUM_ID." ";
        $res = mysqli_query($conn,$sql) or die(mysql_error());
        while( $row = mysqli_fetch_assoc($res) ) {
            $row["LOG_QUERY"] = str_replace("j3_rost", "j3_rost_approve", $row["LOG_QUERY"]);

            echo $row["LOG_QUERY"];
            $query = mysqli_query($conn,$row["LOG_QUERY"]) or die(mysql_error());
            while( $result = mysqli_fetch_assoc($query) ) {
                print_r($result);
            }
        }
    

?>	
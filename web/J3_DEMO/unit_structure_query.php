<?php
    if(isset($_POST["do"]) && $_POST["do"] != "" ){
        $do = $_POST["do"];
        
        switch($do){
            case 'get_j3_unit_acm':
            include ('connectpdo.php');
                $PART_ID = $_POST['PART_ID'];
                $sql = "SELECT * FROM j3_unit_acm WHERE PART_ID = :PART_ID";
                $stmt=$db->prepare($sql);
                $stmt->bindparam(':PART_ID',$PART_ID);
                $stmt->execute();
                $row=$stmt->fetchall(PDO::FETCH_ASSOC);
                echo json_encode($row);
            break;
            case 'process':
            include 'connect.php';
                $sql = "TRUNCATE `rtarf`.`j3_unit_acm_transaction`";
                $res = mysqli_query($conn, $sql);
                $sql = "TRUNCATE `rtarf`.`j3_nrpt_transaction`";
                $res = mysqli_query($conn, $sql);
                $sql = "TRUNCATE `rtarf`.`j3_rost_transaction`";
                $res = mysqli_query($conn, $sql);



                $digit = sprintf("%04d" , substr($_POST["UNIT_ACM_ID"] , 0, 2)."09");
                $index = $digit+$_POST["index"];


                $sql1 = "insert into j3_unit_acm_transaction 
                select * from j3_unit_acm WHERE SUBSTRING(UNIT_ACM_ID, 1, 4)  LIKE  '".substr($_POST["UNIT_CODE"] , 0, 4)."'   ";
                $res = mysqli_query($conn, $sql1);

                $sql2 = "insert into j3_rost_transaction 
                select * from j3_rost WHERE SUBSTRING(ROST_UNIT, 1, 4)  LIKE  '".substr($_POST["UNIT_CODE"] , 0, 4)."'   ";
                $res = mysqli_query($conn, $sql2);



                $sql3 = "insert into j3_nrpt_transaction 
                select * from j3_nrpt WHERE SUBSTRING(UNIT_CODE, 1, 4)  LIKE  '".substr($_POST["UNIT_CODE"] , 0, 4)."'   ";
                $res = mysqli_query($conn, $sql3);

                $sql_main = "UPDATE  `j3_unit_acm_transaction` SET  
                UNIT_ACM_ID = Replace(UNIT_ACM_ID , Substring(UNIT_ACM_ID, 1, 4), $index) ,
                PART_ID = '".$_POST["PART_ID"]."'
                WHERE Substring(UNIT_ACM_ID, 1, 2) != '".substr($_POST["UNIT_ACM_ID"] , 0, 2)."' ";
                $res2 = mysqli_query($conn, $sql_main);

                $sql_main2 = "UPDATE  `j3_rost_transaction` SET  
                ROST_UNIT = Replace(ROST_UNIT , Substring(ROST_UNIT, 1, 4), $index) ,
                ROST_PARENT = Replace(ROST_PARENT , Substring(ROST_PARENT, 1, 4), $index) ,
                ROST_NUNIT = Replace(ROST_NUNIT , Substring(ROST_NUNIT, 1, 4), $index) ,
                ROST_NPARENT = Replace(ROST_NPARENT , Substring(ROST_NPARENT, 1, 4), $index) 
                WHERE Substring(ROST_UNIT, 1, 2) != '".substr($_POST["UNIT_ACM_ID"] , 0, 2)."' ";
                $res2 = mysqli_query($conn, $sql_main2);


                // move to rateposernal

                $EXPERT_MIL_ID = '';
                $RATE_P_REMARK = '';
                $RATE_P_NUMBER = '1';
                $RATE_P_RANK = '';
                $SALARY_ID = '';
                $ACK_ID = $_POST["ACK_ID"];


                $j3_rost = "select * from j3_rost_transaction WHERE 1";
                $query = mysqli_query($conn, $j3_rost);
                while($row = mysqli_fetch_assoc($query)) {

                    $j3_ratepersonal_sql = "INSERT INTO `j3_ratepersonal` (`RATE_P_NUM`, `ROST_CPOS`, 
                    `EXPERT_MIL_ID`, `RATE_P_REMARK`, `RATE_P_NUMBER`, 
                    `RATE_P_RANK`, `SALARY_ID`, `ACK_ID`, `RATE_P_VERSION`,
                     `ROST_ID`, `ROST_OLD_ID`) VALUES (NULL, '".$row["ROST_CPOS"]."',
                      '".$EXPERT_MIL_ID."', '".$RATE_P_REMARK."', '".$RATE_P_NUMBER."', 
                      '".$RATE_P_RANK."', '".$SALARY_ID."', '".$ACK_ID."', '1',
                       '".$row["ROST_ID"]."', '".$row["ROST_ID"]."')";
                        $resss = mysqli_query($conn, $j3_ratepersonal_sql);


                }




                $sql_main3 = "UPDATE  `j3_nrpt_transaction` SET  
                UNIT_CODE = Replace(UNIT_CODE , Substring(UNIT_CODE, 1, 4), $index) ,
                NRPT_NUNIT = Replace(NRPT_NUNIT , Substring(NRPT_NUNIT, 1, 4), $index) ,
                NRPT_UNIT_PARENT = Replace(NRPT_UNIT_PARENT , Substring(NRPT_UNIT_PARENT, 1, 4), $index) ,
                UNIT_ACM_ID = Replace(UNIT_ACM_ID , Substring(UNIT_ACM_ID, 1, 4), $index) 
                WHERE Substring(UNIT_CODE, 1, 2) != '".substr($_POST["UNIT_ACM_ID"] , 0, 2)."' ";
                $res3 = mysqli_query($conn, $sql_main3);


                $sql3 = "insert into j3_rost_transaction 
                select * from j3_rost WHERE SUBSTRING(ROST_UNIT, 1, 2) LIKE  '".substr($_POST["UNIT_ACM_ID"] , 0, 2)."'   ";
                $res3 = mysqli_query($conn, $sql3);

                $sql4 = "insert into j3_nrpt_transaction 
                select * from j3_nrpt WHERE SUBSTRING(UNIT_ACM_ID, 1, 2) LIKE  '".substr($_POST["UNIT_ACM_ID"] , 0, 2)."'   ";
                $res4 = mysqli_query($conn, $sql4);



                $index++;


                $sql = "select * from j3_unit_acm WHERE SUBSTRING(UNIT_ACM_ID, 1, 2) LIKE  '".substr($_POST["UNIT_ACM_ID"] , 0, 2)."'   ";
                $res = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($res)) {
                    if (substr($row["UNIT_ACM_ID"] , 0 , 4) >  $index){

                        $unit_acm = $index.substr($row["UNIT_ACM_ID"] , 4 , 7);
                        $sql_query = "INSERT INTO `j3_unit_acm_transaction` (`UNIT_ACM_ID`, `UNIT_NAME`, `UNIT_ACM_NAME`, `PART_ID`, `STATUS`)
                        VALUES ('$unit_acm', '".$row["UNIT_NAME"]."', '".$row["UNIT_ACM_NAME"]."', '".$row["PART_ID"]."', '1')";
                        $index++;
                        $res2= mysqli_query($conn, $sql_query);
                    }else{

                        
                            $chk = "SELECT * FROM j3_unit_acm_transaction WHERE UNIT_ACM_ID = '".$row["UNIT_ACM_ID"]."'  ";
                            $chk_res = mysqli_query($conn, $chk);
                            
                            if (mysqli_num_rows($chk_res) > 0){
                                $unit_acm = $index.substr($row["UNIT_ACM_ID"] , 4 , 7);
                                $index++;
                            }else{
                                $unit_acm = $row["UNIT_ACM_ID"];
                            }
                            $sql_query = "INSERT INTO `j3_unit_acm_transaction` (`UNIT_ACM_ID`, `UNIT_NAME`, `UNIT_ACM_NAME`, `PART_ID`, `STATUS`)
                            VALUES ('$unit_acm', '".$row["UNIT_NAME"]."', '".$row["UNIT_ACM_NAME"]."', '".$row["PART_ID"]."', '1')";
                            $res2= mysqli_query($conn, $sql_query);
                        
                        
                        
                    }
                    
                    $unit_acm_four_digit = substr( $unit_acm , 0 , 4);
                    $sql_query_j3_rost = "UPDATE j3_rost_transaction SET 
                    ROST_UNIT = Replace(ROST_UNIT , Substring(ROST_UNIT, 1, 4), $unit_acm_four_digit ) , 
                    ROST_PARENT = Replace(ROST_PARENT , Substring(ROST_PARENT, 1, 4), $unit_acm_four_digit ) , 
                    ROST_NUNIT = Replace(ROST_NUNIT , Substring(ROST_NUNIT, 1, 4), $unit_acm_four_digit ) , 
                    ROST_NPARENT = Replace(ROST_NPARENT , Substring(ROST_NPARENT, 1, 4), $unit_acm_four_digit )  
                      WHERE SUBSTRING(ROST_UNIT, 1, 4) = '".substr($row["UNIT_ACM_ID"] , 0, 4)."'  ";
                    $res_j3_rost = mysqli_query($conn, $sql_query_j3_rost);
                    
                    // echo json_encode($unit_acm);
                    // echo json_encode($sql_query_j3_rost);


                    // $sql_query_j3_nrpt = "UPDATE j3_nrpt_transaction SET 
                    // UNIT_CODE = Replace(UNIT_CODE , Substring(UNIT_CODE, 1, 4), $unit_acm_four_digit ) , 
                    // NRPT_NUNIT = Replace(NRPT_NUNIT , Substring(NRPT_NUNIT, 1, 4), $unit_acm_four_digit ) , 
                    // NRPT_UNIT_PARENT = Replace(NRPT_UNIT_PARENT , Substring(NRPT_UNIT_PARENT, 1, 4), $unit_acm_four_digit ) , 
                    // UNIT_ACM_ID = Replace(UNIT_ACM_ID , Substring(UNIT_ACM_ID, 1, 4), $unit_acm_four_digit )  
                    //   WHERE SUBSTRING(UNIT_CODE, 1, 4) = '".substr($row["UNIT_ACM_ID"] , 0, 4)."'  ";
                    // $res_j3_nrpt = mysqli_query($conn, $sql_query_j3_nrpt);

                    
                }

                


                $sql = "UPDATE j3_rost SET STATUS = 0 WHERE SUBSTRING(ROST_UNIT, 1, 2) LIKE  '".substr($_POST["UNIT_ACM_ID"] , 0, 2)."'  ";
                $res = mysqli_query($conn, $sql);

                $sql = "UPDATE j3_unit_acm SET STATUS = 0 WHERE SUBSTRING(UNIT_ACM_ID, 1, 2) LIKE  '".substr($_POST["UNIT_ACM_ID"] , 0, 2)."'  ";
                $res = mysqli_query($conn, $sql);

                $sql = "UPDATE j3_nrpt SET STATUS = 0 WHERE SUBSTRING(UNIT_CODE, 1, 2) LIKE  '".substr($_POST["UNIT_ACM_ID"] , 0, 2)."'  ";
                $res = mysqli_query($conn, $sql);


                // not apdate default value
                // $sql1 = "UPDATE  j3_unit_acm SET STATUS = 0 WHERE SUBSTRING(UNIT_ACM_ID, 1, 4)  LIKE  '".substr($_POST["UNIT_CODE"] , 0, 4)."'   ";
                // $res = mysqli_query($conn, $sql1);

                $sql2 = "UPDATE  j3_rost SET STATUS = 0  WHERE SUBSTRING(ROST_UNIT, 1, 4)  LIKE  '".substr($_POST["UNIT_CODE"] , 0, 4)."'   ";
                $res = mysqli_query($conn, $sql2);

                $sql3 = "UPDATE  j3_nrpt SET STATUS = 0 WHERE SUBSTRING(UNIT_CODE, 1, 4)  LIKE  '".substr($_POST["UNIT_CODE"] , 0, 4)."'   ";
                $res = mysqli_query($conn, $sql3);



                $sql = "DELETE FROM j3_rost WHERE j3_rost.STATUS = 0 ";
                $res = mysqli_query($conn, $sql);

                $sql = "DELETE FROM j3_unit_acm WHERE j3_unit_acm.STATUS = 0 ";
                $res = mysqli_query($conn, $sql);

                $sql = "DELETE FROM j3_nrpt WHERE j3_nrpt.STATUS = 0  ";
                $res = mysqli_query($conn, $sql);



                $sql1 = "insert into j3_unit_acm
                select * from j3_unit_acm_transaction WHERE 1  ";
                $res = mysqli_query($conn, $sql1);

                $sql1 = "insert into j3_nrpt
                select * from j3_nrpt_transaction WHERE 1  ";
                $res = mysqli_query($conn, $sql1);

                $sql1 = "insert into j3_rost
                select * from j3_rost_transaction WHERE 1  ";
                $res = mysqli_query($conn, $sql1);



                
                // echo json_encode($sql);
            break;
        }
    }
?>
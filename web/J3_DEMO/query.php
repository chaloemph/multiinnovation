<?php
    
    if(isset($_POST["do"]) && $_POST["do"] != "" ){
        $do = $_POST["do"];
        $ID = $_POST["rost_id"];
        include ('connectpdo.php');
        switch($do){
            case 'modal_edit_p_ack':
                $sql3 = "SELECT 
                j3_rost.*,
                j1_rank.ROST_CDEP,
                j1_rank.RANK_ID,
                j1_rank.ROST_RANK,
                j3_rebirth.*
                FROM j3_rost 
                LEFT JOIN j1_rank ON(j3_rost.ROST_RANK = j1_rank.ROST_RANK AND j3_rost.ROST_RANKNAME = j1_rank.ROST_RANKNAME) 
                LEFT JOIN j3_rebirth ON(j3_rost.ROST_LAO_MAJ = j3_rebirth.CLAO_NAME_SHORT)
                WHERE ROST_ID = :ID ";
                $stmt3=$db->prepare($sql3);
                $stmt3->bindparam(':ID',$ID);
                $stmt3->execute();
                $row3=$stmt3->fetch(PDO::FETCH_ASSOC);
                echo json_encode($row3);
            break;
            case 'updatedata_p_ack':

                
                $ACK_ID = $_POST['ACK_ID'];
                $ROST_CPOS = $_POST['ROST_CPOS'];
                $RATE_P_RANK = $_POST['RATE_P_RANK'];
                $SALARY_ID = $_POST['SALARY_ID'];
                $EXPERT_MIL_ID = $_POST['EXPERT_MIL_ID'];
                $RATE_P_NUMBER = $_POST['RATE_P_NUMBER'];
                $RATE_P_REMARK = $_POST['RATE_P_REMARK'];
                $RATE_P_VERSION = 1;

                $ROST_UNIT = $_POST['ROST_UNIT'];
                $ROST_POSNAME = $_POST['ROST_POSNAME'];
                $ROST_POSNAME_ACM = $_POST['ROST_POSNAME_ACM'];
                $ROST_RANK = $_POST['ROST_RANK'];
                $ROST_RANKNAME = $_POST['ROST_RANKNAME'];
                $ROST_LAO_MAJ = $_POST['ROST_LAO_MAJ'];
                $ROST_NCPOS12 = $_POST['ROST_NCPOS12'];
                $ROST_OLD_ID = $_POST['ROST_ID'];
                $ROST_PARENT = $_POST['ROST_PARENT'];
                $ROST_NUNIT = $_POST['ROST_NUNIT'];
                $ROST_NPARENT = $_POST['ROST_NPARENT'];

                $RATE_P_NUMBER = ($RATE_P_NUMBER == '')? 0:$RATE_P_NUMBER;
                $SALARY_ID = ($SALARY_ID == '')? 0:$SALARY_ID;

                $sql = "INSERT INTO j3_ratepersonal(RATE_P_NUM, ROST_CPOS, EXPERT_MIL_ID, RATE_P_REMARK, RATE_P_NUMBER, RATE_P_RANK, SALARY_ID, ACK_ID, RATE_P_VERSION , ROST_OLD_ID) "
                . "VALUES(NULL, :ROST_CPOS, :EXPERT_MIL_ID, :RATE_P_REMARK, :RATE_P_NUMBER, :RATE_P_RANK, :SALARY_ID, :ACK_ID, :RATE_P_VERSION , :ROST_OLD_ID)";
                $stmt=$db->prepare($sql);
                $stmt->bindparam(':ROST_CPOS',$ROST_CPOS);
                $stmt->bindparam(':EXPERT_MIL_ID',$EXPERT_MIL_ID);
                $stmt->bindparam(':RATE_P_REMARK',$RATE_P_REMARK);
                $stmt->bindparam(':RATE_P_NUMBER',$RATE_P_NUMBER);
                $stmt->bindparam(':RATE_P_RANK',$RATE_P_RANK);
                $stmt->bindparam(':SALARY_ID',$SALARY_ID);
                $stmt->bindparam(':ACK_ID',$ACK_ID);
                $stmt->bindparam(':RATE_P_VERSION',$RATE_P_VERSION);
                $stmt->bindparam(':ROST_OLD_ID',$ROST_OLD_ID);



                if ($stmt->execute()){
                    // echo json_encode('success');
                    $RATE_P_NUM = $db->lastInsertId();

                }else{
                    echo json_encode($stmt->errorInfo());
                }



                $sql2 = "INSERT INTO j3_rost(ROST_UNIT, ROST_CPOS, ROST_POSNAME, ROST_POSNAME_ACM, ROST_RANK, ROST_RANKNAME, ROST_LAO_MAJ, ROST_NCPOS12, ROST_ID, ROST_PARENT, ROST_NUNIT, ROST_NPARENT) "
                . "VALUES(:ROST_UNIT, :ROST_CPOS, :ROST_POSNAME, :ROST_POSNAME_ACM, :ROST_RANK, :ROST_RANKNAME, :ROST_LAO_MAJ, :ROST_NCPOS12, NULL, :ROST_PARENT, :ROST_NUNIT, :ROST_NPARENT)";

                $stmt2=$db->prepare($sql2);
                $stmt2->bindparam(':ROST_UNIT',$ROST_UNIT);
                $stmt2->bindparam(':ROST_CPOS',$ROST_CPOS);
                $stmt2->bindparam(':ROST_POSNAME',$ROST_POSNAME);
                $stmt2->bindparam(':ROST_POSNAME_ACM',$ROST_POSNAME_ACM);
                $stmt2->bindparam(':ROST_RANK',$ROST_RANK);
                $stmt2->bindparam(':ROST_RANKNAME',$ROST_RANKNAME);
                $stmt2->bindparam(':ROST_LAO_MAJ',$ROST_LAO_MAJ);
                $stmt2->bindparam(':ROST_NCPOS12',$ROST_NCPOS12);
                
                $stmt2->bindparam(':ROST_PARENT',$ROST_PARENT);
                $stmt2->bindparam(':ROST_NUNIT',$ROST_NUNIT);
                $stmt2->bindparam(':ROST_NPARENT',$ROST_NPARENT);
                // $stmt2->bindparam(':ROST_ID',$ROST_ID);
                
                

                

                if ($stmt2->execute()){
                    $ROST_ID = $db->lastInsertId();
                    // echo json_encode($result);
                }else{
                    echo json_encode($stmt2->errorInfo());
                }

                

                $sql_update = "UPDATE `j3_ratepersonal` SET ROST_ID = ? WHERE RATE_P_NUM = ?  ";

                $stmt3=$db->prepare($sql_update);
                

                if ($stmt3->execute([$ROST_ID , $RATE_P_NUM])){
                    echo json_encode('success');
                }else{
                    echo json_encode($stmt3->errorInfo());
                }
                

                

            break;

            case 'viewlast':
                $ROST_PARENT = $_POST['ROST_PARENT'];
                $ROST_NUNIT = $_POST['ROST_NUNIT'];
                $ROST_NPARENT = $_POST['ROST_NPARENT'];
                $ROST_UNIT = $_POST['ROST_UNIT'];
                $ROST_CPOS = $_POST['ROST_CPOS'];

                

                $condition = "";

                if ($ROST_PARENT != "") {
                    $condition .= "AND ROST_PARENT = $ROST_PARENT ";
                }

                if ($ROST_NUNIT != "") {
                    $condition .= "AND ROST_NUNIT = $ROST_NUNIT ";
                }

                if ($ROST_NPARENT != "") {
                    $condition .= "AND ROST_NPARENT = $ROST_NPARENT ";
                }

                if ($ROST_UNIT != "") {
                    $condition .= "AND ROST_UNIT = $ROST_UNIT ";
                }


                
                $sql = "SELECT * ,
                (SELECT ROST_POSNAME FROM j3_rost WHERE j3_rost.ROST_ID = j3_ratepersonal.ROST_OLD_ID) AS ROST_POSTNAME_OLD
                FROM `j3_ratepersonal` 
                LEFT JOIN `j3_rost` 
                ON(j3_rost.ROST_ID = j3_ratepersonal.ROST_ID ) 
                WHERE j3_ratepersonal.`ROST_CPOS` LIKE '".$ROST_CPOS."' $condition 
                ";

                // echo json_encode($sql);
                $stmt=$db->prepare($sql);
                $stmt->execute();
                $row=$stmt->fetchall(PDO::FETCH_ASSOC);
            

                echo json_encode($row);
            
            break;
        }
    }
?>
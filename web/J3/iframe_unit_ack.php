<?php

include ('connectpdo.php');
$UNIT_CODE = $_GET['id'];
$UNIT_CODE_1 = $_GET['name'];
$UNIT_CODE_2 = $_GET['nickname'];
$UNIT_CODE_3 = $_GET['lastname'];

$sql3 = "SELECT COUNT(ROST_POSNAME) as count FROM j3_rost GROUP BY ROST_POSNAME_ACM";
$stmt3=$db->prepare($sql3);
//$stmt3->bindparam(':ID',$ID);
$stmt3->execute();
//$row3=$stmt3->fetch(PDO::FETCH_ASSOC);
while($row3=$stmt3->fetch(PDO::FETCH_ASSOC)){
  $ROST_COUNT = $row3['count'];
}


?>


<!DOCTYPE html>
<html>
    <head>
        <?php
            include ('haed.php');
        ?>
    </head>
    <body>    
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-primary">                                                        
                    <tr>
                        <th style="text-align: center;">วรรค</th>
                        <th style="text-align: center;">ลำดับ</th>
                        <th style="text-align: center;">ส่วนราชการ/ตำแหน่ง</th>
                        <th style="text-align: center;">จำนวน</th>
                        <th style="text-align: center;">อัตรากำลังพล</th>
                        <th style="text-align: center;">รหัสเลขที่ตำแหน่ง</th>
                        <th style="text-align: center;">หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include ('connectpdo.php');
                        /*$sql2 = "SELECT *,COUNT(ROST_ID) FROM j3_rost 
                            WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3 
                            GROUP BY ROST_POSNAME_ACM,ROST_RANKNAME ORDER BY ROST_ID";
                        $stmt2=$db->prepare($sql2);
                        $stmt2->bindparam(':UNIT_CODE',$UNIT_CODE);
                        $stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
                        $stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
                        $stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
                        $stmt2->execute();
                        $i = "00";
                        $j = "00";
                        while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
                            $COUNT = $row2['COUNT(ROST_ID)'];
                            $ROST_UNIT = $row2['ROST_UNIT'];
                            $ROST_CPOS = $row2['ROST_CPOS'];
                            $ROST_POSNAME = $row2['ROST_POSNAME'];
                            $ROST_POSNAME_ACM = $row2['ROST_POSNAME_ACM'];
                            $ROST_RANK = $row2['ROST_RANK'];
                            $ROST_RANKNAME = $row2['ROST_RANKNAME'];
                            $ROST_LAO_MAJ = $row2['ROST_LAO_MAJ'];
                            $ROST_NCPOS12 = $row2['ROST_NCPOS12'];
                            $ROST_ID = $row2['ROST_ID'];
                            $ROST_PARENT = $row2['ROST_PARENT'];
                            $ROST_NUNIT = $row2['ROST_NUNIT'];
                            $ROST_NPARENT = $row2['ROST_NPARENT'];

                            $ROST_POSNAME = explode(' ', $row2['ROST_POSNAME']);
                            $ROST_POSNAME = $ROST_POSNAME[0];*/

                            $sql6 = "SELECT * FROM j3_nrpt WHERE UNIT_CODE = :UNIT_CODE" ;
							$stmt6=$db->prepare($sql6);
							$stmt6->bindparam(':UNIT_CODE',$UNIT_CODE);
							$stmt6->execute();
                            $row6=$stmt6->fetch(PDO::FETCH_ASSOC);
                            $data = $row6['UNIT_CODE'];

                            $i = "00";
                            $j = "00";
                            //$stmt6->execute();
                            //while($row6=$stmt6->fetch(PDO::FETCH_ASSOC)){
                            if($data == $UNIT_CODE){
                                $j++;
                                $sql2 = "SELECT *,COUNT(ROST_ID) FROM j3_rost 
                                        WHERE ROST_UNIT = :data
                                        GROUP BY ROST_POSNAME_ACM,ROST_RANKNAME ORDER BY ROST_ID";
                                    $stmt2=$db->prepare($sql2);
                                    $stmt2->bindparam(':data',$data);
                                    //$stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
                                    //$stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
                                    //$stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
                                    $stmt2->execute();
                                    
                                    while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
                                        $COUNT = $row2['COUNT(ROST_ID)'];
                                        $ROST_UNIT = $row2['ROST_UNIT'];
                                        $ROST_CPOS = $row2['ROST_CPOS'];
                                        $ROST_POSNAME = $row2['ROST_POSNAME'];
                                        $ROST_POSNAME_ACM = $row2['ROST_POSNAME_ACM'];
                                        $ROST_RANK = $row2['ROST_RANK'];
                                        $ROST_RANKNAME = $row2['ROST_RANKNAME'];
                                        $ROST_LAO_MAJ = $row2['ROST_LAO_MAJ'];
                                        $ROST_NCPOS12 = $row2['ROST_NCPOS12'];
                                        $ROST_ID = $row2['ROST_ID'];
                                        $ROST_PARENT = $row2['ROST_PARENT'];
                                        $ROST_NUNIT = $row2['ROST_NUNIT'];
                                        $ROST_NPARENT = $row2['ROST_NPARENT'];

                                        $ROST_POSNAME = explode(' ', $row2['ROST_POSNAME']);
                                        $ROST_POSNAME = $ROST_POSNAME[0];
                                        $i++;

                                echo'<tr>
                                    <td style="width: 20px; text-align: center;">'.$j.'</td>
                                    <td style="width: 20px; text-align: center;">'.$i.'</td>
                                    <td style="width: 300px;">'.$ROST_POSNAME.'</td>
                                    <td style="width: 30px; text-align: center;">';
                                        
                                            if($ROST_RANK == "19" || $ROST_RANK == "29"){
                                                echo '-';
                                            }elseif($ROST_RANK != "19" || $ROST_RANK != "29"){
                                                echo $COUNT;
                                            }
                                    
                                    echo'</td>
                                    <td style="width: 100px;">'.$ROST_RANKNAME.'</td>
                                    <td style="width: 150px;">'.$ROST_NCPOS12.'</td>
                                    <td style="width: 50px; text-align: center;"></td>
                                </tr>';
                                }
                                $sql8 = "SELECT * FROM j3_nrpt WHERE NRPT_UNIT_PARENT = :data" ;
								$stmt8=$db->prepare($sql8);
								$stmt8->bindparam(':data',$data);
								$stmt8->execute();
								
                                while($row8=$stmt8->fetch(PDO::FETCH_ASSOC)){
                                    $SUB = substr($row8['UNIT_CODE'],6);
                                    
									if($SUB != "0001" && $SUB != "0002" && $SUB != "0003" && $SUB != "9999" && $SUB != "9998"  && $SUB != "0900"){
								if($row8['NRPT_UNIT_PARENT'] == $data){
                                    $SEND1 = $row8['UNIT_CODE'];
                                    //echo $row8['UNIT_CODE'];
                                    $i = "00";
                                    $j++;
                                    $sql2 = "SELECT *,COUNT(ROST_ID) FROM j3_rost 
                                        WHERE ROST_NPARENT = :SEND1 OR ROST_NUNIT = :SEND1 OR ROST_UNIT = :SEND1 OR ROST_PARENT = :SEND1 
                                        GROUP BY ROST_POSNAME_ACM,ROST_RANKNAME ORDER BY ROST_ID";
                                    $stmt2=$db->prepare($sql2);
                                    $stmt2->bindparam(':SEND1',$SEND1);
                                    //$stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
                                    //$stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
                                    //$stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
                                    $stmt2->execute();
                                    
                                    while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
                                        $COUNT = $row2['COUNT(ROST_ID)'];
                                        $ROST_UNIT = $row2['ROST_UNIT'];
                                        $ROST_CPOS = $row2['ROST_CPOS'];
                                        $ROST_POSNAME = $row2['ROST_POSNAME'];
                                        $ROST_POSNAME_ACM = $row2['ROST_POSNAME_ACM'];
                                        $ROST_RANK = $row2['ROST_RANK'];
                                        $ROST_RANKNAME = $row2['ROST_RANKNAME'];
                                        $ROST_LAO_MAJ = $row2['ROST_LAO_MAJ'];
                                        $ROST_NCPOS12 = $row2['ROST_NCPOS12'];
                                        $ROST_ID = $row2['ROST_ID'];
                                        $ROST_PARENT = $row2['ROST_PARENT'];
                                        $ROST_NUNIT = $row2['ROST_NUNIT'];
                                        $ROST_NPARENT = $row2['ROST_NPARENT'];

                                        $ROST_POSNAME = explode(' ', $row2['ROST_POSNAME']);
                                        $ROST_POSNAME = $ROST_POSNAME[0];
                                        $i++;

                                echo'<tr>
                                    <td style="width: 20px; text-align: center;">'.$j.'</td>
                                    <td style="width: 20px; text-align: center;">'.$i.'</td>
                                    <td style="width: 300px;">'.$ROST_POSNAME.'</td>
                                    <td style="width: 30px; text-align: center;">';
                                        
                                            if($ROST_RANK == "19" || $ROST_RANK == "29"){
                                                echo '-';
                                            }elseif($ROST_RANK != "19" || $ROST_RANK != "29"){
                                                echo $COUNT;
                                            }
                                    
                                    echo'</td>
                                    <td style="width: 100px;">'.$ROST_RANKNAME.'</td>
                                    <td style="width: 150px;">'.$ROST_NCPOS12.'</td>
                                    <td style="width: 50px; text-align: center;"></td>
                                </tr>';
                                }
                            }
                        }
                    }
                //}

                            
                                //SELECT COUNT(`ROST_ID`),`ROST_POSNAME_ACM` FROM `j3_rost` GROUP BY `ROST_POSNAME_ACM` ORDER BY `ROST_ID`
                                /*$sql3 = "SELECT * FROM j3_rost 
                                        WHERE ROST_NCPOS12 = :ROST_NCPOS12 ";
                                $stmt3=$db->prepare($sql3);
                                $stmt3->bindparam(':ROST_NCPOS12',$ROST_NCPOS12);
                                $stmt3->execute();
                                while($row3=$stmt3->fetch(PDO::FETCH_ASSOC)){
                                $N_NCPOS12 = $row3['ROST_NCPOS12'];*/
                    ?>
                    <!--<tr>
                        <td style="width: 20px; text-align: center;"><?=$i;?></td>
                        <td style="width: 300px;"><?=$ROST_POSNAME;?></td>
                        <td style="width: 30px; text-align: center;">
                            <?php
                                if($ROST_RANK == "19" || $ROST_RANK == "29"){
                                    echo '-';
                                }elseif($ROST_RANK != "19" || $ROST_RANK != "29"){
                                    echo $COUNT;
                                }
                            ?>
                        </td>
                        <td style="width: 100px;"><?=$ROST_RANKNAME;?></td>
                        <td style="width: 150px;"><?=$ROST_NCPOS12;?></td>
                        <td style="width: 50px; text-align: center;"></td>
                    </tr>-->
                    <?php } ?>                                                             
                </tbody>
            </table>
        </div>
        <?php
            include ('script.php');
        ?>
    </body>
</html>
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
          <th style="text-align: center;">หมายเลขหน่วยงาน</th>
          <th style="text-align: center;">หมายเลขกรมบัญชีกลาง</th>
          <th style="text-align: center;">รหัสตำแหน่ง</th>
          <th style="text-align: center;">ชื่อตำแหน่ง</th>
          <th style="text-align: center;">ตำแหน่งย่อ</th>
          <th style="text-align: center;">อัตรา</th>
          <th style="text-align: center;">Manage</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include ('connectpdo.php');
        $sql2 = "SELECT *,COUNT(ROST_ID) FROM j3_rost 
        WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3 
        GROUP BY ROST_POSNAME_ACM ORDER BY ROST_ID";
        $stmt2=$db->prepare($sql2);
        $stmt2->bindparam(':UNIT_CODE',$UNIT_CODE);
        $stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
        $stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
        $stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
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
                            //SELECT COUNT(`ROST_ID`),`ROST_POSNAME_ACM` FROM `j3_rost` GROUP BY `ROST_POSNAME_ACM` ORDER BY `ROST_ID`
                        /*$sql3 = "SELECT * FROM j3_rost 
                                WHERE ROST_NCPOS12 = :ROST_NCPOS12 ";
                        $stmt3=$db->prepare($sql3);
                        $stmt3->bindparam(':ROST_NCPOS12',$ROST_NCPOS12);
                        $stmt3->execute();
                        while($row3=$stmt3->fetch(PDO::FETCH_ASSOC)){
                          $N_NCPOS12 = $row3['ROST_NCPOS12'];*/
                          ?>
                          <tr>
                            <td style="width: 120px; text-align: center;"><?=$ROST_UNIT?></td>
                            <td style="width: 120px; text-align: center;"><?=$ROST_NCPOS12?></td>
                            <td style="width: 120px; text-align: center;"><?=$ROST_CPOS?></td>
                            <td style="width: 500px;"><?=$ROST_POSNAME?></td>
                            <td style="width: 320px;"><?=$ROST_POSNAME_ACM?></td>
                            <td style="width: 50px; text-align: center;">
                              <?php
                              if($ROST_RANK == "19" || $ROST_RANK == "29"){
                                echo '-';
                              }elseif($ROST_RANK != "19" || $ROST_RANK != "29"){
                                echo $COUNT;
                              }
                              ?>
                            </td>
                            <td style="width: 50px; text-align: center;">        
                              <div class="table-actions">
                                <button type="button" id="link_modal" data-toggle="modal" data-target="#EditModal" data-id="<?=$ROST_ID;?>" class="btn btn-success btn-sm editbtn"><i class="fas fa-pencil-alt"></i></button></a>
                                <a href='unit_structure_01.php?id=<?=$UNIT_CODE;?>'><button type="button" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-ban"></i></button></a>
                              </div>
                            </td>
                          </tr>
                        <?php } ?>                                                             
                      </tbody>
                    </table>
                  </div>

                  <?php
                  include ('script.php');
                  ?>
                </body>
                </html>
<?php

include ('connectpdo.php');

$UNIT_CODE = $_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DIRECTORATE OF JOINT OPERATION</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="temp_index/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="temp_index/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="temp_index/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="temp_index/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="temp_index/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="temp_index/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="temp_index/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="temp_index/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="temp_index/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index.php" class="brand-link">
        <span class="brand-text font-weight-light">RTARF</span>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">โครงสร้างการจัดหน่วย</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  ส่วนบังคับบัญชา
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      สน.ผบ.ทสส.
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>สน.บก.บก.ทท</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>สจร.ทหาร</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>สธน.ทหาร</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>สยย.ทหาร</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>สลก.บก.ทท</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>สตน.ทหาร</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>สสก.ทหาร</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>ศปร.</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  ส่วนเสนาธิการร่วม
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="unit_structure.php?id=6110000000" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>กพ.ทหาร</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="unit_structure.php?id=6120000000" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ขว.ทหาร</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="unit_structure.php?id=6130000000" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ยก.ทหาร</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="unit_structure.php?id=6140000000" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>กบ.ทหาร</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="unit_structure.php?id=6160000000" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>กร.ทหาร</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="unit_structure.php?id=6150000000" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>สส.ทหาร</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="unit_structure.php?id=6170000000" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>สปช.ทหาร</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  ส่วนปฏิบัติการ
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>นทพ.</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ศรภ.</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ศตก.</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  ส่วนกิจการพิเศษ
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>สบ.ทหาร</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>กง.ทหาร</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ผท.ทหาร</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ยบ.ทหาร</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ชด.ทหาร</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  ส่วนการศึกษา
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>สปท.</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">การจัดทำข้อมูล</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-bars"></i>
                <p>
                  หมายเลข อจย./อฉก.
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="read_ajy.php" class="nav-link">
                    <i class="fas fa-flag nav-icon"></i>
                    <p>อัตราการจัดยุทโธปกรณ์</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="read_ack.php" class="nav-link">
                    <i class="fas fa-flag nav-icon"></i>
                    <p>อัตราการจัดเฉพาะกิจ</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </aside>
      <div class="content-wrapper">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Function ค้นหา</h3>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align: center;">หมายเลขหน่วย</th>
                  <th>นามหน่วย</th>
                  <th>นามหน่วยย่อ</th>
                  <th style="text-align: center;">หมายเลขหน่วยหลัก</th>
                  <th style="text-align: center;">จัดทำข้อมูล</th>
                  <th><i class="fas fa-cogs nav-icon"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php

                $sql = "SELECT * FROM j3_nrpt WHERE UNIT_ACM_ID = :UNIT_CODE OR NRPT_UNIT_PARENT = :UNIT_CODE";
                $stmt=$db->prepare($sql);
                $stmt->bindparam(':UNIT_CODE',$UNIT_CODE);
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                	$UNIT_CODE = $row['UNIT_CODE'];
                	$NRPT_NAME = $row['NRPT_NAME'];
                	$NRPT_ACM = $row['NRPT_ACM'];
                	$NRPT_NUNIT = $row['NRPT_NUNIT'];
                	$NRPT_NPAGE = $row['NRPT_NPAGE'];
                	$NRPT_DMYUPD = $row['NRPT_DMYUPD'];
                	$NRPT_UNIT_PARENT = $row['NRPT_UNIT_PARENT'];
                	$NRPT_USER = $row['NRPT_USER'];
                	$UNIT_ACM_ID = $row['UNIT_ACM_ID'];


                  ?>
                  <tr>
                    <td style="width: 160px; text-align: center;"><?=$UNIT_CODE?></td>
                    <td style="width: 500px;"><?=$NRPT_NAME?></td>
                    <td style="width: 180px;"><?=$NRPT_ACM?></td>
                    <td style="width: 150px; text-align: center;"><?=$NRPT_UNIT_PARENT?></td>
                    <td style="width: 180px; text-align: center;"> 
                      <a class="btn btn-success btn-sm" href="create_ajy.php?id=<?=$UNIT_CODE;?>">
                        อจย.
                      </a>
                      <a class="btn btn-warning btn-sm" href="create_ack.php?id=<?=$UNIT_CODE;?>&name=<?=$UNIT_CODE;?>&nickname=<?=$UNIT_CODE;?>&lastname=<?=$UNIT_CODE?>">
                        อฉก.
                      </a>
                    </td>
                    <td style="width: 220px; text-align: center;">
                      <a class="btn btn-primary btn-sm" href="unit_structure.php?id=<?=$UNIT_CODE?>">
                        <i class="fas fa-list">
                        </i>
                        UNIT
                      </a>
                      <a class="btn btn-info btn-sm" href="detail_ack.php?id=<?=$UNIT_CODE;?>&name=<?=$UNIT_CODE;?>&nickname=<?=$UNIT_CODE;?>&lastname=<?=$UNIT_CODE?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                      </a>
          </div>
                      
                    </td>
                  </tr>
                <?php } ?>

                
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>


      


      <footer class="main-footer">
        <strong>Copyright &copy; 2019 </strong>
        Multi Innovation Engineering Co.,Ltd
      </footer>


      <aside class="control-sidebar control-sidebar-dark">
      </aside>
    </div>

    

    <script src="temp_index/plugins/jquery/jquery.min.js"></script>
    <script src="temp_index/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="temp_index/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="temp_index/plugins/chart.js/Chart.min.js"></script>
    <script src="temp_index/plugins/sparklines/sparkline.js"></script>
    <script src="temp_index/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="temp_index/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="temp_index/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="temp_index/plugins/moment/moment.min.js"></script>
    <script src="temp_index/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="temp_index/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="temp_index/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="temp_index/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="temp_index/dist/js/adminlte.js"></script>
    <!-- <script src="temp_index/dist/js/pages/dashboard.js"></script> -->
    <script src="temp_index/dist/js/demo.js"></script>
    <script src="temp_index/plugins/jquery/jquery.min.js"></script>
    <script src="temp_index/plugins/datatables/jquery.dataTables.js"></script>
    <script src="temp_index/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>


    

    <script>
      $(function () {
        $("#example1").DataTable();
        // $('#example2').DataTable({
        //   "paging": true,
        //   "lengthChange": false,
        //   "searching": false,
        //   "ordering": true,
        //   "info": true,
        //   "autoWidth": false,
        // });
      });

    </script>
  </body>
  </html>

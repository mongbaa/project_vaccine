<?php include "header.php";?>


<!-- App hero header starts -->
<div class="app-hero-header d-flex align-items-start">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house lh-1"></i>
            <a href="index.php" class="text-decoration-none">หน้าหลัก</a>
        </li>
        <li class="breadcrumb-item" aria-current="page"> นักเรียน </li>
    </ol>
    <div class="ms-auto d-lg-flex d-none flex-row">
    </div>
</div>


<!-- App body starts -->
<div class="app-body">
    <div class="row gx-3">
        <div class="col-xxl-12">
            <div class="card mb-3">
                <div class="card-body">




                    <!-- Modal -->



                    <?php


    if(!empty($_POST['del_vaccine_data'])){

        $vaccine_data_id = $_POST['vaccine_data_id'];

        include "config.inc.php";
        if (isset($_POST['vaccine_data_id'])  && !empty($_POST['vaccine_data_id'])) {

        $sql_del = "DELETE FROM tbl_vaccine_data WHERE vaccine_data_id = $vaccine_data_id";
        $conn->query($sql_del);

        }
        $conn -> close();

        echo "<script type='text/javascript'>";
        echo "window.location='vaccine_data.php';";
        echo "</script>";
    }




  if(!empty($_POST['add_vaccine_data'])){

    include "config.inc.php";


    if (isset($_POST['student_id'])  && !empty($_POST['student_id'])) {
        $student_id = $conn->real_escape_string($_POST['student_id']);
    } else {
        $student_id = 1;
    }

    if (isset($_POST['staff_id'])  && !empty($_POST['staff_id'])) {
        $staff_id = $conn->real_escape_string($_POST['staff_id']);
    } else {
        $staff_id = 1;
    }


    if (isset($_POST['vaccine_id'])  && !empty($_POST['vaccine_id'])) {
        $vaccine_id = $conn->real_escape_string($_POST['vaccine_id']);
    } else {
        $vaccine_id = 1;
    }

    if (isset($_POST['vaccine_data_quantity'])  && !empty($_POST['vaccine_data_quantity'])) {
        $vaccine_data_quantity = $conn->real_escape_string($_POST['vaccine_data_quantity']);
    } else {
        $vaccine_data_quantity = 0;
    }

    if (isset($_POST['vaccine_data_date'])  && !empty($_POST['vaccine_data_date'])) {
        $vaccine_data_date = $conn->real_escape_string($_POST['vaccine_data_date']);
    } else {
        $vaccine_data_date = '';
    }

    if (isset($_POST['vaccine_data_date_next'])  && !empty($_POST['vaccine_data_date_next'])) {
        $vaccine_data_date_next = $conn->real_escape_string($_POST['vaccine_data_date_next']);
    } else {
        $vaccine_data_date_next = '';
    }

    if (isset($_POST['vaccine_data_note'])  && !empty($_POST['vaccine_data_note'])) {
        $vaccine_data_note = $conn->real_escape_string($_POST['vaccine_data_note']);
    } else {
        $vaccine_data_note = '';
    }

    $vaccine_data_status = 1;


    if (isset($_POST['vaccine_data_id'])  && !empty($_POST['vaccine_data_id'])) {

        $vaccine_data_id = $_POST['vaccine_data_id'];


        $sql_update = "UPDATE tbl_vaccine_data SET
                        student_id = '$student_id',
                        staff_id = '$staff_id',
                        vaccine_id = '$vaccine_id',
                        vaccine_data_quantity = '$vaccine_data_quantity',
                        vaccine_data_date = '$vaccine_data_date',
                        vaccine_data_date_next = '$vaccine_data_date_next',
                        vaccine_data_note = '$vaccine_data_note',
                        vaccine_data_status = '$vaccine_data_status'
                        WHERE tbl_vaccine_data.vaccine_data_id = $vaccine_data_id";
        $conn->query($sql_update);

    }else{

        $sql_in = "INSERT INTO tbl_vaccine_data  (vaccine_data_id, student_id, staff_id, vaccine_id, vaccine_data_quantity, vaccine_data_date, vaccine_data_date_next, vaccine_data_note, vaccine_data_status)
                                     VALUES (null, '$student_id', '$staff_id', '$vaccine_id', '$vaccine_data_quantity', '$vaccine_data_date', '$vaccine_data_date_next', '$vaccine_data_note', 1 )";
        $conn->query($sql_in);
    }

    $conn -> close();


    echo "<script type='text/javascript'>";
    echo "window.location='vaccine_data.php';";
    echo "</script>";



  }

  ?>


                    <br>

                    <div class="row gx-3">
                        <div class="col-xxl-12">

                        <a href="vaccine_data.php?action=10000" class="btn btn-info btn-sm">
                            <i class="bi bi-pie-chart"></i> แสดงข้อมูล ทั้งหมด
                        </a>

                        <a href="vaccine_data.php?action=5" class="btn btn-info btn-sm">
                            <i class="bi bi-pie-chart"></i> กำหนดน้อยกว่า 5 วัน
                        </a>



                        <?php 
                        if(!empty($_GET['action'])){

                            $action =  $_GET['action'];
                            }else{
                            $action =  1000;
                            }

                        ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-hover m-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col"> ลำดับที่</th>
                                                    <th scope="col"> ชื่อ - สกุล</th>
                                                    <th scope="col"> ชื่อวัคซีน</th>
                                                    <th scope="col"> จำนวนเข็ม	</th>
                                                    <th scope="col"> วันที่ฉีด </th>
                                                    <th scope="col"> วันที่ฉีดครั้งถัดไป </th>
                                                    <th scope="col"> หมายเหตุ </th>
                                                    <th scope="col"> ผู้บันทึก</th>
                                                    <th scope="col">กำหนด</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                        include "config.inc.php";
                                                $sql = "SELECT * FROM tbl_vaccine_data as vd
                                                        INNER JOIN  tbl_student as sd on sd.student_id = vd.student_id
                                                        INNER JOIN  tbl_vaccine as v on v.vaccine_id = vd.vaccine_id
                                                        INNER JOIN  tbl_staff as sf on sf.staff_id = vd.staff_id
                                                        ORDER BY vd.vaccine_data_id DESC ";
                                        $query = $conn->query($sql);
                                        $i = 0;
                                        while ($result = $query->fetch_assoc()) {
                                        $i++;
                                        $vaccine_data_id = $result['vaccine_data_id'];

                                        $date_next = $result['vaccine_data_date_next'];
                                        $date = date('Y-m-d');
                                        $next_day = round(abs(strtotime($date) - strtotime($date_next))/60/60/24);

                                        if($next_day  <= $action){
                                        ?>
                                                <tr>
                                                    <td> <?php echo $i;?> </td>
                                                    <td><?php echo $result['student_name'];?> <?php echo $result['student_last'];?> </td>
                                                    <td><?php echo $result['vaccine_name'];?></td>
                                                    <td><?php echo $result['vaccine_data_quantity'];?></td>
                                                    <td><?php echo $result['vaccine_data_date'];?></td>
                                                    <td><?php echo $result['vaccine_data_date_next'];?></td>
                                                    <td><?php echo $result['vaccine_data_note'];?></td>
                                                    <td><?php echo $result['staff_name'];?> <?php echo $result['staff_lastname'];?></td>
                                                    <td>
                                                        <?php
                                                        echo $next_day;
                                                        echo ' วัน';
                                                        ?>
                                                    </td>
                                                </tr>



                                                <?php  } ?>

                                                <?php  } ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>



                </div>
            </div>
        </div>
    </div>
</div>






<?php include "footer.php";?>
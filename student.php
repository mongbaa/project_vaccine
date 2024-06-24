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



                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
											เพิ่มข้อมูลนักเรียน
			    </button>

                <!-- Modal -->

                <form  method="post" class="row g-3 needs-validation" novalidate>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                        เพิ่มข้อมูลนักเรียน
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row g-3"> 

                                                    <div class="col-md-12">
                                                        <label for="validationCustomUsername" class="form-label"> ชื่อ</label>
                                                        <div class="input-group has-validation">
                                                            <input type="text" name="student_name" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required />
                                                            <div class="invalid-feedback">
                                                                กรุณากรอก ชื่อ
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="validationCustomUsername" class="form-label"> นามสกุล</label>
                                                        <div class="input-group has-validation">
                                                            <input type="text" name="student_last" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required />
                                                            <div class="invalid-feedback">
                                                                กรุณากรอก นามสกุล
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="validationCustomUsername" class="form-label"> ชื่อเล่น </label>
                                                        <div class="input-group has-validation">
                                                            <input type="text" name="student_nickname" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required />
                                                            <div class="invalid-feedback">
                                                                กรุณากรอก ชื่อเล่น
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <label for="validationCustomUsername" class="form-label"> วันเดือนปีเกิด </label>
                                                        <div class="input-group has-validation">
                                                            <input type="date" name="student_bd" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required />
                                                            <div class="invalid-feedback">
                                                                กรุณากรอก วันเดือนปีเกิด
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-12">
                                                        <label for="validationCustomUsername" class="form-label"> รูปภาพ</label>
                                                        <div class="input-group has-validation">
                                                            <input type="file" name="student_img" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required />
                                                            <div class="invalid-feedback">
                                                                กรุณากรอก ภาพ
                                                            </div>
                                                        </div>
                                                    </div>




                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button  name = "add_student" class="btn btn-primary" type="submit" value="add_student">
                                            Submit form
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>

  <?php

  if(!empty($_POST['add_student'])){

    include "config.inc.php";

    $student_name  = $_POST['student_name'];


    if (isset($_POST['student_name'])  && !empty($_POST['student_name'])) {
        $student_name = $conn->real_escape_string($_POST['student_name']);
    } else {
        $student_name = '';
    }

    if (isset($_POST['student_last'])  && !empty($_POST['student_last'])) {
        $student_last = $conn->real_escape_string($_POST['student_last']);
    } else {
        $student_last = '';
    }

    if (isset($_POST['student_nickname'])  && !empty($_POST['student_nickname'])) {
        $student_nickname = $conn->real_escape_string($_POST['student_nickname']);
    } else {
        $student_nickname = '';
    }

    if (isset($_POST['student_bd'])  && !empty($_POST['student_bd'])) {
        $student_bd = $conn->real_escape_string($_POST['student_bd']);
    } else {
        $student_bd = '';
    }

    $student_img = "img";
    $room_id = 1;

    $sql_in = "INSERT INTO tbl_student  (student_id, room_id, student_name, student_last, student_nickname, student_bd, student_img, student_status)
                                 VALUES (null, '$room_id', '$student_name', '$student_last', '$student_nickname', '$student_bd', '$student_img', 1 )";
    $conn->query($sql_in);

    // INSERT INTO tbl_student (student_id, room_id, student_name, student_last, student_nickname, student_bd, student_img, student_status)
    //  VALUES (NULL, '$room_id', '$student_name', '$student_last', '$student_nickname', '$student_bd', '$student_img', '$student_status')



    $conn -> close();


    echo "<script type='text/javascript'>";
    echo "window.location='student.php';";
    echo "</script>";



  }

  ?>



                <br>





                    <div class="row gx-3">
                        <div class="col-xxl-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-hover m-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ลำดับที่</th>
                                                    <th scope="col"> รูป </th>
                                                    <th scope="col">ห้อง</th>
                                                    <th scope="col">ชื่อ - สกุล</th>
                                                    <th scope="col">ชื่อเล่น </th>
                                                    <th scope="col">วันเดือนปีเกิด</th>
                                                    <th scope="col">จัดการข้อมูล</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                        <?php
                                        include "config.inc.php";
                                        $sql = " SELECT * FROM tbl_student ORDER BY student_id DESC ";
                                        $query = $conn->query($sql);
                                        while ($result = $query->fetch_assoc()) {
                                        ?>


                                                <tr>
                                                    <td>#</td>
                                                    <td scope="row">
                                                        <img class="rounded-circle img-3x me-2"
                                                            src="assets/images/user.png" alt="Bootstrap Gallery" />
                                                    </td>
                                                    <td><?php echo $result['room_id'];?></td>
                                                    <td><?php echo $result['student_name'];?> <?php echo $result['student_last'];?></td>
                                                    <td><?php echo $result['student_nickname'];?></td>
                                                    <td><?php echo $result['student_bd'];?></td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm" href="#"><i  class="bi bi-pencil"></i></a>
                                                        <a class="btn btn-danger btn-icon btn-sm mb-1" href="#"><i class="bi bi-trash"></i></a>
                                                    </td>
                                                </tr>

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
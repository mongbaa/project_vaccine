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

                    <form method="post" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            เพิ่มข้อมูลนักเรียน
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row g-3">

                                            <div class="col-md-12">
                                                <label for="validationCustomUsername" class="form-label"> ชื่อ</label>
                                                <div class="input-group has-validation">
                                                    <input type="text" name="student_name" class="form-control"
                                                        id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" required />
                                                    <div class="invalid-feedback">
                                                        กรุณากรอก ชื่อ
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="validationCustomUsername" class="form-label">
                                                    นามสกุล</label>
                                                <div class="input-group has-validation">
                                                    <input type="text" name="student_last" class="form-control"
                                                        id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" required />
                                                    <div class="invalid-feedback">
                                                        กรุณากรอก นามสกุล
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="validationCustomUsername" class="form-label"> ชื่อเล่น
                                                </label>
                                                <div class="input-group has-validation">
                                                    <input type="text" name="student_nickname" class="form-control"
                                                        id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" required />
                                                    <div class="invalid-feedback">
                                                        กรุณากรอก ชื่อเล่น
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <label for="validationCustomUsername" class="form-label"> วันเดือนปีเกิด
                                                </label>
                                                <div class="input-group has-validation">
                                                    <input type="date" name="student_bd" class="form-control"
                                                        id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" required />
                                                    <div class="invalid-feedback">
                                                        กรุณากรอก วันเดือนปีเกิด
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-12">
                                                <label for="validationCustomUsername" class="form-label"> รูปภาพ</label>
                                                <div class="input-group has-validation">
                                                    <input type="file" name="student_img" class="form-control"
                                                        id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" required />
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
                                        <button name="add_student" class="btn btn-primary" type="submit"
                                            value="add_student">
                                            Submit form
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php


    if(!empty($_POST['del_student'])){

        $student_id = $_POST['student_id'];

        include "config.inc.php";
        if (isset($_POST['student_id'])  && !empty($_POST['student_id'])) {

        $sql_del = "DELETE FROM tbl_student WHERE student_id = $student_id";
        $conn->query($sql_del);

        }
        $conn -> close();

        echo "<script type='text/javascript'>";
        echo "window.location='student.php';";
        echo "</script>";
    }




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

   // $student_img = "img";
    $room_id = 1;


    if (isset($_POST['student_id'])  && !empty($_POST['student_id'])) {

        $student_id = $_POST['student_id'];

        if ($_FILES["student_img"]["name"] != "") // เช็คค่ารับไฟล์ ถ้ามีไฟล์ส่งมาให้ทำตามเงือนไขต่อไป
        {
            $new_name = "student_img_" . date('Ymdhis') . ".WebP";
            if (move_uploaded_file($_FILES["student_img"]["tmp_name"], "student_img/" . $new_name)) //อัพไฟล์ขึ้น
            {
                $student_img = $new_name;

                $student_img_unlink = $_POST['student_img_s'];
                if(!empty($_POST['student_img_s'])){
                 @unlink("student_img/$student_img_unlink");
                }
            }
        } else {
                $student_img = $_POST['student_img_s'];
        }


        $sql_update = "UPDATE tbl_student SET
                        room_id = '$room_id',
                        student_name = '$student_name',
                        student_last = '$student_last',
                        student_nickname = '$student_nickname',
                        student_bd = '$student_bd',
                        student_img = '$student_img'
                        WHERE tbl_student.student_id = $student_id";
        $conn->query($sql_update);

    }else{

        if ($_FILES["student_img"]["name"] != "") // เช็คค่ารับไฟล์ ถ้ามีไฟล์ส่งมาให้ทำตามเงือนไขต่อไป
        {
            $new_name = "student_img_" . date('Ymdhis') . ".WebP";
            if (move_uploaded_file($_FILES["student_img"]["tmp_name"], "student_img/" . $new_name)) //อัพไฟล์ขึ้น
            {
                $student_img = $new_name;
            }
        } else {
                $student_img = '';
        }

        $sql_in = "INSERT INTO tbl_student  (student_id, room_id, student_name, student_last, student_nickname, student_bd, student_img, student_status)
                                     VALUES (null, '$room_id', '$student_name', '$student_last', '$student_nickname', '$student_bd', '$student_img', 1 )";
        $conn->query($sql_in);



    }

 


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
                                        $i = 0;
                                        while ($result = $query->fetch_assoc()) {
                                        $i++;
                                        $student_id = $result['student_id'];
                                        ?>

                                                <tr>
                                                    <td> <?php echo $i;?> </td>
                                                    <td scope="row">

                                                        <?php if(!empty($result['student_img'])){?>
                                                        <img class="rounded-circle img-3x me-2"
                                                            src="student_img/<?php echo $result['student_img'];?>"
                                                            alt="Bootstrap Gallery" />
                                                        <?php } ?>

                                                    </td>
                                                    <td><?php echo $result['room_id'];?></td>
                                                    <td><?php echo $result['student_name'];?>
                                                        <?php echo $result['student_last'];?></td>
                                                    <td><?php echo $result['student_nickname'];?></td>
                                                    <td><?php echo $result['student_bd'];?></td>
                                                    <td>

                                                        <button type="button" class="btn btn-info btn-sm"
                                                            data-bs-toggle="modal" data-bs-target="#EditModal<?php echo $student_id;?>">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-bs-toggle="modal" data-bs-target="#DelModal<?php echo $student_id;?>">
                                                            <i class="bi bi-trash"></i>
                                                        </button>

                                                    </td>
                                                </tr>




                                                <form name="Edit<?php echo $student_id;?>" method="post" class="row g-3 needs-validation" novalidate  enctype="multipart/form-data">
                                                    <div class="modal fade" id="EditModal<?php echo $student_id;?>" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalLabel">
                                                                        แก้ไขข้อมูลนักเรียน <?php echo $student_id;?>
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                <input name="student_id" type="hidden" value="<?php echo $result['student_id']; ?>" />
                                                                    <div class="row g-3">
                                                                        <div class="col-md-12">
                                                                            <label
                                                                                for="validationCustomUsername"
                                                                                class="form-label"> ชื่อ</label>
                                                                            <div
                                                                                class="input-group has-validation">
                                                                                <input type="text"
                                                                                    name="student_name"
                                                                                    class="form-control"
                                                                                    id="validationCustomUsername"
                                                                                    aria-describedby="inputGroupPrepend"
                                                                                    value = "<?php echo $result['student_name'];?>"
                                                                                    required />
                                                                                <div class="invalid-feedback">
                                                                                    กรุณากรอก ชื่อ
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label
                                                                                for="validationCustomUsername"
                                                                                class="form-label">
                                                                                นามสกุล</label>
                                                                            <div
                                                                                class="input-group has-validation">
                                                                                <input type="text"
                                                                                    name="student_last"
                                                                                    class="form-control"
                                                                                    id="validationCustomUsername"
                                                                                    aria-describedby="inputGroupPrepend"
                                                                                    value = "<?php echo $result['student_last'];?>"
                                                                                    required />
                                                                                <div class="invalid-feedback">
                                                                                    กรุณากรอก นามสกุล
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label
                                                                                for="validationCustomUsername"
                                                                                class="form-label"> ชื่อเล่น
                                                                            </label>
                                                                            <div
                                                                                class="input-group has-validation">
                                                                                <input type="text"
                                                                                    name="student_nickname"
                                                                                    class="form-control"
                                                                                    id="validationCustomUsername"
                                                                                    aria-describedby="inputGroupPrepend"
                                                                                    value = "<?php echo $result['student_nickname'];?>"
                                                                                    required />
                                                                                <div class="invalid-feedback">
                                                                                    กรุณากรอก ชื่อเล่น
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-md-12">
                                                                            <label
                                                                                for="validationCustomUsername"
                                                                                class="form-label">
                                                                                วันเดือนปีเกิด </label>
                                                                            <div
                                                                                class="input-group has-validation">
                                                                                <input type="date"
                                                                                    name="student_bd"
                                                                                    class="form-control"
                                                                                    id="validationCustomUsername"
                                                                                    aria-describedby="inputGroupPrepend"
                                                                                    value = "<?php echo $result['student_bd'];?>"
                                                                                    required />
                                                                                <div class="invalid-feedback">
                                                                                    กรุณากรอก วันเดือนปีเกิด
                                                                                </div>
                                                                            </div>
                                                                        </div>



                                                                        <div class="col-md-12">
                                                                            <label
                                                                                for="validationCustomUsername"
                                                                                class="form-label">
                                                                                รูปภาพ</label>
                                                                            <div
                                                                                class="input-group has-validation">
                                                                                <input type="file"
                                                                                    name="student_img"
                                                                                    class="form-control"
                                                                                    id="validationCustomUsername"
                                                                                    aria-describedby="inputGroupPrepend"
                                                                                    required />
                                                                                <input name="student_img_s" type="hidden" value="<?php echo $result['student_img']; ?>" />

                                                                                <div class="invalid-feedback">
                                                                                    กรุณากรอก ภาพ
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <button name="add_student"
                                                                        class="btn btn-primary" type="submit"
                                                                        value="add_student">
                                                                        Submit form
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>



                                                <form name="Del<?php echo $student_id;?>" method="post" class="row g-3 needs-validation" novalidate  enctype="multipart/form-data">
                                                    <div class="modal fade" id="DelModal<?php echo $student_id;?>" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalLabel">
                                                                       <font color = '#fff'> ลบข้อมูลนักเรียน (<?php echo $student_id;?>) </font>
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <input name="student_id" type="hidden" value="<?php echo $result['student_id']; ?>" /> 
                                                                    <h2> ยืนยันการลบอีกครั้ง </h2>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        ยกเลิก
                                                                    </button>
                                                                    <button name="del_student"
                                                                        class="btn btn-danger" type="submit"
                                                                        value="del_student">
                                                                        ยืนยัน
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>



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
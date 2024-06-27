<?php include "header.php";?>


					<!-- App hero header starts -->
					<div class="app-hero-header d-flex align-items-start">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<i class="bi bi-house lh-1"></i>
								<a href="index.php" class="text-decoration-none">หน้าหลัก</a>
							</li>
							<li class="breadcrumb-item" aria-current="page">Dashboard</li>
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


											<?php
											include "config.inc.php";
											$sql = "SHOW TABLES FROM db_project_vaccine";
											$query = $conn->query($sql);
											while ($result = $query->fetch_assoc())
											{
											$Tables = $result["Tables_in_db_project_vaccine"];

											echo  $Tables;
											echo  "<br>";
											}

											?>


									</div>
								</div>
							</div>
						</div>
					</div>






<?php include "footer.php";?>

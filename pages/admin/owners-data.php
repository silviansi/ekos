<!DOCTYPE html>
<html lang="en">

<head>
  <title>eKos - Data Pemilik Kos</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

<!-- [Favicon] icon -->
<link rel="icon" href="../../assets/img/logo.png" type="image/x-icon">  
<!-- [Google Font] Family -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="../../assets/fonts/tabler-icons.min.css" >
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="../../assets/fonts/feather.css" >
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="../../assets/fonts/fontawesome.css" >
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="../../assets/fonts/material.css" >
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="../../assets/css/style.css" id="main-style-link" >
<link rel="stylesheet" href="../../assets/css/style-preset.css" >

</head>
<body>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
<?php require '../../includes/sidebar.php'; ?>

<!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
<?php require '../../includes/header.php'; ?>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pc-container">
  <div class="pc-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h5 class="m-b-10">Data Pemilik Kos</h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="/ekos/dashboard.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="javascript: void(0)">Manajemen Pengguna</a></li>
              <li class="breadcrumb-item" aria-current="page">Data Pemilik Kos</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-sm-12">
        <div class="card">
          <div class="col-md-12">
            <div class="card table-card latest-activity-card">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5>Latest Order</h5>
                <a href="#" class="link-primary">View all</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-borderless">
                    <thead>
                      <tr>
                        <th>Customer</th>
                        <th>Order ID</th>
                        <th>Photo</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>John Deo</td>
                        <td>#81412314</td>
                        <td><img src="../assets/images/widget/PHONE1.jpg" alt="" class="img-fluid"></td>
                        <td>Moto G5</td>
                        <td>10</td>
                        <td>17-2-2017</td>
                        <td><label class="badge bg-light-warning">Pending</label></td>
                        <td
                          ><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-success"></i></a
                          ><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-danger"></i></a
                        ></td>
                      </tr>
                      <tr>
                        <td>Jenny William</td>
                        <td>#68457898</td>
                        <td><img src="../assets/images/widget/PHONE2.jpg" alt="" class="img-fluid"></td>
                        <td>iPhone 8</td>
                        <td>16</td>
                        <td>20-2-2017</td>
                        <td><label class="badge bg-light-primary">Paid</label></td>
                        <td
                          ><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-success"></i></a
                          ><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-danger"></i></a
                        ></td>
                      </tr>
                      <tr>
                        <td>Lori Moore</td>
                        <td>#45457898</td>
                        <td><img src="../assets/images/widget/PHONE3.jpg" alt="" class="img-fluid"></td>
                        <td>Redmi 4</td>
                        <td>20</td>
                        <td>17-2-2017</td>
                        <td><label class="badge bg-light-success">Success</label></td>
                        <td
                          ><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-success"></i></a
                          ><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-danger"></i></a
                        ></td>
                      </tr>
                      <tr>
                        <td>Austin Pena</td>
                        <td>#62446232</td>
                        <td><img src="../assets/images/widget/PHONE4.jpg" alt="" class="img-fluid"></td>
                        <td>Jio</td>
                        <td>15</td>
                        <td>25-4-2017</td>
                        <td><label class="badge bg-light-danger">Failed</label></td>
                        <td
                          ><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-success"></i></a
                          ><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-danger"></i></a
                        ></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="text-end m-r-20">
                  <a href="#!" class="b-b-primary text-primary">View all Orders</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
  </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
  <div class="footer-wrapper container-fluid">
    <div class="row">
      <div class="col-sm my-1">
        <p class="m-0"
          >Mantis &#9829; crafted by Team <a href="https://themeforest.net/user/codedthemes" target="_blank">Codedthemes</a> Distributed by <a href="https://themewagon.com/">ThemeWagon</a>.</p
        >
      </div>
      <div class="col-auto my-1">
        <ul class="list-inline footer-link mb-0">
          <li class="list-inline-item"><a href="/ekos/dashboard.php">Beranda</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer> 

<!-- Required Js -->
<script src="../../assets/js/plugins/popper.min.js"></script>
<script src="../../assets/js/plugins/simplebar.min.js"></script>
<script src="../../assets/js/plugins/bootstrap.min.js"></script>
<script src="../../assets/js/fonts/custom-font.js"></script>
<script src="../../assets/js/pcoded.js"></script>
<script src="../../assets/js/plugins/feather.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
<title>Sample Page | Mantis Bootstrap 5 Admin Template</title>
<!-- [Meta] -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
<meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
<meta name="author" content="CodedThemes">

<!-- [Favicon] icon -->
<link rel="icon" href="../../assets/images/favicon.svg" type="image/x-icon"> 
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
<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
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
                <h5 class="m-b-10">Kelola Pengguna</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/ekos/dashboard.php">Beranda</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Manajemen Pengguna</a></li>
                <li class="breadcrumb-item" aria-current="page">Kelola Pengguna</li>
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
            <div class="card-body">
                <div class="col-md-12">
                <h5 class="mb-3">Recent Orders</h5>
                <div class="card tbl-card">
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless mb-0">
                        <thead>
                            <tr>
                            <th>TRACKING NO.</th>
                            <th>PRODUCT NAME</th>
                            <th>TOTAL ORDER</th>
                            <th>STATUS</th>
                            <th class="text-end">TOTAL AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td><a href="#" class="text-muted">84564564</a></td>
                            <td>Camera Lens</td>
                            <td>40</td>
                            <td><span class="d-flex align-items-center gap-2"><i
                                    class="fas fa-circle text-danger f-10 m-r-5"></i>Rejected</span>
                            </td>
                            <td class="text-end">$40,570</td>
                            </tr>
                            <tr>
                            <td><a href="#" class="text-muted">84564564</a></td>
                            <td>Laptop</td>
                            <td>300</td>
                            <td><span class="d-flex align-items-center gap-2"><i
                                    class="fas fa-circle text-warning f-10 m-r-5"></i>Pending</span>
                            </td>
                            <td class="text-end">$180,139</td>
                            </tr>
                            <tr>
                            <td><a href="#" class="text-muted">84564564</a></td>
                            <td>Mobile</td>
                            <td>355</td>
                            <td><span class="d-flex align-items-center gap-2"><i
                                    class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span></td>
                            <td class="text-end">$180,139</td>
                            </tr>
                            <tr>
                            <td><a href="#" class="text-muted">84564564</a></td>
                            <td>Camera Lens</td>
                            <td>40</td>
                            <td><span class="d-flex align-items-center gap-2"><i
                                    class="fas fa-circle text-danger f-10 m-r-5"></i>Rejected</span>
                            </td>
                            <td class="text-end">$40,570</td>
                            </tr>
                            <tr>
                            <td><a href="#" class="text-muted">84564564</a></td>
                            <td>Laptop</td>
                            <td>300</td>
                            <td><span class="d-flex align-items-center gap-2"><i
                                    class="fas fa-circle text-warning f-10 m-r-5"></i>Pending</span>
                            </td>
                            <td class="text-end">$180,139</td>
                            </tr>
                            <tr>
                            <td><a href="#" class="text-muted">84564564</a></td>
                            <td>Mobile</td>
                            <td>355</td>
                            <td><span class="d-flex align-items-center gap-2"><i
                                    class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span></td>
                            <td class="text-end">$180,139</td>
                            </tr>
                            <tr>
                            <td><a href="#" class="text-muted">84564564</a></td>
                            <td>Camera Lens</td>
                            <td>40</td>
                            <td><span class="d-flex align-items-center gap-2"><i
                                    class="fas fa-circle text-danger f-10 m-r-5"></i>Rejected</span>
                            </td>
                            <td class="text-end">$40,570</td>
                            </tr>
                            <tr>
                            <td><a href="#" class="text-muted">84564564</a></td>
                            <td>Laptop</td>
                            <td>300</td>
                            <td><span class="d-flex align-items-center gap-2"><i
                                    class="fas fa-circle text-warning f-10 m-r-5"></i>Pending</span>
                            </td>
                            <td class="text-end">$180,139</td>
                            </tr>
                            <tr>
                            <td><a href="#" class="text-muted">84564564</a></td>
                            <td>Mobile</td>
                            <td>355</td>
                            <td><span class="d-flex align-items-center gap-2"><i
                                    class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span></td>
                            <td class="text-end">$180,139</td>
                            </tr>
                            <tr>
                            <td><a href="#" class="text-muted">84564564</a></td>
                            <td>Mobile</td>
                            <td>355</td>
                            <td><span class="d-flex align-items-center gap-2"><i
                                    class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span></td>
                            <td class="text-end">$180,139</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
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
            <li class="list-inline-item"><a href="../index.html">Home</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer> <!-- Required Js -->
<script src="../../assets/js/plugins/popper.min.js"></script>
<script src="../../assets/js/plugins/simplebar.min.js"></script>
<script src="../../assets/js/plugins/bootstrap.min.js"></script>
<script src="../../assets/js/fonts/custom-font.js"></script>
<script src="../../assets/js/pcoded.js"></script>
<script src="../../assets/js/plugins/feather.min.js"></script>
<script>layout_change('light');</script>
<script>change_box_container('false');</script>
<script>layout_rtl_change('false');</script>
<script>preset_change("preset-1");</script>
<script>font_change("Public-Sans");</script>
</body>
</html>
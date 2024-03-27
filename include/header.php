<?php
ob_start();
session_start();
if ($_SESSION['loginStatus'] == '') {
    header("location: ../");
}
?>
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getnotificationbyemployeeid/1',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$result_notification = json_decode($response,true);
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>Weblock ERP</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicona.png">
    <!-- Pignose Calender -->
    <link href="../plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">

    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Chartist -->
    <link rel="stylesheet" href="../plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- page css -->
    <link href="../plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>

    <style>
        .nav-header .brand-logo a span {
            font-size: 1.7rem;
            color: white;
        }

        .dataTables_filter input {
            border: 1px solid #CED4DA;
        }

        .dataTables_length select {
            border: 1px solid #CED4DA;
        }

        .file-upload{display:block;text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px;}
.file-upload .file-select{display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select .file-select-button{background:#dce4ec;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
.file-upload .file-select:hover{border-color:#34495e;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select:hover .file-select-button{background:#34495e;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select{border-color:#3fa46a;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select .file-select-button{background:#3fa46a;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select input[type=file]{z-index:100;cursor:pointer;position:absolute;height:100%;width:100%;top:0;left:0;opacity:0;filter:alpha(opacity=0);}
.file-upload .file-select.file-select-disabled{opacity:0.65;}
.file-upload .file-select.file-select-disabled:hover{cursor:default;display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;margin-top:5px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select.file-select-disabled:hover .file-select-button{background:#dce4ec;color:#666666;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select.file-select-disabled:hover .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
    </style>
    <style>
        [data-nav-headerbg="color_1"] .nav-header {
            background-color: #111B27;
        }

        .nav-header {
            position: fixed;
        }

        .nav-header .brand-logo a {
            padding: 0.607rem 1.8125rem;
            display: block;
        }

        .header {
            position: fixed;
        }

        /* other page css important*/
        .content-body {
            padding-top: 80px;
        }

        .page-item.active .page-link {
            background-color: #09AFF4;
        }

        .btn-primary {
            background-color: #09AFF4;
            border: transparent;
        }

        .btn-primary:hover {
            background-color: #111B27;
            border: transparent;
        }
    </style>   
     <div id="main-wrapper">

<div class="nav-header">
    <div class="brand-logo">
        <a>
            <span class="brand-title">
                <!-- Weblock -->
                <img src="../images/logo-1.png" alt="" width="120px">
            </span>
        </a>
    </div>
</div>
<div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="fa-solid fa-bars"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="fa-regular fa-bell"></i>
                                <span class="badge badge-pill gradient-2"><?php echo $result_notification['data']['numberOfnotifications']; ?></span>
                            </a>
                            
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication" style="max-height: 400px; overflow-y: auto;">
                                
                                <div class="dropdown-content-body">
                                    <ul>
                                        <?php
                                        foreach($result_notification['data']['notificationsData'] as $notification)
                                        {
                                        ?>
                                        <li>
                                            <a href="javascript:void()">
                                                <h4><?php echo $notification['fromDetails']['name']; ?></h4>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading"><?php echo $notification['notificationTitle']; ?></h6>
                                                    <span class="notification-text"><?php echo $notification['notificationBody']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                    
                                    </ul>

                                </div>
                            </div>

                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="../images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="../include/logout.php"><i
                                                    class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        <style>
            .nk-sidebar {
                background-color: #111B27;
                position: fixed;
            }

            #menu {
                background-color: #111B27;
            }

            .nav-text {
                color: white;
                font-size: 15px;
            }

            .nk-sidebar .metismenu>li a>i {
                color: #09AFF4;
                font-size: 15px;
                margin-right: 10px;
            }

            .nk-sidebar .metismenu .mega-menu ul.in li a:hover {
                color: #09AFF4;
            }

            .nk-sidebar .metismenu .mega-menu ul.in li a.active {
                color: #09AFF4;
            }
        </style>
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">

                    <li>
                        <a href="../dashboard" aria-expanded="false">
                            <i class="fa-solid fa-gauge"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="../employee" aria-expanded="false">
                            <i class="fa-solid fa-address-book"></i><span class="nav-text">Employee</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-inbox"></i><span class="nav-text">Inbox</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="../inbox/attendance.php">Attendance Request</a></li>
                            <li><a href="../inbox/leave.php">Leave Request</a></li>
                            <li><a href="../inbox/profile.php">Profile Update Request</a></li>
                            <!-- <li><a href="../inbox/exit.php">Employee Exit Request</a></li> -->
                        </ul>
                    </li>
                    
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-list-check"></i><span class="nav-text">PMS</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="../pms/index.php">Dashboard</a></li>
                            <li><a href="../pms/project.php">Project</a></li>
                            <li><a href="../pms/task.php">Task</a></li>
                        </ul>
                    </li>
                    
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-clipboard-user"></i><span class="nav-text">Attendance</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="../attendance/viewattendemployee.php">Monthly Attendance</a></li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="../overtime" aria-expanded="false">
                            <i class="fa-solid fa-clock"></i><span class="nav-text">Overtime</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="../holiday" aria-expanded="false">
                            <i class="fa-solid fa-holly-berry"></i><span class="nav-text">Holidays</span>
                        </a>
                    </li>
                    <li>
                        <a href="../leave" aria-expanded="false">
                            <i class="fa-solid fa-person-walking-arrow-right"></i><span class="nav-text">Leave</span>
                        </a>
                    </li>
                    <li>
                        <a href="../announcement" aria-expanded="false">
                        <i class="fa-solid fa-bullhorn"></i><span class="nav-text">Announcement</span>
                        </a>
                    </li>
                    <li>
                        <a href="../policy" aria-expanded="false">
                        <i class="fa-solid fa-file-invoice"></i><span class="nav-text">Policy</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-solid fa-gear"></i><span class="nav-text">Setting</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="../setting/working.php">Working Hours</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="../notification/" aria-expanded="false">
                        <i class="fa-solid fa-file-invoice"></i><span class="nav-text">Notifications</span>
                        </a>
                    </li>
                    <!-- <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-solid fa-landmark"></i><span class="nav-text">Policy</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="../setting/index.php">Policy</a></li>
                            
                        </ul>
                    </li> -->
                    

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
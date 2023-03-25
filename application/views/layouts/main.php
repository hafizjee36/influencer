<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$page_title?></title>

    <!-- Bootstrap -->
    <link href="<?=base_url('assets/')?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url('assets/')?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url('assets/')?>vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- FullCalendar -->
    <link href="<?=base_url('assets/')?>vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/')?>vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

    <!-- iCheck -->
    <link href="<?=base_url('assets/')?>vendors/iCheck/skins/flat/_all.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?=base_url('assets/')?>vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?=base_url('assets/')?>vendors/select2/dist/css/select2.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url('assets/')?>build/css/custom.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?=base_url('assets/')?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/')?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/')?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/')?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/')?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <link href="<?=base_url('assets/')?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?=base_url('assets/')?>vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="<?=base_url('assets/')?>css/bootstrap-duallistbox.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/')?>css/hover-min.css" rel="stylesheet">
    <!--    ChartJS-->
    <script src="<?=base_url('assets/')?>vendors/Chart.js/dist/Chart.bundle.js"></script>
    <script src="<?=base_url('assets/')?>vendors/jquery/dist/jquery.min.js"></script>
    <!--    Toastr-->
    <script type="text/javascript" src="<?=base_url('assets/')?>toastr/toastr.min.js"></script>
    <link href="<?=base_url('assets/')?>toastr/toastr.min.css" rel="stylesheet">
    <style>
        .switch {
          position: relative;
          display: inline-block;
          width: 90px;
          height: 34px;
        }

        .switch input {display:none;}

        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ca2222;
          -webkit-transition: .4s;
          transition: .4s;
        }

        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }

        input:checked + .slider {
          background-color: #2ab934;
        }

        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
          -webkit-transform: translateX(55px);
          -ms-transform: translateX(55px);
          transform: translateX(55px);
        }

        /*------ ADDED CSS ---------*/
        .on
        {
          display: none;
        }

         .off
        {
          color: white;
          position: absolute;
          transform: translate(-50%,-50%);
          top: 50%;
          left: 50%;
          font-size: 15px;
          padding-left: 15px;
          font-family: Verdana, sans-serif;
        }
        .on
        {
          color: white;
          position: absolute;
          transform: translate(-50%,-50%);
          top: 50%;
          left: 50%;
          font-size: 15px;
          padding-right: 15px;
          font-family: Verdana, sans-serif;
        }

        input:checked+ .slider .on
        {display: block;}

        input:checked + .slider .off
        {display: none;}

        /*--------- END --------*/

        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }

        .slider.round:before {
          border-radius: 50%;}
        .fc-title{
            color: white !important;
        }
        .fc-time{
            color: white !important;
        }
        .tag-red {

            line-height: 1;
            background: #da4f49 !important;
            color: #fff !important;
        }
        .tag-orange {

            line-height: 1;
            background: orange !important;
            color: #fff !important;
        }
        .tag-blue {

            line-height: 1;
            background: dodgerblue !important;
            color: #fff !important;
        }
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
        .img-class{
            width: 100%;
        }
        @media only screen and (min-width: 451px) {
            .img-class{
/*                height: 100px !important; */
            }
            #menu_toggle{
                display: none;
            }
        }
        @media only screen and (max-width: 812px) {
            /* For mobile phones: */
            .img-class{
/*                height: 50px !important; */
            }
            #menu_toggle{
                display: block;
            }
        }
        
    </style>



</head>

<body class="nav-md"> 
    <script type="text/javascript">
      <?php if($this->session->flashdata('success')){  ?>
      toastr.success("<?=$this->session->flashdata('success'); ?>");
      <?php } if($this->session->flashdata('info')){  ?>
      toastr.info("<?=$this->session->flashdata('info'); ?>");
      <?php } if($this->session->flashdata('error')){  ?>
      toastr.error("<?=$this->session->flashdata('error'); ?>");
      <?php } ?>
    </script>
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view" style="background-color: #505458">
                    <div class="navbar nav_title text-center" hidden>
                        <a href="#"><img src="<?=base_url('assets/images/logo.png')?>" class="img-class"></a>
                        <!-- <a href="<?=base_url()?>">Exam</a> -->
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix" style="display: none">
                        <div class="profile_info" style="text-align: center">
                            <span>Welcome <i class="fa fa-smile-o"></i> <i style="color: white"><?=$this->session->userdata('first_name')." ".$this->session->userdata('last_name')?></i></span>
                            <h2 style="text-align: left" hidden><?=$this->session->userdata('first_name')." ".$this->session->userdata('last_name')?></h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Menu Items</h3>
                            <ul class="nav side-menu">
                                <li class="<?php if($this->uri->segment(1) == "dashboard"){echo 'active ';}?>">
                                    <a href="<?=base_url('dashboard')?>"><i class="fa fa-pie-chart"></i> Dashboard </a>
                                </li>
                                <?php if ($this->session->userdata('role') == SUPERADMIN) {?>
                                <li hidden class="<?php if($this->uri->segment(1) == "users"){echo 'active ';}?>">
                                    <a href="<?=base_url('users')?>"><i class="fa fa-users"></i> Users </a>
                                </li>
                                <li class="<?php if($this->uri->segment(1) == "twitter.html"){echo 'active ';}?>">
                                    <a href="<?=base_url('twitter.html')?>">
                                        <img src="<?=base_url('uploads/twitter.png')?>" width="100%">
                                    </a>
                                </li>
                                <li class="<?php if($this->uri->segment(1) == "instagram.html"){echo 'active ';}?>">
                                    <a href="<?=base_url('instagram.html')?>">
                                        <img src="<?=base_url('uploads/instagram.png')?>" width="100%">
                                    </a>
                                </li>
                                <li class="<?php if($this->uri->segment(1) == "tiktok.html"){echo 'active ';}?>">
                                    <a href="<?=base_url('tiktok.html')?>">
                                        <img src="<?=base_url('uploads/tiktok.png')?>" width="100%">
                                    </a>
                                </li>
                                <li class="<?php if($this->uri->segment(1) == "telegram.html"){echo 'active ';}?>">
                                    <a href="<?=base_url('telegram.html')?>">
                                        <img src="<?=base_url('uploads/telegram.jpg')?>" width="100%">
                                    </a>
                                </li>
                                <li hidden class="<?php if($this->uri->segment(1)=='influencer.html'){ echo "active"; }?>">
                                    <a href="<?php echo site_url('influencer.html');?>">
                                        <i class="fa fa-bar-chart"></i> <span>Influencer</span>
                                    </a>
                                </li>
                                <li hidden class="<?php if($this->uri->segment(1)=='hashtag.html'){ echo "active"; }?>">
                                    <a href="<?php echo site_url('hashtag.html');?>">
                                        <i class="fa fa-hashtag"></i> <span>Hashtag</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <?php if($this->session->userdata('img')){ ?>
                                    <img src="<?=base_url('uploads/'.$this->session->userdata('img'))?>" alt=""><?=$this->session->userdata('first_name')." ".$this->session->userdata('last_name')?>
                                    <?php }else{
                                        echo '<img src="https://i.pinimg.com/originals/ac/b9/90/acb990190ca1ddbb9b20db303375bb58.jpg" class="rounded-circle user_img">';
                                    } ?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"  href="<?=base_url('profile')?>"> Profile</a>
                                    <a class="dropdown-item"  href="<?=base_url('login/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>
                            <li role="presentation" class="nav-item dropdown open" hidden>
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green"><?php if (isset($_SESSION['site_id'])) { echo $this->data['tot_messages'];}?></span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                    <?php if (isset($_SESSION['site_id'])) {
                                        if (empty($this->data['messages'])) { ?>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span>
                                                <span>Your inbox is empty</span>
                                            </span>
                                        </a>
                                    </li>
                                    <?php }else{
                                     foreach ($this->data['messages'] as $m){ ?>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image" hidden><img src="<?=base_url('uploads/')?>1.jpg" alt="Profile Image"></span>
                                            <span>
                                                <span><?=$m['user_f_name'].' '.$m['user_l_name']?></span>
                                                <span class="time"><?=date('Y-m-d h:i A',strtotime($m['date_created']))?></span>
                                            </span>
                                            <span class="message"><?=$m['message']?></span>
                                        </a>
                                    </li>
                                    <?php } }}?>
                                    <li class="nav-item" hidden>
                                        <div class="text-center">
                                            <a href="#" class="dropdown-item">
                                                <strong>See All Messages</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="container">

                    <?php	if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    © <?=date('Y')?> Influencer - Powered By <a href="#">Hafiz Hassan</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
<!-- Bootstrap -->
<script src="<?=base_url('assets/')?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url('assets/')?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?=base_url('assets/')?>vendors/nprogress/nprogress.js"></script>
<!-- ECharts -->
<script src="<?=base_url('assets/')?>vendors/echarts/dist/echarts.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/echarts/map/js/world.js"></script>


<script src="<?=base_url('assets/')?>vendors/iCheck/icheck.min.js"></script>
<!-- Switchery -->
<script src="<?=base_url('assets/')?>vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/')?>vendors/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?=base_url('assets/')?>vendors/moment/min/moment.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="<?=base_url('assets/')?>vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=base_url('assets/')?>js/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Custom Theme Scripts -->
<!-- FullCalendar -->
<script src="<?=base_url('assets/')?>vendors/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Datatables -->
<script src="<?=base_url('assets/')?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?=base_url('assets/')?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/jszip/dist/jszip.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="<?=base_url('assets/')?>build/js/custom.js"></script>

<script>
    $(document).ready(function() {
        $('#datatable2').dataTable();
        $('#datatable3').dataTable();
        $('#buttonTable').dataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'csvHtml5',
                // 'pdfHtml5'
            ]
        } );
    } );
    $('.select2').select2();
    $('.date_picker').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('.time_picker').datetimepicker({
        format: 'hh:mm A'
    });
    $('.dual_listbox').bootstrapDualListbox();
</script>
</body>
</html>


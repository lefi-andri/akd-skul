<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($title) ? $title : 'Aplikasi Akademik'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/w3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/w3-theme-blue.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pace.css">
    <style type="text/css" title="currentStyle"> 
        @import "<?php echo base_url(); ?>assets/css/ui/demo_table_jui.css";
        @import "<?php echo base_url(); ?>assets/css/ui/jquery-ui-1.10.4.custom.min.css";
        @import "<?php echo base_url(); ?>assets/css/perfect-scrollbar.css";
        @import "<?php echo base_url(); ?>assets/css/sweetalert2.css";
        @import "<?php echo base_url(); ?>assets/plugins/chosen/chosen.min.css";
    </style>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/global.css" />

    <style type="text/css">
        .tbl th.header { 
            background-image: url(<?php echo base_url(); ?>assets/js/table.sorter/themes/blue/bg.gif);
            cursor: pointer; 
            font-weight: bold; 
            background-repeat: no-repeat; 
            background-position: center left; 
            padding-left: 20px; 
            margin-left: -1px; 
        }

        .tbl th.headerSortUp { 
          background-image: url(<?php echo base_url(); ?>assets/js/table.sorter/themes/blue/asc.gif);
          cursor: pointer; 
            font-weight: bold; 
            background-repeat: no-repeat; 
            background-position: center left; 
            padding-left: 20px; 
            margin-left: -1px; 

        } 
        .tbl th.headerSortDown { 
          background-image: url(<?php echo base_url(); ?>assets/js/table.sorter/themes/blue/desc.gif);
          cursor: pointer; 
            font-weight: bold; 
            background-repeat: no-repeat; 
            background-position: center left; 
            padding-left: 20px; 
            margin-left: -1px; 
        }
    </style>

    <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.number.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/table.sorter/jquery.tablesorter.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/w3codecolors.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/chosen/chosen.jquery.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>

    <script type="text/javascript">
        $(document).ready( function () {
            oTable = $('#example').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "oLanguage": {
                       "sLengthMenu": 'Tampil <select>'+
                         '<option value="10">10</option>'+
                         '<option value="20">20</option>'+
                         '<option value="30">30</option>'+
                         '<option value="40">40</option>'+
                         '<option value="50">50</option>'+
                         '<option value="100">100</option>'+
                         '<option value="-1">Semua Data</option>'+
                         '</select> records'
                }
            });
        } );
    </script>

</head>
<body>

<nav id="left-nav" class="w3-sidenav w3-collapse w3-small w3-light-grey w3-card-4" style="z-index:11;width:250px;">
  <div id="menuTut" class="myMenu w3-accordion">
  <!--onmouseout="w3_hide_scroll()" onmouseover="w3_show_scroll()"-->
    <button onclick="myFunction('siswa')" class="w3-padding-hor-16 w3-btn-block w3-left-align w3-theme-dark"> Data Master <i class="fa fa-caret-down"></i></button>
    <div id="siswa" class="w3-accordion-content w3-theme-l4 w3-show">
        <?php echo anchor('siswa', '<i class="fa fa-group"></i> Data Siswa'); ?>
        <?php echo anchor('guru', '<i class="fa fa-user"></i> Data Guru'); ?>
        <?php echo anchor('materi-admin', '<i class="fa fa-file"></i> Materi Guru'); ?>		
    </div>

    <button onclick="myFunction('mapel')" class="w3-padding-hor-16 w3-btn-block w3-left-align w3-theme-dark"> Data Pelajaran <i class="fa fa-caret-down"></i></button>
    <div id="mapel" class="w3-accordion-content w3-theme-l4 w3-show">
        <?php echo anchor('mapel', '<i class="fa fa-file-text"></i> Mata Pelajaran'); ?>
        <?php echo anchor('waktu', '<i class="fa fa-clock-o" aria-hidden="true"></i> Data Waktu'); ?>
        <?php echo anchor('jadwal', '<i class="fa fa-calendar" aria-hidden="true"></i> Data Jadwal'); ?>
    </div>

    <button onclick="myFunction('pengaturan')" class="w3-padding-hor-16 w3-btn-block w3-left-align w3-theme-dark"> Aktifitas <i class="fa fa-caret-down"></i></button>
    <div id="pengaturan" class="w3-accordion-content w3-theme-l4 w3-show">
        <?php echo anchor('pengaturan', '<i class="fa fa-cog"></i> Pengaturan'); ?>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>
  
</nav>

<div class="w3-top">

    <div class="w3-row w3-theme-d4 w3-padding">
        <div class="w3-half" style="margin:10px 0 2px 0;"><button class="w3-btn w3-grey w3-hide-large w3-hover-black" onclick="w3_open();"><i class="fa fa-bars"></i></button><b> APLIKASI AKADEMIK</b><br><i style="font-size:12px;">Alamat</i></div>

        <div class="w3-half w3-margin-top w3-wide w3-hide-medium w3-hide-small"><div class="w3-right"><?php echo date('d-m-Y H:i:s'); ?></div></div>
    </div>

    <!-- Overlay effect when opening sidenav on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


    <div class="w3-main w3-hide-small w3-hide-medium">
        <ul class="w3-navbar w3-light-grey w3-small w3-card-4">
            <li><?php echo anchor('dashboard', '<i class="fa fa-dashboard"></i> Dashboard', array('class' => 'w3-padding-10')); ?></li>
            <li><?php echo anchor('kelas', '<i class="fa fa-file-text"></i> Data Kelas'); ?></li>
            <li><?php echo anchor('nilai-siswa', '<i class="fa fa-file"></i> Data Nilai Siswa'); ?></li>
            <li><?php echo anchor('nilai-un', '<i class="fa fa-file"></i> Data Nilai UN'); ?></li>
            

            <li class="w3-right"><?php echo anchor('logout', '<i class="fa fa-power-off"></i> Keluar', array('class' => 'w3-padding-10', 'onclick' => "return confirm('Klik OK Lanjutkan!')")); ?></li>

            <li class="w3-right"><a class="w3-padding-10" href="med.php?mod=bantuan"><i class="fa fa-question-circle"></i> Bantuan</a></li>
            
        </ul>
    </div>


</div>

<div class="w3-main" style="margin-left:250px;">
    <div id="main" class="w3-container" style="margin-top:110px">
        <?php echo $this->load->view('message'); ?>
        <?php echo $this->load->view($main_view); ?>
        <br>
    </div>
</div>

<script>
// Get the Sidenav
var mySidenav = document.getElementById("left-nav");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidenav, and add overlay effect
function w3_open() {
    if (mySidenav.style.display === 'block') {
        mySidenav.style.display = 'none';
        overlayBg.style.display = "none";
        mySidenav.className += " w3-animate-left";
    } else {
        mySidenav.style.display = 'block';
        overlayBg.style.display = "block";
        mySidenav.className += " w3-animate-left";
    }
}

// Close the sidenav with the close button
function w3_close() {
    mySidenav.style.display = "none";
    overlayBg.style.display = "none";
}

function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace("w3-show", "");
    }
}
</script>

<script type="text/javascript">
    $(document).ready(function() { 
        //document.getElementsByClassName("w3-sidenav")[0].style.overflow="scroll";
        // Perfect Scrollbarslide-out
        Ps.initialize(document.getElementById('left-nav'));
        $(".tbl").tablesorter();
        $(".chs").chosen();

        $("#msg-flash").delay(2000).fadeOut();
    });

    /*$(function() {
        $(document).tooltip();

        window.addEventListener("load", function() {

            jQuery("body").append("<div id=\"flash\"></div>");

            var canvas = document.getElementById("canvas");

            var pageSize = getPageSize();
            jQuery("#flash").css({ height: pageSize[1] + "px" });

        }, false);
    });*/
</script>
</body>
</html> 
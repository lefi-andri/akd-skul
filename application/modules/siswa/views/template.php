<!DOCTYPE html>
<html>
<title><?php echo isset($title) ? $title : 'Aplikasi Akademik'; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/w3.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/w3-theme-grey.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pace.css">
<!--<link rel="shortcut icon" href="favicon.ico" />-->

<style>
.w3-theme {color:#fff !important;background-color:#4CAF50 !important;}
.w3-btn {background-color:#4CAF50 ;margin-bottom:4px;}
.w3-code{border-left:4px solid #4CAF50}
@media only screen and (max-width: 601px) {.w3-top{position:static;} #main{margin-top:0px !important}}
</style>

<script src="<?php echo base_url(); ?>assets/js/pace.min.js"></script>
<body>

<div class="w3-top">
    <ul class="w3-navbar w3-theme-d4 w3-card-4">
        <li><?php echo anchor('profile-siswa', '<i class="fa fa-user"></i> Profile', array('class' => 'w3-padding-16')); ?></li>        
        <li><?php echo anchor('jadwal-siswa', '<i class="fa fa-user"></i> Jadwal Pelajaran', array('class' => 'w3-padding-16')); ?></li>        
        <li><?php echo anchor('materi-siswa', '<i class="fa fa-user"></i> Materi', array('class' => 'w3-padding-16')); ?></li>        
        <li><?php echo anchor('nilai-siswa1', '<i class="fa fa-user"></i> Nilai', array('class' => 'w3-padding-16')); ?></li>        
        

        <li class="w3-right"><?php echo anchor('logout', '<i class="fa fa-power-off"></i> Keluar', array('class' => 'w3-padding-16', 'onclick' => "return confirm('Klik OK Lanjutkan!')")); ?></li>

        <li class="w3-right"><a class="w3-padding-16" href="med.php?mod=bantuan"><i class="fa fa-question-circle"></i> Bantuan</a></li>
        
    </ul>
</div>

<div style="margin-top:60px;"></div>

<div class="w3-container">
    <div class="w3-row-padding">
        <div class="w3-col s12 m4 l3">
            <!-- Profile -->
              <div class="w3-card-2 w3-round w3-white">
                <div class="w3-container">
                 <p class="w3-center"><img src="<?php echo base_url();?>assets/images/siswa.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                 <hr>
                 <p>Selamat Datang <?php 
                 $nama = isset($lst_data['nama']) ? $lst_data['nama'] : ""; 
                 echo ucfirst($nama);
                 ?> 
                 di Aplikasi Akademik<br/> NIS anda : <b><?php echo $this->session->userdata('usernm'); ?></b></p>
                </div>
              </div>
        </div>
        <div class="w3-col s12 m8 l9">
            <?php $this->load->view($main_view); ?>
        </div>
    </div>
</div>


</body>
</html> 
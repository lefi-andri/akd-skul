<!DOCTYPE html>
<html>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/w3.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/w3-theme-light-blue.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pace.css">
<!--<link rel="shortcut icon" href="favicon.ico" />-->

<style>
body {
  background: url(<?php echo base_url(); ?>assets/images/bg6.png) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family: sans-serif;
}
.w3-theme {color:#fff !important;background-color:#4CAF50 !important;}
.w3-btn {background-color:#4CAF50 ;margin-bottom:4px;}
.w3-code{border-left:4px solid #4CAF50}
@media only screen and (max-width: 601px) {.w3-top{position:static;} #main{margin-top:0px !important}}
</style>

<script src="<?php echo base_url(); ?>assets/js/pace.min.js"></script>
<body class='w3-grey' onload="document.login.username.focus();">

<div class="w3-top">

  <div class="w3-row w3-theme-d4 w3-padding">
    <div class="w3-half" style="margin:10px 0 2px 0;"><b class='w3-text-shadow w3-text-bold w3-opacity'>APLIKASI AKADEMIK</b><br><i style="font-size:12px;">Pondok Pesantren AT- TAUHID Surabaya</i></div>
    <div class="w3-half w3-margin-top w3-wide w3-hide-medium w3-hide-small"><div class="w3-right">&nbsp;</div></div>
  </div>

  <div class="w3-navbar w3-light-grey w3-small w3-card-4" style="height:10px;"></div>
    

</div>

<div style="margin-top:100px;"></div>

<div class="w3-row-padding">
  <div class="w3-col s12 m12 l9">&nbsp;</div>

  <div class="w3-col s12 m12 l3 w3-card-2 w3-light-grey">
    <!-- Pesan start -->
    <?php if (!empty($pesan)) : ?>
        <div class="w3-container w3-yellow">
          <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">x</span> 
          <p><?php echo $pesan; ?></p>
        </div>
    <?php endif ?>
    <!-- pesan end -->
    
    <div class="w3-container w3-blue">
      <h2>Login</h2>
    </div>

    <?php echo form_open($form_action, array('class' => 'w3-container')); ?>
      <p>
        <label class="w3-label w3-text-black"><b>Username/NIP :</b></label>
        <input class="w3-input w3-border" type="text" name="username" placeholder="ketik username ... " required>
      </p>
      
      <p>
        <label class="w3-label w3-text-black"><b>Password :</b></label>
        <input class="w3-input w3-border" type="password" name="password" placeholder="ketik password ..." required>
      </p>
      <p>
        <label class="w3-label w3-text-black"><b>Pilih Pengguna :</b></label>
        <?php 
        echo 
        form_dropdown('user', $opt_user, set_value('user', isset($form_value['user']) ? $form_value['user'] : ''), 'class="w3-select w3-large"'); 
        ?>
      </p>

      <p><button class="w3-btn w3-blue w3-large" name="submit" value="submit">Login</button>
        <button class="w3-btn w3-amber w3-large" type="reset">Reset</button></p>
     
    </form>

  </div>
</div>

<div class="w3-bottom">
  <div class="w3-navbar w3-light-grey w3-small w3-card-4" style="height:10px;"></div>
</div>


</body>
</html> 
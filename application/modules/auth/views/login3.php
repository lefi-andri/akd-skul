<!DOCTYPE html>
<html>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/materialize/css/materialize.css">
<!--link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/w3.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/w3-theme-light-blue.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pace.css"-->
<!--<link rel="shortcut icon" href="favicon.ico" />-->

<style>
body {
  /*
  background: url(<?php echo base_url(); ?>assets/images/bg6.png) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family: sans-serif;
  */
}
/*
.w3-theme {color:#fff !important;background-color:#4CAF50 !important;}
.w3-btn {background-color:#4CAF50 ;margin-bottom:4px;}
.w3-code{border-left:4px solid #4CAF50}
@media only screen and (max-width: 601px) {.w3-top{position:static;} #main{margin-top:0px !important}}
*/
</style>

<!--script src="<?php echo base_url(); ?>assets/js/pace.min.js"></script-->
<body onload="document.login.username.focus();">
<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
    </div>
  </nav>
        
<div class="container">
        sdsdsdsds
</div>
<div class="input-field col s12">
    <select>
      <option value="" disabled selected>Choose your option</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Materialize Select</label>
  </div>

  <div class="input-field col s12">
    <select multiple>
      <option value="" disabled selected>Choose your option</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Materialize Multiple Select</label>
  </div>

  <div class="input-field col s12">
    <select multiple>
      <optgroup label="team 1">
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
      </optgroup>
      <optgroup label="team 2">
        <option value="3">Option 3</option>
        <option value="4">Option 4</option>
      </optgroup>
    </select>
    <label>Optgroups</label>
  </div>

  <div class="input-field col s12 m6">
    <select class="icons">
      <option value="" disabled selected>Choose your option</option>
      <option value="" data-icon="images/sample-1.jpg" class="circle">example 1</option>
      <option value="" data-icon="images/office.jpg" class="circle">example 2</option>
      <option value="" data-icon="images/yuna.jpg" class="circle">example 1</option>
    </select>
    <label>Images in select</label>
  </div>
  <div class="input-field col s12 m6">
    <select class="icons">
      <option value="" disabled selected>Choose your option</option>
      <option value="" data-icon="images/sample-1.jpg" class="left circle">example 1</option>
      <option value="" data-icon="images/office.jpg" class="left circle">example 2</option>
      <option value="" data-icon="images/yuna.jpg" class="left circle">example 3</option>
    </select>
    <label>Images in select</label>
  </div>

  <label>Browser Select</label>
  <select class="browser-default">
    <option value="" disabled selected>Choose your option</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>
<script type="text/javascript">
   $(document).ready(function() {
    $('select').material_select();
  });
</script>





APLIKASI AKADEMIK<br>Pondok Pesantren AT- TAUHID Surabaya
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
        <label><b>Pilih Pengguna :</b></label>
        <?php 
        echo 
        form_dropdown('user', $opt_user, set_value('user', isset($form_value['user']) ? $form_value['user'] : ''), 'class="class="input-field col s12""'); 
        ?>
      </p>

      <p><button class="waves-effect waves-light btn" name="submit" value="submit">Login</button>
        <button class="waves-effect waves-light btn" type="reset">Reset</button></p>
     
    </form>

  </div>
</div>


<script src="<?php echo base_url(); ?>assets/materialize/js/materialize.js"></script>
<script src="<?php echo base_url(); ?>assets/materialize/js/jquery-2.1.4.min.js"></script>
</body>
</html> 
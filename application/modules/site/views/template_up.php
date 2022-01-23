<!DOCTYPE html>
<html>
<title><?php echo isset($title) ? $title : 'Aplikasi Akademik'; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/w3.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/w3-theme-blue.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pace.css">
<style type="text/css" title="currentStyle"> 
	@import "<?php echo base_url(); ?>assets/css/ui/jquery-ui-1.10.4.custom.min.css";
</style>
<!--<link rel="shortcut icon" href="favicon.ico" />-->

<style>
.w3-theme {color:#fff !important;background-color:#4CAF50 !important;}
.w3-btn {background-color:#4CAF50 ;margin-bottom:4px;}
.w3-code{border-left:4px solid #4CAF50}
@media only screen and (max-width: 601px) {.w3-top{position:static;} #main{margin-top:0px !important}}
</style>

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
<script src="<?php echo base_url(); ?>assets/js/table.sorter/jquery.tablesorter.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pace.min.js"></script>
<body>

    <div class="w3-container">
        <?php echo $this->load->view('message'); ?>
        <?php $this->load->view($main_view); ?>
    </div>

<script type="text/javascript">
    $(document).ready(function() { 
        $(".tbl").tablesorter();
    });
</script>
</body>
</html> 
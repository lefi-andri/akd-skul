<!-- pesan Session Error -->
<?php $message_error = $this->session->flashdata('message_error'); ?>
<?php if (! empty($message_error)) : ?>
    <div class="w3-container w3-red w3-animate-top">
        <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
        <?php echo $message_error; ?>
    </div>
<?php endif ?>
<!-- pesan end -->

<!-- pesan Session Success -->
<?php $message_success = $this->session->flashdata('message_success'); ?>
<?php if (! empty($message_success)) : ?>
    <div class="w3-container w3-green w3-animate-top">
        <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
        <?php echo $message_success; ?>
    </div>
<?php endif ?>
<!-- pesan end -->

<!-- pesan Session Success -->
<?php $message_warning = $this->session->flashdata('message_warning'); ?>
<?php if (! empty($message_warning)) : ?>
    <div class="w3-container w3-yellow w3-animate-top">
        <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
        <?php echo $message_warning; ?>
    </div>
<?php endif ?>
<!-- pesan end -->



<!-- *************************************************************** */ -->
<!-- pesan Error -->
<?php if (!empty($pesan_error)) : ?>
    <div class="w3-container w3-red w3-animate-top">
        <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
        <?php echo $pesan_error; ?>
    </div>
<?php endif ?>
<!-- pesan end -->

<!-- pesan Warning -->
<?php if (!empty($pesan_warning)) : ?>
    <div class="w3-container w3-yellow w3-animate-top">
        <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
        <?php echo $pesan_warning; ?>
    </div>
<?php endif ?>
<!-- pesan end -->

<!-- pesan Warning -->
<?php if (!empty($pesan_info)) : ?>
    <div class="w3-container w3-theme-l3 w3-animate-top">
        <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
        <?php echo $pesan_info; ?>
    </div>
<?php endif ?>
<!-- pesan end -->


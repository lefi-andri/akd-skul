<?php
    echo isset($pesan_error['error']) ? $pesan_error['error'] : "";

$form = array(
    'nama_materi'    => array(
                        'name'=>'nama_materi',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik nama materi ...',
                        'value'=>set_value('nama_materi', isset($form_value['nama_materi']) ? $form_value['nama_materi'] : '')
                  ),
    'nama_file'    => array(
                        'name'=>'nama_file',
                  ),
    'keterangan'    => array(
                        'name'=>'keterangan',
                        'class'=>'w3-input',
                        'rows' => 4,
                        'placeholder' => 'Ketik keterangan ...',
                        'value'=>set_value('keterangan', isset($form_value['keterangan']) ? $form_value['keterangan'] : '')
                  ),

	);
?>

<div class="w3-row">
    <div class="w3-col s12 m12 l8">
        <h3>Upload Materi <span class="w3-small"> / Upload materi baru.</span></h3>
        <!-- with images -->
    </div>
    <div class="w3-col s12 m12 l4">
        &nbsp;
    </div>

</div>
<br>


<?php echo form_open_multipart($form_action, array('class' => 'w3-container w3-padding w3-small w3-card')); ?> 
    <p>
        <label>Nama Materi : <?php echo form_error('nama_materi'); ?></label>
        <?php echo form_input($form['nama_materi']); ?>
    </p>
    <p>
        <label>File Materi :</label>
        <?php echo form_upload($form['nama_file']); ?>
        <?php echo form_error('nama_file'); ?>
    </p>
    <p>
        <label>Alamat : <?php echo form_error('keterangan'); ?></label>
        <?php echo form_textarea($form['keterangan']); ?>
    </p>
    
    <p>
        
    </p>

    <!--<button type="button" class="w3-btn w3-red" onclick="window.history.back()"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</button>-->
    <?php
    echo anchor('upload-materi', '<i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali', array('class' => 'w3-btn w3-red')); ?>

    <button type="submit" class="w3-btn w3-right" value="simpan" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan Data</button>
<?php echo form_close(); ?>



</div>
<?php
$form = array(
    'id_waktu'    => array(
                        'name'=>'id_waktu',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik id ...',
                        'value'=>set_value('id_waktu', isset($form_value['id_waktu']) ? $form_value['id_waktu'] : '')
                  ),
    'hari'    => array(
                        'name'=>'hari',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik hari ...',
                        'value'=>set_value('hari', isset($form_value['hari']) ? $form_value['hari'] : '')
                  ),
    'jam_masuk'    => array(
                        'name'=>'jam_masuk',
                        'class'=>'w3-input',
                        'placeholder' => '00:00:00',
                        'value'=>set_value('jam_masuk', isset($form_value['jam_masuk']) ? $form_value['jam_masuk'] : '')
                  ),

    'jam_keluar'    => array(
                        'name'=>'jam_keluar',
                        'class'=>'w3-input',
                        'placeholder' => '00:00:00',
                        'value'=>set_value('jam_keluar', isset($form_value['jam_keluar']) ? $form_value['jam_keluar'] : '')
                  ),

	);
?>

<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Form Waktu <span class="w3-small"> / Input waktu jadwal.</span></h3>
		<!-- with images -->
	</div>
	<div class="w3-col s12 m12 l4">
		&nbsp;
	</div>

</div>
<br>
<div class="w3-row">
	<div class="w3-col s12 m12 l6">
		<?php // output
		echo $this->breadcrumbs->show();
		?>
	</div>
	<div class="w3-col s12 m12 l6">
		&nbsp;
	</div>
</div>

<div class="w3-row w3-pale-yellow">
	
	<div class="w3-col s7 m8 l9">
		<?php echo form_open($form_action, array('class' => 'w3-container w3-padding w3-theme-l4 w3-small w3-card-4')); ?> 
			<p>
				<label>ID : <?php echo form_error('id_waktu'); ?></label>
				<?php echo form_input($form['id_waktu']); ?>
			</p>
			<p>
				<label>Hari : <?php echo form_error('hari'); ?></label>
				<?php echo form_input($form['hari']); ?>
			</p>
			<p>
				<label>Jam Masuk : <?php echo form_error('jam_masuk'); ?></label>
				<?php echo form_input($form['jam_masuk']); ?>
			</p>
			<p>
				<label>Jam Keluar : <?php echo form_error('jam_keluar'); ?></label>
				<?php echo form_input($form['jam_keluar']); ?>
			</p>
			
	
			<!--<button type="button" class="w3-btn w3-red" onclick="window.history.back()"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</button>-->
			<?php
			echo anchor($this->session->userdata('urlback'), '<i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali', array('class' => 'w3-btn w3-red')); ?>

			<button type="submit" class="w3-btn w3-right" value="simpan" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan Data</button>
		<?php echo form_close(); ?>
	</div>

	<div class="w3-col s5 m4 l3 w3-padding">
		<p>Keterangan :</p>
		<?php echo validation_errors('<p class="w3-text-red">* ', '</p>'); ?>
	</div>
	
</div>
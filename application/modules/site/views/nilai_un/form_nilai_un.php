<?php
$form = array(
    'nis'    => array(
                        'name'=>'nis',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik nis ...',
                        'value'=>set_value('nis', isset($form_value['nis']) ? $form_value['nis'] : '')
                  ),

    'nilai'    => array(
                        'name'=>'nilai',
                        'class'=>'w3-input',
                        'placeholder' => '00',
                        'value'=>set_value('nilai', isset($form_value['nilai']) ? $form_value['nilai'] : '')
                  ),


	);
?>

<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Form Nilai UN <span class="w3-small"> / Input nilai un.</span></h3>
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
				<label>NIS : <?php echo form_error('nis'); ?></label>
				<?php echo form_input($form['nis']); ?>
			</p>
			<p>
				<label>Mata Pelajaran : <?php echo form_error('kode_mapel'); ?></label>
				<?php echo form_dropdown('kode_mapel', $opt_mapel, set_value('kode_mapel', isset($form_value['kode_mapel']) ? $form_value['kode_mapel'] : ''), 'class="w3-select chs"'); ?>
			</p>
			<p>
				<label>Nilai : <?php echo form_error('nilai'); ?></label>
				<?php echo form_input($form['nilai']); ?>
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
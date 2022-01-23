<?php
$form = array(
    'kode_mapel'    => array(
                        'name'=>'kode_mapel',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik kode pelajaran ...',
                        'value'=>set_value('kode_mapel', isset($form_value['kode_mapel']) ? $form_value['kode_mapel'] : '')
                  ),
    'nama_mapel'    => array(
                        'name'=>'nama_mapel',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik nama pelajaran ...',
                        'value'=>set_value('nama_mapel', isset($form_value['nama_mapel']) ? $form_value['nama_mapel'] : '')
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
		<h3>Form Mata Pelajaran <span class="w3-small"> / Input mata pelajaran.</span></h3>
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
				<label>Kode Mata Pelajaran : <?php echo form_error('kode_mapel'); ?></label>
				<?php echo form_input($form['kode_mapel']); ?>
			</p>
			<p>
				<label>Nama Pelajaran : <?php echo form_error('nama_mapel'); ?></label>
				<?php echo form_input($form['nama_mapel']); ?>
			</p>
			<p>
				<label>Alamat : <?php echo form_error('keterangan'); ?></label>
				<?php echo form_textarea($form['keterangan']); ?>
			</p>

			<p>
				<label>Status : <?php echo form_error('sts_mapel'); ?></label>
				<div class="w3-row-padding" style="padding-left:0;margin-left:0;">
					<div class="w3-col s4 m4 l2" style="padding-left:0;margin-left:0;">
						<?php echo form_radio('sts_mapel', 'reguler', set_radio('sts_mapel', 'reguler', isset($form_value['sts_mapel'])
                        && $form_value['sts_mapel'] == 'reguler' ? TRUE : FALSE), array('class' => 'w3-radio')); ?>
                        <label class="w3-validate">reguler</label>
					</div>
					<div class="w3-col s4 m4 l2" style="padding-left:0;margin-left:0;">
						<?php echo form_radio('sts_mapel', 'un', set_radio('sts_mapel', 'un', isset($form_value['sts_mapel'])
                        && $form_value['sts_mapel'] == 'un' ? TRUE : FALSE), array('class' => 'w3-radio')); ?>
                        <label class="w3-validate">un</label>
					</div>
				</div>
				
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
<?php
$form = array(
    'nama_kepsek'    => array(
                        'name'=>'nama_kepsek',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik nama kepala sekolah ...',
                        'value'=>set_value('nama_kepsek', isset($form_value['nama_kepsek']) ? $form_value['nama_kepsek'] : '')
                  ),
    'nama_waka'    => array(
                        'name'=>'nama_waka',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik nama wakil kepala sekolah ...',
                        'value'=>set_value('nama_waka', isset($form_value['nama_waka']) ? $form_value['nama_waka'] : '')
                  ),

	);
?>


<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Pengaturan <span class="w3-small"> / pengaturan aplikasi.</span></h3>
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
				<label>Semester : <?php echo form_error('semester'); ?></label>
				<div class="w3-row-padding" style="padding-left:0;margin-left:0;">
					<div class="w3-col s4 m4 l2" style="padding-left:0;margin-left:0;">
						<?php echo form_radio('semester', 'Genap', set_radio('semester', 'Genap', isset($form_value['semester'])
                        && $form_value['semester'] == 'Genap' ? TRUE : FALSE), array('class' => 'w3-radio')); ?>
                        <label class="w3-validate">Genap</label>
					</div>
					<div class="w3-col s4 m4 l2" style="padding-left:0;margin-left:0;">
						<?php echo form_radio('semester', 'Ganjil', set_radio('semester', 'Ganjil', isset($form_value['semester'])
                        && $form_value['semester'] == 'Ganjil' ? TRUE : FALSE), array('class' => 'w3-radio')); ?>
                        <label class="w3-validate">Ganjil</label>
					</div>

					<div class="w3-col s4 m4 l2">
						<?php echo form_dropdown('tahun', $opt_filter, set_value('tahun', isset($form_value['tahun']) ? $form_value['tahun'] : ''), 'class="w3-select w3-large"'); ?>
					</div>
				</div>
				
			</p>
			<p>
				<label>Kepala Sekolah : <?php echo form_error('nama_kepsek'); ?></label>
				<?php echo form_input($form['nama_kepsek']); ?>
			</p>

			<p>
				<label>Wakil Kepala Sekolah : <?php echo form_error('nama_waka'); ?></label>
				<?php echo form_input($form['nama_waka']); ?>
			</p>
			
			<br>

			<button type="submit" class="w3-btn-block w3-blue w3-right" value="simpan" name="submit"><i class="fa fa-save" aria-hidden="true"></i> Simpan Pengaturan</button>
		<?php echo form_close(); ?>
	</div>

	<div class="w3-col s5 m4 l3 w3-padding">
		<p>Keterangan :</p>
		<p class="w3-small">Tahun Ajaran Aktif, <b class="w3-red w3-tag"><?php echo $form_value['semester'].'-'.$form_value['tahun']; ?></b></p>

		<?php echo validation_errors('<p class="w3-text-red">* ', '</p>'); ?>
	</div>
	
</div>

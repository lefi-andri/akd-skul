<?php
$form = array(
    'id_kelas'    => array(
                        'name'=>'id_kelas',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik id kelas ...',
                        'value'=>set_value('id_kelas', isset($form_value['id_kelas']) ? $form_value['id_kelas'] : '')
                  ),
    'nama_kelas'    => array(
                        'name'=>'nama_kelas',
                        'class'=>'w3-input',
                        'placeholder' => 'X,XI,XII',
                        'value'=>set_value('nama_kelas', isset($form_value['nama_kelas']) ? $form_value['nama_kelas'] : '')
                  ),
    'kelas_bagian'    => array(
                        'name'=>'kelas_bagian',
                        'class'=>'w3-input',
                        'placeholder' => 'ketik nama kelas ...',
                        'value'=>set_value('kelas_bagian', isset($form_value['kelas_bagian']) ? $form_value['kelas_bagian'] : '')
                  ),

    'tahun'    => array(
                        'name'=>'tahun',
                        'class'=>'w3-input',
                        'placeholder' => '0000',
                        'maxlength' => 4,
                        'value'=>set_value('tahun', isset($form_value['tahun']) ? $form_value['tahun'] : '')
                  ),

	);
?>

<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Form Kelas <span class="w3-small"> / Input kelas.</span></h3>
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
				<label>ID : <?php echo form_error('id_kelas'); ?></label>
				<?php echo form_input($form['id_kelas']); ?>
			</p>
			<p>
				<div class="w3-row-padding" style="margin-left:0;padding-left:0;">
					<div class="w3-col s6 m6 l6" style="margin-left:0;padding-left:0;">
						<label>Kelas : <?php echo form_error('nama_kelas'); ?></label>
						<?php echo form_input($form['nama_kelas']); ?>
					</div>
					<div class="w3-col s6 s6 s6">
						<label><?php echo form_error('kelas_bagian'); ?>&nbsp;</label>
						<?php echo form_input($form['kelas_bagian']); ?>
					</div>
				</div>
			</p>
			<p>
				<label>Wali Kelas : <?php echo form_error('nip'); ?></label>
				<?php echo form_dropdown('nip', $opt_guru, set_value('nip', isset($form_value['nip']) ? $form_value['nip'] : ''), 'class="w3-select"'); ?>
			</p>
			<p>
				<label>Semester : <?php echo form_error('semester'); ?></label>
				<div class="w3-row-padding" style="padding-left:0;margin-left:0;">
					<div class="w3-col s4 m4 l3" style="padding-left:0;margin-left:0;">
						<?php echo form_radio('semester', 'Genap', set_radio('semester', 'Genap', isset($form_value['semester'])
                        && $form_value['semester'] == 'Genap' ? TRUE : FALSE), array('class' => 'w3-radio')); ?>
                        <label class="w3-validate">Genap</label>
					</div>
					<div class="w3-col s4 m4 l3" style="padding-left:0;margin-left:0;">
						<?php echo form_radio('semester', 'Ganjil', set_radio('semester', 'Ganjil', isset($form_value['semester'])
                        && $form_value['semester'] == 'Ganjil' ? TRUE : FALSE), array('class' => 'w3-radio')); ?>
                        <label class="w3-validate">Ganjil</label>
					</div>
				</div>
				
			</p>
			<p>
				<div class="w3-row">
					<div class="w3-col s12 m12 l2">
						<label>Tahun : <?php echo form_error('tahun'); ?></label>
						<?php echo form_input($form['tahun']); ?>
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
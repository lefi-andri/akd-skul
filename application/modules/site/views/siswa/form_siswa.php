<?php
$form = array(
    'nis'    => array(
                        'name'=>'nis',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik nis ...',
                        'value'=>set_value('nis', isset($form_value['nis']) ? $form_value['nis'] : '')
                  ),
    'nama'    => array(
                        'name'=>'nama',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik nama ...',
                        'value'=>set_value('nama', isset($form_value['nama']) ? $form_value['nama'] : '')
                  ),
    'tmp_lahir'    => array(
                        'name'=>'tmp_lahir',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik tempat lahir ...',
                        'value'=>set_value('tmp_lahir', isset($form_value['tmp_lahir']) ? $form_value['tmp_lahir'] : '')
                  ),
    'tgl_lahir'    => array(
                        'name'=>'tgl_lahir',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik tanggal lahir ...',
                        'value'=>set_value('tgl_lahir', isset($form_value['tgl_lahir']) ? $form_value['tgl_lahir'] : '')
                  ),
    'alamat'    => array(
                        'name'=>'alamat',
                        'class'=>'w3-input',
                        'rows' => 4,
                        'placeholder' => 'Ketik alamat ...',
                        'value'=>set_value('alamat', isset($form_value['alamat']) ? $form_value['alamat'] : '')
                  ),
    'nama_ortu'    => array(
                        'name'=>'nama_ortu',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik nama orang tua ...',
                        'value'=>set_value('nama_ortu', isset($form_value['nama_ortu']) ? $form_value['nama_ortu'] : '')
                  ),
    'tlp'    => array(
                        'name'=>'tlp',
                        'class'=>'w3-input',
                        'placeholder' => 'Ketik nomor telepon ...',
                        'value'=>set_value('tlp', isset($form_value['tlp']) ? $form_value['tlp'] : '')
                  ),
    'thn_masuk'    => array(
                        'name'=>'thn_masuk',
                        'class'=>'w3-input',
                        'maxlength' => 4,
                        'placeholder' => '0000',
                        'value'=>set_value('thn_masuk', isset($form_value['thn_masuk']) ? $form_value['thn_masuk'] : '')
                  ),


	);
?>

<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Form Data Siswa <span class="w3-small"> / Input data siswa.</span></h3>
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
				<label>Nama Lengkap : <?php echo form_error('nama'); ?></label>
				<?php echo form_input($form['nama']); ?>
			</p>
			<p>
				<div class="w3-row-padding" style="padding-left:0;margin-left:0;">
					<div class="w3-col s6 m6 l6" style="padding-left:0;margin-left:0;">
						<label>Tempat Lahir : <?php echo form_error('tmp_lahir'); ?></label>
						<?php echo form_input($form['tmp_lahir']); ?>
					</div>
					<div class="w3-col s6 m6 l6">
						<label>Tanggal Lahir : <?php echo form_error('tgl_lahir'); ?></label>
						<?php echo form_input($form['tgl_lahir']); ?>
					</div>
				</div>
			</p>
			<p>
				<label>Alamat : <?php echo form_error('alamat'); ?></label>
				<?php echo form_textarea($form['alamat']); ?>
			</p>
			<p>
				<label>Nama Orang Tua : <?php echo form_error('nama_ortu'); ?></label>
				<?php echo form_input($form['nama_ortu']); ?>
			</p>
			<p>
				<label>Jenis Kelamin : <?php echo form_error('jk'); ?></label>
				<div class="w3-row-padding" style="padding-left:0;margin-left:0;">
					<div class="w3-col s4 m4 l3" style="padding-left:0;margin-left:0;">
						<?php echo form_radio('jk', 'P', set_radio('jk', 'P', isset($form_value['jk'])
                        && $form_value['jk'] == 'P' ? TRUE : FALSE), array('class' => 'w3-radio')); ?>
                        <label class="w3-validate">Pria</label>
					</div>
					<div class="w3-col s4 m4 l3" style="padding-left:0;margin-left:0;">
						<?php echo form_radio('jk', 'W', set_radio('jk', 'W', isset($form_value['jk'])
                        && $form_value['jk'] == 'W' ? TRUE : FALSE), array('class' => 'w3-radio')); ?>
                        <label class="w3-validate">Wanita</label>
					</div>
				</div>
				
			</p>
			<p>
				<label>Telepon : <?php echo form_error('tlp'); ?></label>
				<?php echo form_input($form['tlp']); ?>
			</p>
			<p>
				<label>Tahun Masuk : <?php echo form_error('thn_masuk'); ?></label>
				<div class="w3-row">
					<div class="w3-col s3 m3 l2">
						<?php echo form_input($form['thn_masuk']); ?>
					</div>
				</div>
			</p>
	
			<!--<button type="button" class="w3-btn w3-red" onclick="window.history.back()"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</button>-->
			<?php echo anchor($this->session->userdata('urlback'), '<i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali', array('class' => 'w3-btn w3-red')); ?>

			<button type="submit" class="w3-btn w3-right" value="simpan" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan Data</button>
		<?php echo form_close(); ?>
	</div>

	<div class="w3-col s5 m4 l3 w3-padding">
		<p>Keterangan :</p>
		<?php echo validation_errors('<p class="w3-text-red">* ', '</p>'); ?>
	</div>
	
</div>
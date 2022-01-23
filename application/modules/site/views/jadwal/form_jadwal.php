<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Form Input Jadwal <span class="w3-small"> / Input mata pelajaran.</span></h3>
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
				<div class="w3-row-padding" style="margin-left:0;padding-left:0;">
					<div class="w3-col s12 m6 l7" style="margin-left:0;padding-left:0;">
					<label>Waktu : <?php echo form_error('id_waktu'); ?></label>
					<?php echo form_dropdown('id_waktu', $opt_waktu, set_value('id_waktu', isset($form_value['id_waktu']) ? $form_value['id_waktu'] : ''), 'class="w3-select chs"'); ?>
					</div>

					<div class="w3-col s12 m6 l5">
					<label>Kelas : <?php echo form_error('id_kelas'); ?></label>
					<?php echo form_dropdown('id_kelas', $opt_kelas, set_value('id_kelas', isset($form_value['id_kelas']) ? $form_value['id_kelas'] : ''), 'class="w3-select chs"'); ?>
					</div>
				</div>
			</p>

			<p>
				<div class="w3-row-padding" style="margin-left:0;padding-left:0;">
					<div class="w3-col s12 m6 l7" style="margin-left:0;padding-left:0;">
					<label>Mata Pelajaran : <?php echo form_error('kode_mapel'); ?></label>
					<?php echo form_dropdown('kode_mapel', $opt_mapel, set_value('kode_mapel', isset($form_value['kode_mapel']) ? $form_value['kode_mapel'] : ''), 'class="w3-select chs"'); ?>
					</div>

					<div class="w3-col s12 m6 l5">
					<label>Guru : <?php echo form_error('nip'); ?></label>
					<?php echo form_dropdown('nip', $opt_guru, set_value('nip', isset($form_value['nip']) ? $form_value['nip'] : ''), 'class="w3-select chs"'); ?>
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
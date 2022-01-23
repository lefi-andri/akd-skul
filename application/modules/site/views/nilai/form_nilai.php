<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Form Nilai <span class="w3-small"> / Input nilai.</span></h3>
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
				<label>Mata Pelajaran - Kelas : <?php echo form_error('id_jadwal'); ?></label>
				<?php echo form_dropdown('id_jadwal', $opt_mapel_kelas, set_value('id_jadwal', isset($form_value['id_jadwal']) ? $form_value['id_jadwal'] : ''), 'class="w3-select chs"'); ?>
			</p>

			<p>
				<label>Wali Kelas : <?php echo form_error('nip'); ?></label>
				<?php echo form_dropdown('nip', $opt_guru, set_value('nip', isset($form_value['nip']) ? $form_value['nip'] : ''), 'class="w3-select chs"'); ?>
			</p>

			
	
			<!--<button type="button" class="w3-btn w3-red" onclick="window.history.back()"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</button>-->
			<button type="submit" class="w3-btn w3-blue w3-right" value="simpan" name="submit"><i class="fa fa-search" aria-hidden="true"></i> Cari</button>
		<?php echo form_close(); ?>
	</div>

	<div class="w3-col s5 m4 l3 w3-padding">
		<p>Keterangan :</p>
		<?php echo validation_errors('<p class="w3-text-red">* ', '</p>'); ?>
		<p>* Input nilai kelas sesuai denngan pengaturan tahun ajaran yang sedang di set</p>
	</div>
	
</div>

<?php if(!empty($data_input)) : ?>
	<?php echo form_open($form_action_input, array('class' => 'w3-container w3-padding w3-small')); ?> 
	<input type="hidden" name="kode_mapel" value="<?php echo isset($mapel) ? $mapel : ''; ?>">
	<input type="hidden" name="id_kelas" value="<?php echo isset($kelas) ? $kelas : ''; ?>">
	<?php echo $data_input; ?>

	<button type="submit" class="w3-btn w3-right" value="simpan" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> SIMPAN</button>
	<?php echo form_close(); ?>

<?php endif; ?>
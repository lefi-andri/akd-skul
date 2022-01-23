<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Input Data Nilai <span class="w3-small"> / Input data nilai siswa oleh guru mata pelajaran</span></h3>
		<!-- with images -->
	</div>
	<div class="w3-col s12 m12 l4">
		<div class="w3-right" style="padding-top:20px;">
			&nbsp;
		</div>
	</div>

</div>
<br>

<?php echo form_open($form_action, array('class' => 'w3-container w3-padding w3-small w3-card')); ?> 
	<p>
		<label>Mata Pelajaran : <?php echo form_error('nip'); ?></label>
		<?php echo form_dropdown('id_jadwal', $opt_mapel_kelas, set_value('id_jadwal', isset($form_value['id_jadwal']) ? $form_value['id_jadwal'] : ''), 'class="w3-select w3-large"'); ?>
	</p>

    <button type="submit" class="w3-btn w3-right" value="simpan" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> PROSES</button>
<?php echo form_close(); ?>



<?php if(!empty($data_input)) : ?>
	<?php echo form_open($form_action_input, array('class' => 'w3-container w3-padding w3-small')); ?> 
	<input type="hidden" name="kode_mapel" value="<?php echo isset($mapel) ? $mapel : ''; ?>">
	<input type="hidden" name="id_kelas" value="<?php echo isset($kelas) ? $kelas : ''; ?>">
	<?php echo $data_input; ?>

	<button type="submit" class="w3-btn w3-right" value="simpan" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> SIMPAN</button>
	<?php echo form_close(); ?>

<?php endif; ?>
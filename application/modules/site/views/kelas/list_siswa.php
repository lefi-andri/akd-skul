<?php echo form_error('angkatan'); ?>
<?php echo form_open($form_action); ?>
<div class="w3-row">
	<div class="w3-col s13 m3 l2">
		<p>
			<label>Pilih Angkatan :</label>
			<?php echo form_dropdown('angkatan', $opt_filter, set_value('angkatan', isset($form_value['angkatan']) ? $form_value['angkatan'] : ''), 'class="w3-select w3-border w3-large"'); ?>
			
		</p>
	</div>
	<div class="w3-col s2 m2 l1">
		<label>&nbsp;</label>
		<p>
			<button type="submit" name="submit" value="submit" class="w3-btn">OK</button>
		</p>
	</div>
	<button type="button" class="w3-btn w3-small w3-red w3-right" onclick="WinClose()">Tutup</button>
</div>
<?php echo form_close(); ?>

<div class="w3-responsive">
	
	<!-- tabel data start -->   
	<?php if (! empty($tabel_data)) : ?>
		<?php echo form_open($form_act_add); ?>
			<?php echo $tabel_data; ?>
			<button class="w3-btn w3-small w3-theme-d4 w3-right">Tambah Siswa</button>
		<?php echo form_close(); ?>
	<?php endif ?>
	<!-- tabel data end -->
		
</div>


<script type="text/javascript">
	function WinClose()
	{
		window.opener.location.reload();
		window.close();
	}
</script>
<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Jadwal Mengajar <u><?php echo isset($semester_aktif) ? $semester_aktif : ""; ?></u> <span class="w3-small"> / Data jadwal mengajar guru.</span></h3>
		<!-- with images -->
	</div>
	<div class="w3-col s12 m12 l4">
		<div class="w3-right" style="padding-top:20px;">
			&nbsp;
		</div>
	</div>

</div>
<br>
<div class="w3-responsive">
	
	<!-- tabel data start -->   
	<?php if (! empty($tabel_data)) : ?>
		<?php echo $tabel_data; ?>
	<?php endif ?>
	<!-- tabel data end -->
		
</div>
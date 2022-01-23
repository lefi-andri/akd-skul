<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Upload Materi <span class="w3-small"> / upload materi pelajaran.</span></h3>
		<!-- with images -->
	</div>
	<div class="w3-col s12 m12 l4">
		<div class="w3-right" style="padding-top:20px;">
			<?php echo anchor('upload-materi/upload', 'Upload Materi Baru', array('class' => 'w3-btn')); ?>
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
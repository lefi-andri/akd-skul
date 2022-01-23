
<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Materi Guru <span class="w3-small"> / data upload materi pelajaran.</span></h3>
		<!-- with images -->
	</div>
	<div class="w3-col s12 m12 l4">
		<div class="w3-right" style="padding-top:20px;">
			
		</div>
	</div>

</div>
<br>
<div class="w3-row">
	<div class="w3-col s12 m12 l12">
		<?php // output
		echo $this->breadcrumbs->show();
		?>
	</div>
</div>
<div class="w3-responsive">
	<?php if (! empty($tabel_data)) : ?>
		<?php echo $tabel_data; ?>
	<?php endif ?>
</div>
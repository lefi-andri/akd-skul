<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Data Siswa <span class="w3-small"> / Manajemen siswa perkelas.</span></h3>
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



<table class="w3-table w3-tiny w3-striped w3-border">
	<tbody>
	<tr>
		<td width="220px">ID Kelas</td>
		<td>: <?php echo $lst_data['id_kelas']; ?></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td>: <?php echo $lst_data['nama_kelas'].' '.$lst_data['kelas_bagian']; ?></td>
	</tr>
	<tr>
		<td>Wali Kelas</td>
		<td>: <?php echo strtoupper($lst_data['nip']); ?></td>
	</tr>
	</tbody>
</table>

<div class="w3-row">
	<div class="w3-col s12 m12 l12">
		<?php echo $btn_add; ?>
	</div>
</div>

<div class="w3-responsive">

<!-- tabel data start -->   
<?php if (! empty($tabel_data)) : ?>
	<?php echo $tabel_data; ?>
<?php endif ?>
<!-- tabel data end -->

	
</div>

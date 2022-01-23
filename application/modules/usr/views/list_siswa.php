<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Data Siswa <span class="w3-small"> / Data semua siswa.</span></h3>
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
	<table class="w3-table w3-striped w3-border w3-small">
		<tr>
			<td width="220px;">ID Kelas</td>
			<td width="10px">:</td>
			<td><?php echo isset($lst_kelas['id_kelas']) ? $lst_kelas['id_kelas'] : ''; ?></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><?php echo isset($lst_kelas['nama_kelas']) ? $lst_kelas['nama_kelas'] : ''; ?> 
			<?php echo isset($lst_kelas['kelas_bagian']) ? $lst_kelas['kelas_bagian'] : ''; ?></td>
		</tr>
		<tr>
			<td>Semester</td>
			<td>:</td>
			<td><?php echo isset($lst_kelas['semester']) ? $lst_kelas['semester'] : ''; ?> 
			<?php echo isset($lst_kelas['tahun']) ? $lst_kelas['tahun'] : ''; ?></td>
		</tr>
	</table>
	<br>
	<!-- tabel data start -->   
	<?php if (! empty($tabel_data)) : ?>
		<?php echo $tabel_data; ?>
	<?php endif ?>
	<!-- tabel data end -->
		
</div>
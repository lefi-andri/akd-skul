<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Profile <span class="w3-small"> / Data profile siswa.</span></h3>
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
	<table class="w3-table w3-striped w3-border">
		<tr>
			<td width="220px">NIS</td>
			<td width="10px">:</td>
			<td><?php echo isset($lst_data['nis']) ? $lst_data['nis'] : ""; ?></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><?php echo isset($lst_data['nama']) ? $lst_data['nama'] : ""; ?></td>
		</tr>
		<tr>
			<td>Tempat, Tanggal Lahir</td>
			<td>:</td>
			<td><?php echo isset($lst_data['tmp_lahir']) ? $lst_data['tmp_lahir'] : ""; ?>, <?php echo isset($lst_data['tgl_lahir']) ? $lst_data['tgl_lahir'] : ""; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo isset($lst_data['alamat']) ? $lst_data['alamat'] : ""; ?></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>:</td>
			<td><?php echo isset($lst_data['tlp']) ? $lst_data['tlp'] : ""; ?></td>
		</tr>
	</table>

</div>
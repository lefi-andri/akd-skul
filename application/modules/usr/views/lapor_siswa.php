<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Lapor Siswa <span class="w3-small"> / Data siswa dan nilai.</span></h3>
		<!-- with images -->
	</div>
	<div class="w3-col s12 m12 l4">
		<div class="w3-right" style="padding-top:20px;">
			&nbsp;
		</div>
	</div>

</div>
<br>

<button class="w3-btn w3-yellow" onClick="window.history.back()">Kembali</button>
<div class="w3-responsive">
	<table class="w3-table w3-striped w3-border w3-small">
		<tr>
			<td width="220px;">NIS</td>
			<td width="10px">:</td>
			<td><?php echo isset($lst_siswa['nis']) ? $lst_siswa['nis'] : ''; ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo isset($lst_siswa['nama']) ? $lst_siswa['nama'] : ''; ?></td>
		</tr>
		<tr>
			<td>Tempat, Tanggal Lahir</td>
			<td>:</td>
			<td><?php echo isset($lst_siswa['tmp_lahir']) ? $lst_siswa['tmp_lahir'] : ''; ?>, 
			<?php echo isset($lst_siswa['tgl_lahir']) ? $lst_siswa['tgl_lahir'] : ''; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo isset($lst_siswa['alamat']) ? $lst_siswa['alamat'] : ''; ?></td>
		</tr>
		<tr>
			<td>Nama Orang Tua</td>
			<td>:</td>
			<td><?php echo isset($lst_siswa['nama_ortu']) ? $lst_siswa['nama_ortu'] : ''; ?></td>
		</tr>
		<tr>
			<td>Agama</td>
			<td>:</td>
			<td><?php echo isset($lst_siswa['agama']) ? $lst_siswa['agama'] : ''; ?></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>:</td>
			<td><?php echo isset($lst_siswa['tlp']) ? $lst_siswa['tlp'] : ''; ?></td>
		</tr>
	</table>
	<br>
	<!-- tabel data start -->   
	<?php if (! empty($data_nilai)) : ?>
		<?php echo $data_nilai; ?>
	<?php endif ?>
	<!-- tabel data end -->
		
</div>

<script>
openCity(event, "<?php echo $kelas; ?>")
function openCity(evt, cityName) {
    var i, x, tablinks;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    //document.getElementById(cityName).style.display = "block";
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " w3-red";
}
</script>
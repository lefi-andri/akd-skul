<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Data Nilai <span class="w3-small"> / Manajemen nilai siswa.</span></h3>
		<!-- with images -->
	</div>
	<div class="w3-col s12 m12 l4">
		<div class="w3-right" style="padding-top:20px;">
			<?php
				echo anchor($this->session->userdata('urlback'), '<i class="fa fa-refresh"></i> Refresh Data', array('class' => 'w3-btn w3-small w3-yellow'));
				echo anchor('nilai-siswa/add', '<i class="fa fa-user-plus"></i> Tambah Data Nilai', array('class' => 'w3-btn w3-small'));

			?>
		</div>
	</div>

</div>
<br>
<div class="w3-row">
	<div class="w3-col s12 m12 l3">
		<?php // output
		echo $this->breadcrumbs->show();
		?>
	</div>
	<div class="w3-col s12 m12 l9">
		<form action="<?php echo site_url('nilai-siswa/filter'); ?>" class="w3-container" method="post">
		<div class="w3-row">
			<div class="w3-col s2 m2 l1 w3-right">
		    	<button type="submit" value="Search" class="w3-btn-block w3-small w3-blue-grey"><i class="fa fa-search"></i></button>
		    </div>
		    <div class="w3-col s3 m4 l4 w3-right">
				<?php echo form_dropdown('nip', $opt_guru, set_value('nip', isset($nip) ? $nip : ''), 'class="w3-select w3-border"'); ?>
		    </div>
			<div class="w3-col s4 m4 l4 w3-right">
				<?php echo form_dropdown('id_jadwal', $opt_mapel_kelas, set_value('id_jadwal', isset($id_jadwal) ? $id_jadwal : ''), 'class="w3-select w3-border"'); ?>
		    </div>
		    
		    <div class="w3-col s2 m4 l3 w3-right">
		    	<label class="w3-right">Filter Nilai :</label>
		    </div>
		    
		</div>
		</form>
	</div>

</div>

<div class="w3-responsive">

<!-- tabel data start -->   
	<?php if (! empty($tabel_data)) : ?>
		<?php echo $tabel_data; ?>
	<?php endif ?>
<!-- tabel data end -->

</div>

<div class="w3-row">
	<div class="w3-col s12 m12 l4">
	&nbsp;
	</div>
	<div class="w3-col s12 m12 l8">
		<?php
			if(!empty($pagination)) :
			 	echo $pagination; 
			endif; 
		?>
	</div>
</div>
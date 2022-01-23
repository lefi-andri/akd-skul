<div class="w3-row">
	<div class="w3-col s12 m12 l8">
		<h3>Data Nilai UN <span class="w3-small"> / Manajemen data nilai UN.</span></h3>
		<!-- with images -->
	</div>
	<div class="w3-col s12 m12 l4">
		<div class="w3-right" style="padding-top:20px;">
			<?php
				echo anchor($this->session->userdata('urlback'), '<i class="fa fa-refresh"></i> Refresh Data', array('class' => 'w3-btn w3-small w3-yellow'));
				echo anchor('nilai-un/add', '<i class="fa fa-user-plus"></i> Tambah Data', array('class' => 'w3-btn w3-small'));

			?>
		</div>
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
		<form action="<?php echo site_url('nilai-un/search'); ?>" class="w3-container" method="post">
		<div class="w3-row">
			<div class="w3-col s3 m2 l2 w3-right">
		    	<button type="submit" value="Search" class="w3-btn-block w3-small w3-blue-grey"><i class="fa fa-search"></i> Go</button>
		    </div>
		    <div class="w3-col s3 m2 l2 w3-right">	
		    	<?php 
	            if ($keyword <> '')
	            {
	                echo anchor('nilai-un', '<i class="fa fa-repeat"></i> Reset', array('class' => 'w3-btn-block w3-red w3-small'));
	            }
	            ?>
		    </div>
			<div class="w3-col s6 m9 l8 w3-right">
				<input name="keyword" class="w3-input w3-tiny w3-border" placeholder="NIS" value="<?php echo $keyword; ?>" />
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
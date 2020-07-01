<section class="sidebar">
	<!-- Sidebar user panel -->
	<div class="user-panel">
		<div class="pull-left image">
			<img src="<?php echo base_url('assets/adminlte/dist/img/hann.png')?>" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
			<p><?php echo $user['name']?></p>
			<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		</div>
	</div>

<ul class="sidebar-menu" data-widget="tree">
	<li class="header">MAIN NAVIGATION</li>
	<li class="active">
		<a href="<?php echo base_url(); ?>">
			<i class="fa fa-map"></i> <span>MAPS</span>
		</a>
	</li>


	<li class="treeview">
		<a href="#">
			<i class="fa fa-user-circle"></i>
			<span>Data User</span>
			<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
		</a>
		<ul class="treeview-menu">
			<li><a href="<?php echo base_url('dashboard/dataUser')?>"><i class="fa fa-circle-o"></i> Lihat Data User</a></li>
		</ul>
	</li>

	<li class="treeview">
		<a href="#">
			<i class="fa fa-area-chart"></i>
			<span>Data Kecamatan</span>
			<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
		</a>
		<ul class="treeview-menu">
			<li><a href="<?php echo base_url('kecamatan/viewInputKecamatan')?>"><i class="fa fa-circle-o"></i> Input Data</a></li>
			<li><a href="<?php echo base_url('kecamatan')?>"><i class="fa fa-circle-o"></i> Lihat Data</a></li>
		</ul>
	</li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-industry"></i>
            <span>Data Studio Photo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url('spbu/viewInputSpbu')?>"><i class="fa fa-circle-o"></i> Input Data</a></li>
            <li><a href="<?php echo base_url('spbu')?>"><i class="fa fa-circle-o"></i> Lihat Data</a></li>
        </ul>
    </li>
</ul>
</section>

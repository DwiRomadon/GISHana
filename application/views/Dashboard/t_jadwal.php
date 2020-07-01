<!-- select -->
<!-- Content Wrapper. Contains page content -->
<style>
	.table_wrapper{
		display: block;
		overflow-x: auto;
		white-space: nowrap;
	}
</style>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Jadwal Kuliah
			<small>Manajemen Jadwal Kuliah</small>
		</h1>
	</section>

	<div class="box center-block">
		<div class="box-body">
			<form method="post" action="<?php  echo base_url('jadwal')?>">
			<table >
				<tbody>
					<tr>
					<td width="15%"><label>Thn Semester </label></td>
					<td width="15%">:</td>
					<td width="46%"><div>
						<select class="form-control" name="thnsem">
							<option>--Pilih tahun Semester--</option>
							<?php foreach ($thnssem as $thnsems){ ?>
							<option value="<?php echo $thnsems->thnsem ?>"><?php echo $thnsems->thnsem ?></option>
							<?php }?>
						</select>
						</div>
					</td>
					</tr>
					<tr><td height="5px"></td></tr>
					<tr>
						<td width="15%"><label>Program Studi</label></td>
						<td width="15%">:</td>
						<td><div>
								<select class="form-control" name="kodeprodi">
									<option value="<?php echo $prodi->kode_jurusan?>"><?php echo $prodi->Nama." - ".$prodi->kode_jurusan." ".$prodi->nama_jurusan ?></option>
								</select>
							</div>
						</td>
					</tr>
					<tr><td height="5px"></td></tr>
					<tr>
						<td width="15%"></td>
						<td width="15%"></td>
						<td><button type="submit" class="btn btn-success">Submit</button></td>
						<td width="15%"></td>
						<td width="15%"></td>
						<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah Jadwal</button></td>

					</tr>
					<tr><td height="10px"></td></tr>
				</tbody>
			</table>
			</form>
			<div>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>No</th>
					<th>KD MK</th>
					<th>Mat Kul</th>
					<th>Sem</th>
					<th>SKS</th>
					<th>Hari</th>
					<th>Waktu</th>
					<th>Ruang</th>
					<th>Kls</th>
					<th>Prg</th>
					<th>Penggal</th>
					<th>Kampus</th>
					<th>Dosen</th>
					<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$no=1;
					foreach ($tabel as $data): ?>
				<tr>
					<td><?php echo $no++?></td>
					<td><?php echo $data->NoMk?></td>
					<td><?php echo $data->Nama_MK?></td>
					<td><?php echo $data->Semester?></td>
					<td><?php echo $data->SKS?></td>
					<td><?php echo $data->nmhari?></td>
					<td><?php echo $data->JamAwal?> - <?php echo $data->JamAkhir?></td>
					<td><?php echo $data->Ruang?></td>
					<td><?php echo $data->Kelas?></td>
					<td><?php echo $data->Kd_Program?></td>
					<td><?php echo $data->Penggal?></td>
					<td><?php echo $data->Kampus?></td>
					<td><?php echo $data->NIDN?> <?php echo $data->nmdostbdos?><?php echo $data->NoMk?> <?php echo $data->gelartbdos?></td>
					<td><button type="button" class="btn btn-warning btn-flat" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Edit</button></td>
				</tr>
				<?php endforeach;?>
				</tbody>
			</table>
			</div>
		</div>
		<!-- /.box-body -->
	</div>
	</div>
	</div>
</section>


<!-----Modal Tambah Jadwal------>
<?php include 'modaljadwal/inputjadwal.php';?>

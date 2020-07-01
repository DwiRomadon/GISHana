<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Jadwal Periode <?php echo $tahunsems->thnsem ?></h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Kampus</label>

							<div class="col-sm-10">
								<select class="form-control" name="thnsem">
									<option>--Pilih Kampus--</option>
									<?php foreach ($kampus as $kampuss){ ?>
										<option value="<?php echo $kampuss->KdKampus ?>"><?php echo $kampuss->KdKampus ?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Fakultas</label>

							<div class="col-sm-10">
								<select class="form-control" name="thnsem">
									<option>--Pilih Fakultas--</option>
									<option value="<?php echo $prodi->kode_fakultas?>"><?php echo $prodi->kode_fakultas." - ".$prodi->nama_fakultas ?></option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Prodi</label>

							<div class="col-sm-10">
								<select class="form-control" name="thnsem">
									<option>--Pilih Program Studi--</option>
									<option value="<?php echo $prodi->kode_jurusan?>"><?php echo $prodi->Nama." - ".$prodi->kode_jurusan." ".$prodi->nama_jurusan ?></option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Jenjang</label>

							<div class="col-sm-10">
								<select class="form-control" name="thnsem">
									<option>--Pilih Jenjang Pendidikan--</option>
									<option value="<?php echo $jenjang->kode_jenjang?>"><?php echo $jenjang->kode_jenjang." - ".$prodi->Nama ?></option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Jenis Kuliah</label>

							<div class="col-sm-10">
								<select class="form-control" name="thnsem">
									<option>--Pilih Jenis Kuliah--</option>
									<?php foreach ($jenis_kuliah as $jnskul):?>
										<option value="<?php echo $jnskul->Program_ID?>"><?php echo $jnskul->Program_ID." - ".$jnskul->nama_program ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Jenis Semester</label>

							<div class="col-sm-10">
								<select class="form-control" name="thnsem">
									<option>--Pilih Jenis Semester--</option>
									<?php foreach ($jenis_semester as $jnssem):?>
										<option value="<?php echo $jnssem->IdJnsSem?>"><?php echo $jnssem->IdJnsSem." - ".$jnssem->NmJnsSem ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Mata Kuliah</label>

							<div class="col-sm-10">
								<select class="form-control select2" name="thnsem" style="width: 100%; height: 150px;">
									<option>--Pilih Matakuliah--</option>
										<?php foreach ($matakuliah as $matkul):?>
											<option value="<?php echo $matkul->Kode_MK?>"><?php echo $matkul->Kode_MK." - ".$matkul->Nama_MK ?></option>
										<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Sistem Kuliah</label>

							<div class="col-sm-10">
								<select class="form-control" name="thnsem">
									<option>--Sistem Kuliah--</option>
									<?php foreach ($jenisjadwal as $jnsjadwal):?>
										<option value="<?php echo $jnsjadwal->kdjnsjadwal?>"><?php echo $jnsjadwal->kdjnsjadwal." - ".$jnsjadwal->jnsjadwal ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Hari Kuliah</label>

							<div class="col-sm-10">
								<select class="form-control" name="thnsem">
									<option>--Hari Kuliah--</option>
									<?php foreach ($hari as $hri):?>
										<option value="<?php echo $hri->Hari_kd?>"><?php echo $hri->nmhari?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Kelas Kuliah</label>

							<div class="col-sm-10">
								<select class="form-control" name="thnsem">
									<option>--Kelas Kuliah--</option>
									<?php foreach ($kelas as $kls):?>
										<option value="<?php echo $kls->nmkelas?>"><?php echo $kls->nmkelas?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Ruang Kuliah</label>

							<div class="col-sm-10">
								<select class="form-control" name="thnsem">
									<option>--Ruang Kuliah--</option>
									<?php foreach ($ruang as $ruangs):?>
										<option value="<?php echo $ruangs->Ruang_ID?>"><?php echo $ruangs->Nm_Ruang?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Jam Masuk</label>

							<div class="col-sm-10">
								<select class="form-control" name="thnsem">
									<option>--Jam Masuk--</option>
									<?php foreach ($jamkuliah as $jamkul):?>
										<option value="<?php echo $jamkul->jamawal?>"><?php echo $jamkul->jamawal?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Jam Keluar</label>

							<div class="col-sm-10">
								<select class="form-control" name="thnsem">
									<option>--Jam Keluar--</option>
									<?php foreach ($jamkuliah as $jamkul):?>
										<option value="<?php echo $jamkul->jamakhir?>"><?php echo $jamkul->jamakhir?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Dosen</label>

							<div class="col-sm-10">
								<select class="form-control select2" name="thnsem" style="width: 100%;">
									<option>--Pilih Dosen--</option>
									<?php foreach ($dosen as $dos):?>
										<option value="<?php echo $dos->nidnntbdos?>"><?php echo $dos->nmdostbdos." - ".$dos->nidnntbdos?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Dosen Ke2</label>

							<div class="col-sm-10">
								<select class="form-control select2" style="width: 100%" name="thnsem">
									<option>--Dosen Ke2--</option>
									<?php foreach ($dosen as $dos):?>
										<option value="<?php echo $dos->nidnntbdos?>"><?php echo $dos->nmdostbdos." - ".$dos->nidnntbdos?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Dosen Ke3</label>

							<div class="col-sm-10">
								<select class="form-control select2" style="width: 100%"  name="thnsem">
									<option>--Dosen Ke3--</option>
									<?php foreach ($dosen as $dos):?>
										<option value="<?php echo $dos->nidnntbdos?>"><?php echo $dos->nmdostbdos." - ".$dos->nidnntbdos?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Dosen Ke4</label>

							<div class="col-sm-10">
								<select class="form-control select2" style="width: 100%" name="thnsem">
									<option>--Dosen Ke4--</option>
									<?php foreach ($dosen as $dos):?>
										<option value="<?php echo $dos->nidnntbdos?>"><?php echo $dos->nmdostbdos." - ".$dos->nidnntbdos?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Keterangan</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Keterangan">
							</div>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-info pull-right">Input Data</button>
					</div>
					<!-- /.box-footer -->
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card-body">
		<div class="row">
			<!-- Laporan Konsultasi -->
			<div class="col-lg-1"></div>
			<div class="col-lg-10" align="center">
				<!-- Collapsable Card Example -->
				<div class="card shadow mb-4">
					<!-- Card Header - Accordion -->
					<div class="card-header">
						<h1 class="h3 text-primary">Form Pengaduan Keluhan Air Pelanggan</h1>
					</div>
					<!-- Card Content - Collapse -->
					<div class="collapse show" id="collapseCardExample">
						<div class="card-body" align="left">
							<div class="card-header" align="center">
								<h2 class="h5 text-primary">PDAM TIRTA MUSI UNIT KARANG ANYAR</h2>
								<h2 class="h6 text-primary">KOTA PALEMBANG</h2>
							</div>
							<br />
							<div class="form-group">
								<label class="text-primary"><b>Kode Unit : 7 Unit Karang Anyar</b></label>
							</div>
							<form id="mohon_form" class="user" method="POST">
								<div class="form-group">
									<label>No. Kontrol : </label>
									<input type="text" class="form-control" id="nomor_urut" name="nomor_urut" value="<?php echo $no_kontrol ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama Pelanggan : </label>
									<input type="text" class="form-control" id="nama_permohon" value="<?php echo $nama ?>" name="nama_permohon" readonly>
								</div>
								<div class="form-group">
									<label>Alamat : </label>
									<input type="text" class="form-control" id="nama_permohon" value="<?php echo $alamat ?>" name="alamat_permohon" readonly>
								</div>
								<div class="form-group">
									<label>Tanggal : </label>
									<input type="date" class="form-control" id="tanggal_permohonan" value="<?php echo $date ?>" name="tanggal_permohon" readonly>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label>No. Agenda : </label>
										<input type="text" class="form-control" id="no_agenda" value="" name="no_agenda" required>
										<?= form_error('no_agenda', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>Ukuran Meter</label>
										<select class="form-control" id="ukuran_meter" name="ukuran_meter" required>
											<option value="2" selected>2 Inch</option>
											<option value="5" selected>5 Inch</option>
										</select>
										<?= form_error('ukuran_meter', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group col-md-4">
										<label>Merek Meter</label>

										<select class="form-control" id="merek_meter" name="merek_meter" required>
											<option value="ITRON" selected>ITRON</option>
											<option value="ATARIS" selected>ATARIS</option>
										</select>
										<?= form_error('merek_meter', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group col-md-4">
										<label>Seri Meter</label>
										<input type="text" class="form-control" id="seri_meter" name="seri_meter" required>
										<?= form_error('seri_meter', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label>Tanggal Pengaduan: </label>
										<input type="date" class="form-control" id="tgl_pengaduan" name="tgl_pengaduan" required>
										<?= form_error('tgl_pengaduan', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group col-md-6">
										<label>Tanggal PK: </label>
										<input type="date" class="form-control" id="tgl_pk" name="tgl_pk" required>
										<?= form_error('tgl_pk', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label>Tanggal Meter: </label>
										<input type="date" class="form-control" id="tgl_meter" name="tgl_meter" required>
										<?= form_error('tgl_meter', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group col-md-6">
										<label>Tanggal Pasang: </label>
										<input type="date" class="form-control" id="tgl_pasang" name="tgl_pasang" required>
										<?= form_error('tgl_pasang', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group ">
									<label>Jenis Keluhan: </label>
									<select class="form-control" id="jenis_keluhan" name="jenis_keluhan" required>
										<option value="" selected>Pilih Keluhan</option>
										<option value="Lonjakan Tagihan Ai">Lonjakan Tagihan Air</option>
										<option value="Tagihan Air Tidak Sesuai Pemakaian">Tagihan Air Tidak Sesuai Pemakaian</option>
										<option value="Tagihan Air per Bulan Tidak Stabil">Tagihan Air per Bulan Tidak Stabil </option>
										<option value="Tagihan Rekening Air Belum Terkonfirmasi">Tagihan Rekening Air Belum Terkonfirmasi</option>
										<option value="Tagihan Rekening Air Sudah Dibayar Tapi Masih Ada Tunggakan">Tagihan Rekening Air Sudah Dibayar Tapi Masih Ada Tunggakan</option>

									</select>
									<div class="form-group">
										<label for="informasi">Catatan: </label>
										<textarea class="form-control" rows="3" name="catatan" id="tujuan_informasi" required></textarea>
										<?= form_error('catatan', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<button type="submit" value="clear" id="setUlang" class="btn btn-danger">Refresh</button>
									<button type="submit" class="btn btn-primary" id="submitMohon">Kirim</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-1"></div>
		</div>
	</div>
	<!-- Page Heading -->
</div>

<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.2.1.js' ?>"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#mohon_form').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/MemberControl/submit_pengaduan',
				type: "post",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function(data) {
					location.reload();
					swal({
						title: 'Keluhan Dikirim',
						text: '',
						type: 'success'
					});
				}
			});
		});
	});
</script>
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
						<h1 class="h3 text-primary">Form Pengumuman</h1>
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
							<form id="pengumuman_form" class="user" method="POST">
								<!--
									<div class="form-group">
										<label for="nama_permohonan">No. Urut Pendaftaran : </label>
										<input type="text" class="form-control" id="nomor_urut" name="nomor_urut" value="<?php echo $no_urut ?>" readonly>
									</div>
									<div class="form-group">
										<label for="nama_permohonan">Nama Pemohon Konsultasi : </label>
										<input type="text" class="form-control" id="nama_permohon" value="<?php echo $nama ?>" name="nama_permohon" readonly>
									</div>
									-->
								<div class="form-group">
									<label>Judul : </label>
									<input type="text" class="form-control" id="judul" name="judul" required </div> <div class="form-row">
									<div class="form-group col-md-6">
										<label>Tanggal : </label>
										<input type="date" class="form-control" id="tgl_pengumuman" name="tgl_pengumuman" required>
									</div>
									<div class="form-group col-md-6">
										<label>Waktu : </label>
										<input type="time" class="form-control" id="waktu_pengumuman" name="waktu_pengumuman" required>
									</div>
								</div>

								<div class="form-group">
									<label>Wilayah : </label>
									<input type="text" class="form-control" id="wilayah" name="wilayah" required>
								</div>
								<div class="form-group">
									<label>Isi Pengumuman : </label>
									<textarea class="form-control" rows="3" name="isi_pengumuman" id="isi_pengumuman" required></textarea>
								</div>

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
		$('#pengumuman_form').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/AdminControl/submit_pengumuman',
				type: "post",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function(data) {

					location.reload();
					swal({
						title: 'Pengumuman Berhasil Diupload',
						text: '',
						type: 'success'
					});
				}
			});
		});
	});
</script>
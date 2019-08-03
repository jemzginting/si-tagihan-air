<div class="container">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Rekapan Konsultasi</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Rekapan Konsultasi</h6>
		</div>
		<div class="card-body">
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-200"></i> Cetak Rekap</a>
			<hr>
			<div class="table-responsive">
				<table class="table table-bordered" id="rekap_konsultasi" width="100%">
					<thead>
						<tr>
							<th width="1%">
								<center>No</center>
							</th>
							<th width="12%">
								<center>Nama</center>
							</th>
							<th width="17%">
								<center>Alamat</center>
							</th>
							<th width="7%">
								<center>No.Telepon</center>
							</th>
							<th width="7%">
								<center>KTP</center>
							</th>
							<th width="8%">
								<center>Tanggal Permohonan</center>
							</th>
							<th width="10%">
								<center>Jenis Informasi</center>
							</th>
							<!--
							<th width="5%">
								<center>Informasi yang diminta</center>
							</th>
							<th width="5%">
								<center>Status</center>
							</th>
							-->
							<th width="10%">
								<center>Aksi</center>
							</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
				<!--
				<div class="row">
					<div class="col-lg-12">
						<a href="<?php echo site_url('CetakControl/generatePDFFile') ?>" target="_blank" class="pull-right btn btn-primary btn-xs" style="margin: 2px;"><i class="fa fa-plus"></i> Create PDF File</a>
					</div>
				</div>
				-->
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

<script>
	$(document).ready(function() {
		$('#rekap_konsultasi').DataTable();
	});
</script>

<script type="text/javascript" language="javascript">
	$('#rekap_konsultasi').ready(function() {
		var c = $('#rekap_konsultasi').DataTable();
		load_data();

		function load_data() {
			$.ajax({

				url: '<?php echo site_url('AdminControl/get_rekap_konsultasi') ?>',
				dataType: "JSON",
				success: function(data) {
					c.clear().draw();
					var HTMLbuilder = "";
					for (var i = 0; i < data.length; i++) {
						//var btn1 = '<a href = "#" target="_blank" name="btn_cetak" id="' + data[i]['no_konsul'] + '" class="btn btn-xs btn-primary btn_cetak">Cetak PDF</a>';
						//	var btn2 = '<button type="button" name="btn_delete" id="' + data[i]['no_konsul'] + '" class="btn btn-xs btn-danger btn_tolak">Ditolak</button>';
						//	var btn2 = '<a href="<?php echo site_url('CetakControl/generatePDFFile') ?>" target="_blank" class="pull-right btn btn-primary btn-xs" style="margin: 2px;"><i class="fa fa-plus"></i> Cetak PDF</a>';

						var btn1 = '<a href="http://localhost/pengadilan/CetakControl/generatePDFFile?id=' + data[i]['no_konsul'] + '" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="font-size:5;"><i class="fa fa-download"></i> Cetak</a>';

						var imgHtml = "<img src='../assets/img/" + data[i]['ktp'] + "' width='100' height='70'>";
						//	HTMLbuilder = HTMLbuilder + imgHtml;
						if (data[i]['status'] == "terima") {
							status = "<b>DITERIMA</b>";
						} else {
							status = "<b>DITOLAK</b>";
						}

						c.row.add([
							"<center>" + [i + 1] + "</center>",
							"<center>" + data[i]['nama_permohon'] + "</center>",
							"<center>" + data[i]['alamat'] + "</center>",
							"<center>" + data[i]['no_telepon'] + "</center>",
							"<center>" + imgHtml + "</center>",
							"<center>" + data[i]['tanggal_permohonan'] + "</center>",
							"<center>" + data[i]['jenis_informasi'] + "</center>",
							//"<center>" + status + "</center>",
							"<center>" + btn1 + "</center>",
						]).draw();
					}
				}
			});
		}

		$(document).on("click", ".btn_cetak", function() {
			var no_konsul = $(this).attr('id');

			$.ajax({
				url: "<?php echo site_url('CetakControl/generatePDFFile') ?>",
				method: "POST",
				data: {
					no_konsul: no_konsul
				},
				success: function(data) {
					//load_data();
				}
			});
		});
	});
</script>
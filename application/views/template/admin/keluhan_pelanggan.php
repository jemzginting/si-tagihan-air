<div class="container">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h4 class="m-0 font-weight-bold text-primary">Konfirmasi Keluhan Air Pelanggan</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="laporan_keluhan" width="100%">
					<thead>
						<tr>
							<th width="1%">
								<center>No</center>
							</th>
							<th width="20%">
								<center>Nama</center>
							</th>
							<th width="15%">
								<center>Tanggal Keluhan</center>
							</th>
							<th width="15%">
								<center>Jenis Keluhan</center>
							</th>
							<th width="18%">
								<center>Detail Keluhan</center>
							</th>
							<th width="">
								<center>Aksi</center>
							</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Laporan Keluhan Pelanggan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<h3>Info Keluhan</h3>
					<table class="table table-bordered" id="detail_keluhan" width="100%">
						<thead>
							<tr>
								<th width="1%">
									<center>No. kontrol</center>
								</th>
								<th width="10%">
									<center>Nama</center>
								</th>
								<th width="15%">
									<center>Alamat</center>
								</th>
								<th width="10%">
									<center>Ukuran Meter</center>
								</th>
								<th width="10%">
									<center>Merek Meter</center>
								</th>
								<th width="10%">
									<center>Seri Meter</center>
								</th>
								<th width="10%">
									<center>No. Locis</center>
								</th>
								<th width="10%">
									<center>No. Agenda</center>
								</th>
								<th width="10%">
									<center>Tgl. Pengaduan</center>
								</th>
								<th width="10%">
									<center>Tgl. PK</center>
								</th>
								<th width="18%">
									<center>Tgl. Meter</center>
								</th>
								<th width="10%">
									<center>Tgl. Pasang</center>
								</th>
								<th width="15%">
									<center>Jenis Keluhan</center>
								</th>
								<th width="15%">
									<center>Catatan</center>
								</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Reply -->
<div class="modal fade bd-example-modal-xl" id="BalasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Balasan Keluhan Pelanggan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<h3>Balasan Keluhan</h3>
					<form id="balas_form" class="user" method="POST">
						<div class="form-group">
							<textarea class="form-control" rows="3" name="isi_balasan" id="isi_balasan"></textarea>
						</div>
						<button type="submit" class="btn btn-primary" name="btn_reply" id="btn_reply">Kirim</button>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

<script type="text/javascript" language="javascript">
	$('#laporan_keluhan').ready(function() {
		var c = $('#laporan_keluhan').DataTable();
		load_data();

		function load_data() {
			$.ajax({

				url: '<?php echo site_url("AdminControl/get_rekap_keluhan") ?>',
				dataType: "JSON",
				success: function(data) {
					c.clear().draw();

					for (var i = 0; i < data.length; i++) {
						var modal = '<button type="button" class="btn btn-xs btn-primary btn_detail" id="' + data[i]['id_keluhan'] + '" data-toggle="modal" data-target="#exampleModal">Lihat</button>';
						//var btn = '<button type="button" name="btn_terima" id="' + data[i]['no_konsul'] + '" class="btn btn-xs btn-primary btn-circle btn_terima"><i class="fas fa-check"></i></button>';
						var btn1 = '<button type="button" name="btn_terima" id="' + data[i]['id_keluhan'] + '" class="btn btn-xs btn-primary btn_kirim" data-toggle="modal" data-target="#BalasModal">Reply</button>';
						//var imgHtml = "<img src='../assets/img/" + data[i]['ktp'] + "' width='150' height='100'

						c.row.add([
							"<center>" + [i + 1] + "</center>",
							"<center>" + data[i]['nama_permohon'] + "</center>",
							"<center>" + data[i]['tanggal_permohon'] + "</center>",
							"<center>" + data[i]['jenis_keluhan'] + "</center>",
							"<center>" + modal + "</center>",
							"<center>" + btn1 + "</center>",
						]).draw();
					}
				}
			});
		}


		$(document).on("click", ".btn_detail", function() {
			var id_keluhan = $(this).attr('id');

			var t = $('#detail_keluhan').DataTable();
			$.ajax({
				url: "<?php echo site_url('AdminControl/get_personal_keluhan'); ?>",
				method: "GET",
				data: {
					id_keluhan: id_keluhan
				},
				success: function(ajaxData) {
					t.clear().draw();
					var result = JSON.parse(ajaxData);
					t.row.add([
						"<center>" + result[0]['no_kontrol'] + "</center>",
						"<center>" + result[0]['nama_permohon'] + "</center>",
						"<center>" + result[0]['alamat_permohon'] + "</center>",
						"<center>" + result[0]['ukuran_meter'] + "</center>",
						"<center>" + result[0]['merek_meter'] + "</center>",
						"<center>" + result[0]['seri_meter'] + "</center>",
						"<center>" + result[0]['no_locis'] + "</center>",
						"<center>" + result[0]['no_agenda'] + "</center>",
						"<center>" + result[0]['tgl_pengaduan'] + "</center>",
						"<center>" + result[0]['tgl_pk'] + "</center>",
						"<center>" + result[0]['tgl_meter'] + "</center>",
						"<center>" + result[0]['tgl_pasang'] + "</center>",
						"<center>" + result[0]['jenis_keluhan'] + "</center>",
						"<center>" + result[0]['catatan'] + "</center>",
					]).draw();



				}
			});

		});

		$(document).on("click", ".btn_kirim", function() {
			var id_keluhan = $(this).attr('id');

			$.ajax({
				url: "<?php echo site_url('AdminControl/get_balasan_keluhan'); ?>",
				method: "GET",
				data: {
					id_keluhan: id_keluhan,
				},
				success: function(ajaxData) {
					var hasil = JSON.parse(ajaxData);
					$('#isi_balasan').val(hasil[0]['reply_keluhan']);

				}
			});




			$(document).on("click", "#btn_reply", function() {
				isi_balasan = $('#isi_balasan').val();
				$.ajax({
					url: "<?php echo site_url('AdminControl/kirim_reply'); ?>",
					method: "GET",
					data: {
						id_keluhan: id_keluhan,
						isi_balasan: isi_balasan
					},
					success: function(ajaxData) {
						//load_data();
						swal({
							title: 'Berhasil Dibalas',
							text: '',
							type: 'success'
						});


					}
				});



			});

		});




	});
</script>
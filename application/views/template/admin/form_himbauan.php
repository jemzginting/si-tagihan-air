<div class="container">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h4 class="m-0 font-weight-bold text-primary">Kirim Himbauan Pelanggan</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="laporan_tunggakan" width="100%">
					<thead>
						<tr>
							<th width="1%">
								<center>No</center>
							</th>
							<th width="15%">
								<center>Nama</center>
							</th>
							<th width="10%">
								<center>No. Kontrol</center>
							</th>
							<th width="10%">
								<center>Lama Tunggakan</center>
							</th>
							<th width="20%">
								<center>Bulan Tunggakan</center>
							</th>
							<th width="10%">
								<center>Total Tunggakan</center>
							</th>
							<th width="10%">
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

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

<script type="text/javascript" language="javascript">
	$('#laporan_tunggakan').ready(function() {
		var c = $('#laporan_tunggakan').DataTable();
		load_data();

		function load_data() {
			$.ajax({

				url: '<?php echo site_url("AdminControl/get_all_tunggakan_personal") ?>',
				dataType: "JSON",
				success: function(data) {
					c.clear().draw();
					var HTMLbuilder = "";
					for (var i = 0; i < data.length; i++) {
						var btn1 = '<button type="button" name="btn_kirim" id="' + data[i]['no_kontrol'] + '" class="btn btn-xs btn-primary btn_kirim"><i class="fas fa-location-arrow"></i>Kirim Himbauan</button>';
						//	var btn2 = '<button type="button" name="btn_delete" id="' + data[i]['no_kontrol'] + '" class="btn btn-xs btn-danger btn-circle btn_tolak"><i class="fas fa-trash"></i></button>';

						c.row.add([
							"<center>" + [i + 1] + "</center>",
							"<center>" + data[i]['name'] + "</center>",
							"<center>" + data[i]['no_kontrol'] + "</center>",
							"<center>" + data[i]['jumlah'] + " Bulan" + "</center>",
							"<center>" + "Dari Bulan " + data[i]['awal'] + " Sampai Bulan" + data[i]['akhir'] + "</center>",
							"<center>" + "Rp " + data[i]['total_tagihan'] + "</center>",
							"<center>" + btn1 + "</center>",

						]).draw();
					}
				}
			});
		}


		$(document).on("click", ".btn_kirim", function() {
			var no_kontrol = $(this).attr('id');
			var status = "yes";

			$.ajax({
				url: "<?php echo site_url('AdminControl/konfirm_himbauan'); ?>",
				method: "POST",
				data: {
					no_kontrol: no_kontrol,
					status: status
				},
				success: function(data) {
					load_data();
					swal({
						title: 'Konfirmasi Berhasil',
						text: '',
						type: 'success'
					});
				}
			});

		});

		$(document).on("click", ".btn_tolak", function() {
			var no_kontrol = $(this).attr('id');
			var status = "tolak";
			swal({
					title: "Tolak Pasang Baru",
					text: "Apakah anda yakin akan Menolak Pasang Baru ini?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Hapus",
					closeOnConfirm: true,
				},
				function() {
					$.ajax({
						url: "<?php echo site_url('AdminControl/konfirm_pasangbaru'); ?>",
						method: "POST",
						data: {
							no_kontrol: no_kontrol,
							status: status
						},
						success: function(data) {
							load_data();
							swal({
								title: 'Berhasil Ditolak',
								text: '',
								type: 'success'
							});
						}
					});
				});
		});
	});
</script>
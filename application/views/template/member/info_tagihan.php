<?php $date = date('d:m:Y'); ?>
<div class="container">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h4 class="m-0 font-weight-bold text-primary">Info Tagihan Pelanggan</h4>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6">
					<p>No. Kontrol : <?php echo $session['no_kontrol']; ?></p>
					<p>Nama Lengkap : <?php echo $session['name']; ?> </p>
					<p>Alamat : <?php echo $session['alamat']; ?> </p>
					<p>Aktif : <?php echo $session['aktif']; ?> </p>
					<p>No. Telepon : <?php echo $session['no_telepon']; ?> </p>
					<p>Tanggal Aktif : <?php echo $date; ?> </p>
				</div>
			</div>
			<div class="row">
				<div class="table-responsive">
					<table class="table table-bordered" id="rekap_tagihan" width="100%">
						<thead>
							<tr>
								<th width="1%">
									<center>No</center>
								</th>
								<th width="20%">
									<center>Bulan Rek</center>
								</th>
								<th width="15%">
									<center>Lunas</center>
								</th>
								<th width="15%">
									<center>Tarif</center>
								</th>
								<th width="15%">
									<center>St. Awal</center>
								</th>
								<th width="18%">
									<center>St. Akhir</center>
								</th>
								<th width="20%">
									<center>Pemakaian</center>
								</th>
								<th width="20%">
									<center>Rp. Tagihan</center>
								</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-9">
				</div>
				<div class="col-lg-3">
					<p>
						<h6><b>Jumlah : <?php echo $get['jumlah']; ?></b></h6>
						<h6><b>Total Tagihan : Rp <?php echo $get['total_tagihan']; ?></b></h6>
					</p>

				</div>
			</div>

		</div>
	</div>
</div>
<!-- /.container-fluid -->




<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

<script type="text/javascript" language="javascript">
	$('#rekap_tagihan').ready(function() {
		var c = $('#rekap_tagihan').DataTable();
		load_data();

		function load_data() {
			$.ajax({

				url: '<?php echo site_url("MemberControl/get_rekap_tagihan") ?>',
				dataType: "JSON",
				success: function(data) {
					c.clear().draw();

					for (var i = 0; i < data.length; i++) {
						var modal = '<button type="button" class="btn btn-xs btn-primary btn_detail" id="' + data[i]['id_tagihan'] + '" data-toggle="modal" data-target="#exampleModal">Lihat</button>';
						//var btn = '<button type="button" name="btn_terima" id="' + data[i]['no_konsul'] + '" class="btn btn-xs btn-primary btn-circle btn_terima"><i class="fas fa-check"></i></button>';
						//var imgHtml = "<img src='../assets/img/" + data[i]['ktp'] + "' width='150' height='100'

						c.row.add([
							"<center>" + [i + 1] + "</center>",
							"<center>" + data[i]['bulan'] + "-" + data[i]['tahun'] + "</center>",
							"<center>" + data[i]['lunas'] + "</center>",
							"<center>" + data[i]['tarif'] + "</center>",
							"<center>" + data[i]['st_awal'] + "</center>",
							"<center>" + data[i]['st_akhir'] + "</center>",
							"<center>" + data[i]['pemakaian'] + "</center>",
							"<center>" + data[i]['biaya'] + "</center>",
						]).draw();

					}
				}
			});
		}


		$(document).on("click", ".btn_detail", function() {
			var id_keluhan = $(this).attr('id');

			var t = $('#detail_keluhan').DataTable();
			$.ajax({
				url: "<?php echo site_url('MemberControl/get_personal_keluhan'); ?>",
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
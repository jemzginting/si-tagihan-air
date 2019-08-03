<div class="container">
	<div class="row">
		<!-- Page Heading -->
		<h1 class="h3 mb-2 text-gray-800" align="center">Info Pengumuman pada PDAM Unit Karang Anyar Kota Palembang</h1>
		<br>
		<!-- DataTales Example -->
		<div class="col-lg-12" align="center">
			<!-- Collapsable Card Example -->
			<div class="card shadow mb-4">
				<!-- Card Header - Accordion -->
				<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
					<h6 class="m-0 font-weight-bold text-primary">Info Pengumuman</h6>
				</a>
				<!-- Card Content - Collapse -->
				<div class="collapse show" id="collapseCardExample">
					<div class="card-body" align="left">
						<?php foreach ($all as $row) { ?>
							<div class="alert alert-info" role="alert">
								<p class="h6">
									<small>No Kontrol : <?php echo $row['no_kontrol'] ?> </small>

									<br>

									<small>Tunggakan Anda : <?php echo $row['lama_tunggakan'] ?> Bulan </small><br>
									<small>Dari Bulan ke <?php echo $row['awal'] ?> sampe Bulan <?php echo $row['akhir'] ?></small><br>
									<small>Total Tagihan Rp <?php echo $row['total_tunggakan'] ?></small>
									<br>
									<a href="http://localhost/pdam/CetakControl/generatePDFFile?id=<?php echo $row['id_himbauan'] ?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="font-size:5;"><i class="fa fa-download"></i> Cetak Himbauan</a>

							</div>
						<?php
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

<script type="text/javascript" language="javascript">
	$('#detail_pengumuman').ready(function() {

		$(document).on("click", ".btn_pengumuman", function() {
			var id_pengumuman = $(this).attr('id');

			$.ajax({
				url: "<?php echo site_url('MemberControl/get_detail_pengumuman'); ?>",
				method: "GET",
				data: {
					id_pengumuman: id_pengumuman,
				},
				success: function(ajaxData) {
					var hasil = JSON.parse(ajaxData);
					$("#test1").text(hasil[0]['judul']);
					$("#test2").text(hasil[0]['tanggal']);
					$("#test3").text(hasil[0]['time']);
					$("#test4").text(hasil[0]['wilayah']);
					$("#test5").text(hasil[0]['isi_pengumuman']);

				}
			});

		});




	});
</script>
<?php $date = date('Y'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card-body">
		<div class="row">
			<div class="col-lg-10" align="center">
				<!-- Collapsable Card Example -->
				<div class="card shadow mb-4">
					<!-- Card Header - Accordion -->
					<div class="card-header">
						<h1 class="h5 text-primary">Form Input Tagihan</h1>
					</div>
					<!-- Card Content - Collapse -->
					<div class="collapse show" id="collapseCardExample">
						<div class="card-body" align="left">
							<form id="form_tagihan" class="user" method="POST">

								<div class="form-group">
									<label>No. Kontrol : </label>
									<select class="form-control" id="no_kontrol" name="no_kontrol" required>
										<?php foreach ($id as $row) { ?>
											<option value="<?= $row['no_kontrol'] ?>" selected><?= $row['no_kontrol'] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>Bulan: </label>
										<select class="form-control" id="bulan" name="bulan">
											<option value='01'>Januari</option>
											<option value='02'>Februari</option>
											<option value='03'>Maret</option>
											<option value='04'>April</option>
											<option value='05'>Mei</option>
											<option value='06'>Juni</option>
											<option value='07'>Juli</option>
											<option value='08'>Agustus</option>
											<option value='09'>September</option>
											<option value='10'>Oktober</option>
											<option value='11'>November</option>
											<option value='12'>Desember</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label> Tahun : </label>
										<select class="form-control" id="tahun" name="tahun" required>
											<?php for ($i = $date; $i >= 2019; $i--) { ?>
												<option value='<?php echo $i; ?>'> <?php echo $i; ?> </option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>St Awal: </label>
										<input type="number" class="form-control" id="st_awal" name="st_awal" required min="0" max="10000"  step="1"  / />
									</div>
									<div class="form-group col-md-4">
										<label> St Akhir : </label>
										<input type="number" class="form-control" id="st_akhir" name="st_akhir" required min="0" max="10000" step="1" />
									</div>
									<div class="form-group col-md-4">
										<label> Pemakaian : </label>
										<select class="form-control" id="pemakaian" name="pemakaian">
											<?php for ($i = 1; $i <= 50; $i++) { ?>
												<option value='<?php echo $i; ?>'> <?php echo $i; ?> </option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>Tarif: </label>
										<select class="form-control" id="tarif" name="tarif">
											<option value='1A'>1A</option>
											<option value='1B'>1B</option>
											<option value='1C'>1C</option>
											<option value='1D'>1D</option>
											<option value='2A'>2A</option>
											<option value='2B'>2B</option>
											<option value='2C'>2C</option>
											<option value='2D'>2D</option>									
											<option value='3A'>3A</option>
											<option value='3B'>3B</option>
											<option value='3C'>3C</option>
											<option value='3D'>3D</option>											
											<option value='4'>4</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label>Aktif: </label>
										<select class="form-control" id="aktif" name="aktif">
											<option value='ya'>Ya</option>
											<option value='tidak'>Tidak</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label> Lunas : </label>
										<select class="form-control" id="lunas" name="lunas">
											<option value='ya'>Ya</option>
											<option value='tidak'>Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label>Biaya Tagihan : </label>
									<br>
									<span> Rp </span>
									<input type="text" class="form-control" id="biaya" name="biaya" required  />
								</div>
								<button type="submit" class="btn btn-primary" id="submitMohon">Save</button>
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
		$('#form_tagihan').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/AdminControl/submit_tagihan',
				type: "post",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function(data) {

					location.reload();
					swal({
						title: 'Tagihan Berhasil Dikirim',
						text: '',
						type: 'success'
					});
				}
			});
		});
	});

/*
	var rupiah = document.getElementById("biaya");
	rupiah.addEventListener("keyup", function(e) {
  	// tambahkan 'Rp.' pada saat form di ketik
  	// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  		rupiah.value = formatRupiah(this.value, "Rp. ");
	}); */

/* Fungsi formatRupiah */
/*
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp " + rupiah : "";
}
*/


</script>


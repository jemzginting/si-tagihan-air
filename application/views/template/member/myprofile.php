<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="col-xl-8 col-md-3 mb-2">
		<div class="card shadow h-10">
			<div class="card-header py-2">
				<h1 class="h3" align="center">Profile Pelanggan</h1>
			</div>
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col-sm-1"></div>
					<div class="col-sm-2">
						<i class="far fa-user fa-8x text-gray-300"></i>
					</div>
					<div class="col-sm-9">
						<table cellpadding="2">
							<tr>
								<td class="h6 font-weight-bold text-primary" width="220">Nama</td>
								<td class="h6 font-weight-bold text-primary">: <?= $session['name']; ?></td>
							</tr>
							<tr>
								<td class="h6 font-weight-bold text-primary">Nomor Kontrol PDAM</td>
								<td class="h6 font-weight-bold text-primary">: <?= $session['no_kontrol']; ?></td>
							</tr>
							<tr>
								<td class="h6 font-weight-bold text-primary">Tanggal Pasang Baru</td>
								<td class="h6 font-weight-bold text-primary">: <?= $session['date_created']; ?></td>
							</tr>

							<tr>
								<td class="h6 font-weight-bold text-primary">Alamat</td>
								<td class="h6 font-weight-bold text-primary">: <?= $session['alamat']; ?></td>
							</tr>

						</table>
						<!-- <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $session['name']; ?></div>
					<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
					<?= $session['nik']; ?></div>
					<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						<?= $session['email']; ?></div>
					<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						<?= $session['pekerjaan']; ?></div>
					<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						<?= $session['alamat']; ?></div>
					<div class="h6 mb-0 font-weight-bold text-gray-800"><small>Member since
							<?= date('d F Y', $session['date_created']); ?></small></div>
					</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
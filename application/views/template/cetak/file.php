<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<table border="">
				<tr>
					<td rowspan="3" width="100"><img src="<?= base_url('assets/'); ?>img/download.png" style="width:87px; height:110px;"></td>
					<td width="700"></td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>
			<h3 align="center">
				PDAM KOTA PALEMBANG
			</h3>
			<h3 align="center">
				Himbauan Tagihan Air Pelanggan
			</h3>
			<h6 align="center">
				Jl. BASENGGGGGG Kota Palembang, Sumatera Selatan 30257
				</h5>
				<hr />
				<hr />
				<h4 align="center">
					BASENGGGGGGGGGGGGGGGGGG
				</h4>
				<h4 align="center">
					BASENGGGGGGGGGG
				</h4>

				<p> <?php print $getInfo['name']; ?></p>
				<p><?php print $getInfo['alamat']; ?></p>
				<p> <?php print $getInfo['no_telepon']; ?></p>
				<p> <?php print $getInfo['no_kontrol']; ?></p>
				<p> lamo nunggak suda <?php print $getInfo['lama_tunggakan']; ?> bulan </p>
				<p> Nunggak dari bulan <?php print $getInfo['awal']; ?> sampai bulan <?php print $getInfo['akhir']; ?> </p>
				<p> Total Bayaran sebesar Rp <?php print $getInfo['total_tunggakan']; ?></p>
		</div>
	</div>
</div>
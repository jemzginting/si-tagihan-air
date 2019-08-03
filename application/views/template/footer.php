<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-right my-auto">
			<span>Copyright &copy; PDAM Unit Karang Anyar Kota Palembang <?= date('Y'); ?></span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page Another plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!--
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.bundle.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.bundle.min.js"></script>
-->
<script src="<?php echo base_url('assets'); ?>/vendor/ChartJs/dist/Chart.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/ChartJs/dist/Chart.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/ChartJs/dist/Chart.bundle.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/ChartJs/dist/Chart.bundle.min.js"></script>

<!-- Sweetalert -->
<script src="<?php echo base_url('assets'); ?>/vendor/sweetalert/sweetalert.min.js"></script>

<!-- Page Script Admin -->
<script>
	$(document).ready(function() {
		$('#laporan_pelayanan').DataTable();
		//$('#laporan_konsultasi').DataTable();
	});
</script>

<script>
	var ctx = document.getElementById("myPieChart");
	var myPieChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ["Buruk", "Cukup", "Baik", "Sangat Baik"],
			datasets: [{
				data: [55, 30, 15, 40],
				backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', 'rgba(254, 241, 96, 1)'],
				hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', 'rgba(255, 236, 139, 1)'],
				hoverBorderColor: "rgba(234, 236, 244, 1)",
			}],
		},
		options: {
			maintainAspectRatio: false,
			tooltips: {
				backgroundColor: "rgb(255,255,255)",
				bodyFontColor: "#858796",
				borderColor: '#dddfeb',
				borderWidth: 1,
				xPadding: 15,
				yPadding: 15,
				displayColors: false,
				caretPadding: 10,
			},
		},
	});
</script>





</body>

</html>
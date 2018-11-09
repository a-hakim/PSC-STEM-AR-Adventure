<!-- HEADER -->
<?php require 'component/header.php'; ?>

<body class="bg-dark" style="margin: 16px auto;">

	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">

				<div class="card">
					<div class="card-body text-center">
						<h4>CONGRATULATION!</h4>
						<p class="card-text">
							You have completed the STEM AR Tour @ Penang Science Cluster
						</p>
						<h4 class="text-success">
							<span class="badge badge-success">TOTAL : <?php echo $_GET['points']; ?> POINTS!</span>
						</h4>
						<hr>
						<p><img src="img/badge.png" class="rounded" style="width: 100%; max-width: 360px;"></p>
						<p>SHARE YOUR ACHIVEMENT</p>
						<div class="row">
							<div class="col-md-4">
								<button type="button" class="btn btn-info btn-block" style="margin-bottom: 8px;">
									<i class="fab fa-facebook"></i> Share
								</button>
							</div>
							<div class="col-md-4">
								<button type="button" class="btn btn-primary btn-block" style="margin-bottom: 8px;">
									<i class="fab fa-twitter"></i> Tweet
								</button>
							</div>
							<div class="col-md-4">
								<button type="button" class="btn btn-success btn-block" style="margin-bottom: 8px;">
									<i class="fab fa-whatsapp"></i> Message
								</button>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
<!-- FOOTER -->
<?php require 'component/footer.php'; ?>	
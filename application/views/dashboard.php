<section class="section">
	<section class="section">
		<div class="section-header">
			<h1>Halaman Awal</h1>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6 ">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="fas fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<a class="nav-link" href="<?= site_url("customer"); ?>">
								<h4>Total Customer</h4>
							</a>
						</div>
						<div class="card-body">
							</span><?= $this->fungsi->countCustomer()  ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 ">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-truck"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<a class="nav-link" href="<?= site_url("supplier"); ?>">
								<h4>Total Supplier</h4>
							</a>
						</div>
						<div class="card-body">
							</span><?= $this->fungsi->countSupplier()  ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 ">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-truck-loading"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<a class="nav-link" href="<?= site_url("material"); ?>">
								<h4>Total Material</h4>
							</a>
						</div>
						<div class="card-body">
							</span><?= $this->fungsi->countMaterial()  ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 ">
				<div class="card card-statistic-1">
					<div class="card-icon bg-info">
						<i class="fas fa-chart-line"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<a class="nav-link" href="<?= site_url("proses"); ?>">
								<h4>Total Proses</h4>
							</a>
						</div>
						<div class="card-body">
							</span><?= $this->fungsi->countProses()  ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 ">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-box"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<a class="nav-link" href="<?= site_url("part"); ?>">
								<h4>Total Part</h4>
							</a>
						</div>
						<div class="card-body">
							</span><?= $this->fungsi->countPart() ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 ">
				<div class="card card-statistic-1">
					<div class="card-icon bg-dark">
						<i class="fas fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<a class="nav-link" href="<?= site_url("user"); ?>">
								<h4>Total User</h4>
							</a>
						</div>
						<div class="card-body">
							</span><?= $this->fungsi->countUser()  ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
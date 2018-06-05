
	<br>
	<br>
	<br>
	<div class="container">
		<div class="col-md-6 offset-3">
			<div class="jumbotron" style="background-color: rgba(000, 000, 000, 0.6);">

				<h1 align="center" style="color: white;">Masuk</h1>

				<br>
				<?php if ($stat == "gagal"){ ?>
					<div align="center">
						<label style="color: red;" class="control-label">Email atau Password salah.</label>
					</div>
				<?php } ?>

				<form method="post" action="<?php echo site_url('Utama/prosesLogin'); ?>">
					
					<br>
					<div class="row">
						<div class="col-md-10 offset-1">
							<div class="form-group">
								<label class="col-md-3 control-label">Email</label>
								<div class="col-md-12">
									<input type="text" name="Email" class="form-control" id="inputEmail" placeholder="Email" autofocus>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-10 offset-1">
							<div class="form-group">
								<label class="col-md-3 control-label">Password</label>
								<div class="col-md-12">
									<input type="password" name="Pass" class="form-control" id="inputPass" placeholder="Password" autofocus>
								</div>
							</div>
						</div>
					</div>

					<br>
					<br>
					<div class="row">
						<div class="col-md-6 offset-3">
							<button type="submit" name="submit" class="btn btn-block btn-success">Masuk</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
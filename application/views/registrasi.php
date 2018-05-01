
	<br>
	<br>
	<br>
	<div class="container">
		<div class="col-md-10 offset-1">
			<div class="jumbotron" style="background-color: rgba(000, 000, 000, 0.6);">
				
				<h1 align="center" style="color: white;">Daftar</h1>

				<form method="post" action="<?php echo site_url('Utama/prosesRegistrasi'); ?>">
					
					<br>
					<div class="row">
						<div class="col-md-10 offset-1">
							<div class="form-group">
								<label class="col-md-3 control-label">Nama</label>
								<div class="col-md-12">
									<input type="text" name="Nama" class="form-control" id="inputNama" placeholder="Nama" required autofocus>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-10 offset-1">
							<div class="form-group">
								<label class="col-md-8 control-label">Jenis Kelamin</label>
								<div class="col-md-12">
									<select class="form-control" name="JK" required>
					                    <option value="Laki-Laki" selected>Laki-Laki</option>
					                    <option value="Perempuan">Perempuan</option>
					                </select>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-10 offset-1">
							<div class="form-group">
								<label class="col-md-8 control-label">Tempat Lahir</label>
								<div class="col-md-12">
									<input type="text" name="Tempat" class="form-control" id="inputTempat" placeholder="Tempat Lahir" required autofocus>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-10 offset-1">
							<div class="form-group">
								<label class="col-md-8 control-label">Tanggal Lahir</label>
								<div class="col-md-12">
									<input type="date" name="Tanggal" class="form-control" id="inputTanggal" required autofocus>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-10 offset-1">
							<div class="form-group">
								<label class="col-md-3 control-label">No KTP</label>
								<div class="col-md-12">
									<input type="text" name="KTP" class="form-control" id="inputKTP" placeholder="Nomor KTP" required autofocus>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-10 offset-1">
							<div class="form-group">
								<label class="col-md-8 control-label">No HP</label>
								<div class="col-md-12">
									<input type="text" name="HP" class="form-control" id="inputHP" placeholder="Nomor HP" required autofocus>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-10 offset-1">
							<div class="form-group">
								<label class="col-md-8 control-label">Alamat</label>
								<div class="col-md-12">
									<input type="textarea" name="Alamat" class="form-control" id="inputAlamat" placeholder="Alamat" required autofocus>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-10 offset-1">
							<div class="form-group">
								<label class="col-md-3 control-label">Email</label>
								<div class="col-md-12">
									<input type="email" name="Email" class="form-control" id="inputEmail" placeholder="Email" required autofocus>
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
							<button type="submit" name="submit" class="btn btn-block btn-success">Daftar</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

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
						<label class="col-md-5 offset-1 control-label">Nama</label>
						&nbsp;&nbsp;&nbsp;
						<label class="col-md-5 control-label">Jenis Kelamin</label>
					</div>
					<div class="row">
						<input type="text" name="Nama" class="form-control col-md-5 offset-1" id="inputNama" placeholder="Nama" required autofocus>
						&nbsp;&nbsp;&nbsp;
						<select class="form-control col-md-5" name="JK" required>
					        <option value="Laki-Laki" selected>Laki-Laki</option>
					        <option value="Perempuan">Perempuan</option>
					    </select>
					</div>
					<br>

					<div class="row">
						<label class="col-md-5 offset-1 control-label">Tempat Lahir</label>
						&nbsp;&nbsp;&nbsp;
						<label class="col-md-5 control-label">Tanggal Lahir</label>
					</div>
					<div class="row">
						<input type="text" name="Tempat" class="form-control col-md-5 offset-1" placeholder="Tempat Lahir" required autofocus>
						&nbsp;&nbsp;&nbsp;
						<input type="date" name="Tanggal" class="form-control col-md-5" required autofocus>
					</div>
					<br>

					<div class="row">
						<label class="col-md-5 offset-1 control-label">No KTP</label>
						&nbsp;&nbsp;&nbsp;
						<label class="col-md-5 control-label">No HP</label>
					</div>
					<div class="row">
						<input type="text" name="KTP" class="form-control col-md-5 offset-1" placeholder="Nomor KTP" required autofocus>
						&nbsp;&nbsp;&nbsp;
						<input type="text" name="HP" class="form-control col-md-5" placeholder="Nomor HP" required autofocus>
					</div>
					<br>

					<div class="row">
						<label class="col-md-5 offset-1 control-label">Alamat</label>
					</div>
					<div class="row">
						<input type="textarea" name="Alamat" class="form-control col-md-10 offset-1" placeholder="Alamat" required autofocus>
					</div>
					<br>

					<div class="row">
						<label class="col-md-5 offset-1 control-label">Email</label>
						&nbsp;&nbsp;&nbsp;
						<label class="col-md-5 control-label">Password</label>
					</div>
					<div class="row">
						<input type="email" name="Email" class="form-control col-md-5 offset-1" placeholder="Email" required autofocus>
						&nbsp;&nbsp;&nbsp;
						<input type="password" name="Pass" class="form-control col-md-5" placeholder="Password" autofocus>
					</div>
					<br>

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
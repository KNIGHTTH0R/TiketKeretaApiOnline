<div class="container">  

  <br>
  <h1>Edit Profil User</h1>
  <hr>

  <a href="<?php echo base_url() .'utama/profil'; ?>"><button class="btn btn-primary col-md-4">Kembali</button></a>
  <br>

  <br>
  <br>
  <br>
  <div class="container">
    <div class="col-md-10 offset-1">
      <div class="jumbotron">

        <form method="post" action="<?php echo site_url('Utama/prosesEditProfil'); ?>">

          <input type="hidden" name="id_akun" value="<?php echo $id_akun; ?>">
          
          <br>
          <div class="row">
            <div class="col-md-10 offset-1">
              <div class="form-group">
                <label class="col-md-3 control-label">Nama</label>
                <div class="col-md-12">
                  <input type="text" name="Nama" class="form-control" id="inputNama" value="<?php echo $nama; ?>" required autofocus>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-10 offset-1">
              <div class="form-group">
                <label class="col-md-8 control-label">Jenis Kelamin</label>
                <div class="col-md-12">
                  <select class="form-control" name="JK">
                    <?php if ($jk == "Laki-Laki"){ ?>
                      <option value="Laki-Laki" selected>Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    <?php } else { ?>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan" selected>Perempuan</option>
                    <?php } ?>
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
                  <input type="text" name="Tempat" class="form-control" id="inputTempat" value="<?php echo $tempat; ?>" required>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-10 offset-1">
              <div class="form-group">
                <label class="col-md-8 control-label">Tanggal Lahir</label>
                <div class="col-md-12">
                  <input type="date" name="Tanggal" class="form-control" id="inputTanggal" value="<?php echo $tanggal; ?>" required>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-10 offset-1">
              <div class="form-group">
                <label class="col-md-3 control-label">No KTP</label>
                <div class="col-md-12">
                  <input type="text" name="KTP" class="form-control" id="inputKTP" value="<?php echo $noktp; ?>" required>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-10 offset-1">
              <div class="form-group">
                <label class="col-md-8 control-label">No HP</label>
                <div class="col-md-12">
                  <input type="text" name="HP" class="form-control" id="inputHP" value="<?php echo $nohp; ?>" required>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-10 offset-1">
              <div class="form-group">
                <label class="col-md-8 control-label">Alamat</label>
                <div class="col-md-12">
                  <input type="textarea" name="Alamat" class="form-control" id="inputAlamat" value="<?php echo $alamat; ?>" required>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-10 offset-1">
              <div class="form-group">
                <label class="col-md-3 control-label">Email</label>
                <div class="col-md-12">
                  <input type="email" name="Email" class="form-control" id="inputEmail" value="<?php echo $email; ?>" required>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-10 offset-1">
              <div class="form-group">
                <label class="col-md-3 control-label">Password</label>
                <div class="col-md-12">
                  <input type="password" name="Pass" class="form-control" id="inputPass" value="<?php echo $password; ?>">
                </div>
              </div>
            </div>
          </div>

          <br>
          <br>
          <div class="row">
            <div class="col-md-6 offset-3">
              <button type="submit" name="submit" class="btn btn-block btn-success">Ganti</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

  <br>
  <br>
  <br>
  <br>
</div>
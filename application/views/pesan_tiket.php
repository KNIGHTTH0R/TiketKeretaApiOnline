<div class="container">  

  <br>
  <h1>Info Data Pemesanan</h1>
  <hr>
        <br>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Kelas</th>
                <th scope="col">Nama Kereta</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Tanggal Berangkat</th>
                <th scope="col">Tanggal Tiba</th>
                <th scope="col">Jam Berangkat</th>
                <th scope="col">Jam Tiba</th>
                <th scope="col">Durasi</th>
                <th scope="col">Harga Dewasa</th>
                <th scope="col">Harga Anak</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($jadwal as $key) : 
                if ($key['id_kelas'] == $id_kelas){ ?>
                <?php 
                  $total = $dewasa * $key['harga_dewasa'] + $anak * $key['harga_anak'];
                 ?>
                  <tr>
                    <td><?php echo $key['nama_kelas'] ?></td>
                    <td><?php echo $key['nama_kereta'] ?></td>
                    <td><?php echo $key['stasiun_awal'] ?> - <?php echo $key['stasiun_akhir'] ?></td>
                    <td><?php echo $key['tanggal_berangkat'] ?></td>
                    <td><?php echo $key['tanggal_tiba'] ?></td>
                    <td><?php echo $key['jam_berangkat'] ?></td>
                    <td><?php echo $key['jam_tiba'] ?></td>
                    <td><?php echo $key['durasi'] ?></td>
                    <td><?php echo $key['harga_dewasa'] ?></td>
                    <td><?php echo $key['harga_anak'] ?></td>
                  </tr>
              <?php } endforeach; ?>
            <tbody>
          </table>
  
  <br>
  <br>
    <div class="row">
      <div class="col-md-8 offset-2">
        <div class="jumbotron">
          <form method="post" action="<?php echo site_url('Utama/prosesPembayaran'); ?>">

            <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
            <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>">
            <input type="hidden" name="dewasa" value="<?php echo $dewasa; ?>">
            <input type="hidden" name="anak" value="<?php echo $anak; ?>">
            <input type="hidden" name="total" value="<?php echo $total; ?>">
          
            <label class="col-md-3 control-label">Data Pemesan</label>

            <?php if($title == "0") { ?>
              
              <br>
              <br>
              <div class="row">
                <label class="col-md-5 offset-1 control-label">Nama</label>
              </div>
              <div class="row">
                <input type="text" name="Nama" class="form-control col-md-10 offset-1" id="inputNama" placeholder="Nama" required>
              </div>
              <br>

              <div class="row">
                <label class="col-md-5 offset-1 control-label">Email</label>
                &nbsp;&nbsp;&nbsp;
                <label class="col-md-5 control-label">No HP</label>
              </div>
              <div class="row">
                <input type="email" name="Email" class="form-control col-md-5 offset-1" id="inputEmail" placeholder="Email" required>
                &nbsp;&nbsp;&nbsp;
                <input type="text" name="HP" class="form-control col-md-5" id="inputHP" placeholder="Nomor HP" required>
              </div>
              <br>

              <div class="row">
                <label class="col-md-5 offset-1 control-label">Alamat</label>
              </div>
              <div class="row">
                <input type="textarea" name="Alamat" class="form-control col-md-10 offset-1" id="inputAlamat" placeholder="Alamat" required>
              </div>

            <?php } else { ?>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Nama</label>
                    <label class="col-md-3 control-label"><?php echo $akun->nama; ?></label>
                    <input type="hidden" name="id_akun" value="<?php echo $akun->id_akun; ?>">
                    <input type="hidden" name="Nama" value="<?php echo $akun->nama; ?>">
                  </div>
                </div>
              </div>
            
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Email</label>
                    <label class="col-md-3 control-label"><?php echo $akun->email; ?></label>
                    <input type="hidden" name="Email" value="<?php echo $akun->email; ?>">
                  </div>
                </div>
              </div>
            
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-md-3 control-label">No HP</label>
                    <label class="col-md-3 control-label"><?php echo $akun->nohp; ?></label>
                    <input type="hidden" name="HP" value="<?php echo $akun->nohp; ?>">
                  </div>
                </div>
              </div>
            
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Alamat</label>
                    <label class="col-md-3 control-label"><?php echo $akun->alamat; ?></label>
                    <input type="hidden" name="Alamat" value="<?php echo $akun->alamat; ?>">
                  </div>
                </div>
              </div>
            <?php } ?>
            
            <br>
            <br>
            <label class="col-md-3 control-label">Data Penumpang</label>
            <br>
            <br>
            <label class="col-md-3 control-label">Data Dewasa</label>
            <?php for($i = 0; $i < $dewasa; $i++){ ?>
              <p><?php $j = $i+1; echo $j; ?></p>
              <div class="row">
                <label class="col-md-5 offset-1 control-label">Nama</label>
              </div>
              <div class="row">
                <input type="text" name="NamaDew_<?php echo $i; ?>" class="form-control col-md-10 offset-1" placeholder="Nama" required>
              </div>
              <br>

              <div class="row">
                <label class="col-md-5 offset-1 control-label">No KTP</label>
                &nbsp;&nbsp;&nbsp;
                <label class="col-md-5 control-label">Jenis Kelamin</label>
              </div>
              <div class="row">
                <input type="text" name="NoKTP_<?php echo $i; ?>" class="form-control col-md-5 offset-1" placeholder="No KTP" required>
                &nbsp;&nbsp;&nbsp;
                <select class="form-control col-md-5" name="JKDew_<?php echo $i; ?>" required>
                  <option value="Laki-Laki" selected>Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <br>
            <?php } ?>

            <br>
            <?php if($anak > 0){ ?>
              <label class="col-md-3 control-label">Data Anak</label>
              <?php for($i = 0; $i < $anak; $i++){ ?>
                <p><?php $j = $i+1; echo $j; ?></p>
                <div class="row">
                  <label class="col-md-5 offset-1 control-label">Nama</label>
                </div>
                <div class="row">
                  <input type="text" name="NamaAn_<?php echo $i; ?>" class="form-control col-md-10 offset-1" placeholder="Nama" required>
                </div>
                <br>

                <div class="row">
                  <label class="col-md-5 offset-1 control-label">Nama</label>
                  &nbsp;&nbsp;&nbsp;
                  <label class="col-md-5 control-label">Jenis Kelamin</label>
                </div>
                <div class="row">
                  <input type="text" name="NamaAn_<?php echo $i; ?>" class="form-control col-md-5 offset-1" placeholder="Nama" required>
                  &nbsp;&nbsp;&nbsp;
                  <select class="form-control col-md-5" name="JKAn_<?php echo $i; ?>" required>
                    <option value="Laki-Laki" selected>Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <br>
              <?php } ?>
            <?php } ?>
            
            <br>
            <div class="row" align="center">
              <div class="col-md-12">
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-success col-md-6">Pembayaran</button>
                </div>
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
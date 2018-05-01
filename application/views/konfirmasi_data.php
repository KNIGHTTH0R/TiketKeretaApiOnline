<div class="container">  

  <br>
  <h1>Info Data Pemesanan</h1>
  <hr>

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
                <th scope="col">Total Harga</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($jadwal as $key) : 
                if ($key['id_kelas'] == $id_kelas){ ?>
                  <?php $total = $key['harga_dewasa'] * $dewasa + $key['harga_anak'] * $anak; ?>
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
                    <td><?php echo $total ?></td>
                  </tr>
              <?php } endforeach; ?>
            <tbody>
          </table>
  
  <br>
    <div class="row">
      <div class="col-md-8 offset-2">
        <div class="jumbotron">
          <form method="post" action="<?php echo site_url('Utama/beranda'); ?>">

            <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
            <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>">
            <input type="hidden" name="dewasa" value="<?php echo $dewasa; ?>">
            <input type="hidden" name="anak" value="<?php echo $anak; ?>">
            <!--<input type="hidden" name="total" value="<?php echo $total; ?>"> -->
          
            <label class="col-md-3 control-label">Data Pemesan</label>
            <?php foreach ($data_pemesan as $key) : ?>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Nama</label>
                    <div class="col-md-12">
                      <input type="text" name="Nama" class="form-control" id="inputNama" value="<?php echo $key['nama']; ?>">
                    </div>
                  </div>
                </div>
              </div>
            
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Email</label>
                    <div class="col-md-12">
                      <input type="email" name="Email" class="form-control" id="inputEmail" value="<?php echo $key['email']; ?>">
                    </div>
                  </div>
                </div>
              </div>
            
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-md-5 control-label">No HP</label>
                    <div class="col-md-12">
                      <input type="text" name="HP" class="form-control" id="inputHP" value="<?php echo $key['nohp']; ?>">
                    </div>
                  </div>
                </div>
              </div>
            
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-md-5 control-label">Alamat</label>
                    <div class="col-md-6">
                      <input type="textarea" name="Alamat" class="form-control" id="inputAlamat" value="<?php echo $key['alamat']; ?>">
                    </div>
                  </div>
                </div>
              </div>

            <?php endforeach; ?>
            
            <br>
            <br>
            <label class="col-md-3 control-label">Data Penumpang</label>
            <br>
            <label class="col-md-3 control-label">Data Dewasa</label>
            <?php foreach ($data_pesanan as $row) : ?>

              <?php $i = 0; foreach ($data_tiket as $row2) : ?>
                <?php if ($row2['noktp'] != "anak"){ ?>
                  <p><?php $i++; echo $i; ?></p>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-md-3 control-label">Nama</label>
                        <div class="col-md-12">
                          <input type="text" name="NamaDew_<?php echo $i; ?>" class="form-control" value="<?php echo $row2['nama']; ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-md-3 control-label">No KTP</label>
                        <div class="col-md-12">
                          <input type="text" name="NoKTP_<?php echo $i; ?>" class="form-control" value=" <?php echo $row2['noktp']; ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-md-3 control-label">Jenis Kelamin</label>
                        <div class="col-md-12">
                          <select class="form-control" name="JKDew_<?php echo $i; ?>">
                            <?php if ($row2['jk'] == "Laki-Laki"){ ?>
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
                  <br>
                <?php } ?>

              <?php endforeach; ?>
              
              <br>
              <?php if($row['tiket_anak'] > 0){ ?>
                <label class="col-md-3 control-label">Data Anak</label>
                <?php $i = 0; foreach ($data_tiket as $row2) : ?>
                  <?php if ($row2['noktp'] == "anak"){ ?>
                        <p><?php echo $i++; ?></p>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="col-md-3 control-label">Nama</label>
                              <div class="col-md-12">
                                <input type="text" name="NamaAn_<?php echo $i; ?>" class="form-control" value="<?php echo $row2['nama']; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="col-md-3 control-label">Jenis Kelamin</label>
                              <div class="col-md-12">
                                <select class="form-control" name="JKAn_<?php echo $i; ?>">
                                  <?php if ($row2['jk'] == "Laki-Laki"){ ?>
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
                        <br>
                <?php } ?>
              <br>

              <?php endforeach; ?>
              <?php } ?>

            <?php endforeach; ?>

            <label class="col-md-10 control-label">Metode Pembayaran : <?php echo $metode; ?></label>
            
            <br>
            <br>
            <br>
            <div class="row" align="center">
              <div class="col-md-12">
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-success col-md-6">Konfirmasi</button>
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
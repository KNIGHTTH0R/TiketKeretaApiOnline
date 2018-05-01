<div class="container"> 

  <br>
  <h1>Tiket Pesanan</h1>

  <hr>
      <?php if ($ada == "0"){ ?>
      
      <?php if ($stat == "1"){ ?>
        <div class="row">
          <?php $i = 0; foreach ($data as $key) : ?>
                
                <?php if($key['status_pembatalan'] == 0){ ?>
                  <div class="card text-white bg-primary mb-3" style="width: 1200px;">
                    <div class="card-header"><?php $i++; echo $i; ?>. ID Booking &nbsp; : &nbsp; <?php echo $key['id_pesanan'] ?> , &nbsp;&nbsp; Tanggal Pemesanan &nbsp; : &nbsp; <?php echo $key['tanggal_pesan'] ?></div>
                    <div class="card-body">
                      <h4 class="card-title">
                        Kelas &nbsp; : &nbsp; <?php echo $key['nama_kelas'] ?> , &nbsp;&nbsp;
                        Nama Kereta &nbsp; : &nbsp; <?php echo $key['nama_kereta'] ?>
                      </h4>
                      <div class="row">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="col-md-4">
                          <p class="card-text">Nama Pemesan : <?php echo $key['nama'] ?></p>
                          <p class="card-text">Email : <?php echo $key['email'] ?></p>
                          <p class="card-text">No HP : <?php echo $key['nohp'] ?></p>
                          <p class="card-text">Alamat : <?php echo $key['alamat'] ?></p>
                          <p class="card-text"></p>
                          <p class="card-text"></p>
                        </div>
                        <div class="col-md-4">
                          <p class="card-text">Jurusan : <?php echo $key['stasiun_awal'] ?> - <?php echo $key['stasiun_akhir'] ?></p>
                          <p class="card-text">Tanggal Berangkat : <?php echo $key['tanggal_berangkat'] ?></p>
                          <p class="card-text">Tanggal Tiba : <?php echo $key['tanggal_tiba'] ?></p>
                          <p class="card-text">Jam Berangkat : <?php echo $key['jam_berangkat'] ?></p>
                          <p class="card-text">Jam Tiba : <?php echo $key['jam_tiba'] ?></p>
                          <p class="card-text">Durasi : <?php echo $key['durasi'] ?></p>
                        </div>
                        <div class="col-md-3">
                          <p class="card-text">Jumlah Tiket Dewasa : <?php echo $key['tiket_dewasa'] ?></p>
                          <p class="card-text">Jumlah Tiket Anak : <?php echo $key['tiket_anak'] ?></p>
                          <p class="card-text">Total Harga : Rp. <?php echo $key['total'] ?></p>
                          <p class="card-text">Metode Bayar : <?php echo $key['metode_bayar'] ?></p>
                          <p class="card-text">Kode Bayar : <?php echo $key['kode_bayar'] ?></p>
                          <p class="card-text"></p>
                        </div>
                      </div>
                      <br>
                      <div>
                        <h4 class="card-title">Data Penumpang</h4>
                      </div>
                      <div>
                        <?php foreach ($data_tiket as $row) : ?>
                          <?php if ($row['noktp'] != "anak"){ ?>
                            <div class="row">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <div class="col-md-4">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p class="card-text">Dewasa</p>
                                <p class="card-text">ID Tiket : <?php echo $row['id_tiket'] ?></p>
                                <p class="card-text">Nama : <?php echo $row['nama'] ?></p>
                              </div>
                              <div class="col-md-4">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p class="card-text">&nbsp;</p>
                                <p class="card-text">Nomor Gerbong : <?php echo $row['nama_gerbong'] ?></p>
                                <p class="card-text">No KTP : <?php echo $row['noktp'] ?></p>
                              </div>
                              <div class="col-md-3">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p class="card-text">&nbsp;</p>
                                <p class="card-text">Nomor Kursi : <?php echo $row['nama_kursi'] ?></p>
                                <p class="card-text">Jenis Kelamin : <?php echo $row['jk'] ?></p>
                              </div>
                            </div>
                          <?php } ?>
                        <?php endforeach; ?>
                        <?php foreach ($data_tiket as $row) : ?>
                          <?php if ($row['noktp'] == "anak"){ ?>
                            <div class="row">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <div class="col-md-4">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p class="card-text">Anak</p>
                                <p class="card-text">ID Tiket : <?php echo $row['id_tiket'] ?></p>
                                <p class="card-text">Nama : <?php echo $row['nama'] ?></p>
                              </div>
                              <div class="col-md-4">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p class="card-text">&nbsp;</p>
                                <p class="card-text">Nomor Gerbong : <?php echo $row['nama_gerbong'] ?></p>
                                <p class="card-text">Jenis Kelamin : <?php echo $row['jk'] ?></p>
                              </div>
                              <div class="col-md-3">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p class="card-text">&nbsp;</p>
                                <p class="card-text">Nomor Kursi : <?php echo $row['nama_kursi'] ?></p>
                                <p class="card-text">&nbsp;</p>
                              </div>
                            </div>
                          <?php } ?>
                        <?php endforeach; ?>
                      </div>
                      <br>
                      <br>
                      <div align="center">
                        <h4 class="card-text">Silahkan menukarkan tiket di stasiun keberangkatan.</h4>
                      </div>
                      <div align="center">
                        <br>
                        <?php if ($key['status_bayar'] == 1){ ?>
                          <a href="<?php echo site_url('Utama/cetak/'.$key['id_pesanan']); ?>"><span class="btn btn-outline-light col-md-6">Print Tiket</span></a>
                        <?php } else { ?>
                          <p class="card-text">Pesanan Belum Dikonfirmasi</p>
                        <?php } ?>
                      </div>
                      <div align="center">
                        <br>
                        <?php if ($key['status_pembatalan'] == 0){ ?>
                          <a href="<?php echo site_url('Utama/prosesPembatalanUser/'.$key['id_pesanan']); ?>"><span class="btn btn-outline-light col-md-6">Batalkan Pesanan</span></a>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                <?php } ?>

          <?php endforeach; ?>
        </div>
      <?php } ?>
      
      <?php } else { ?>
        <br>
        <br>
        <br>
        <h3 align="center">Pesanan Dengan ID : <?php echo $id_pesanan; ?></h3>
        <h3 align="center">Tidak Ditemukan</h3>
      <?php } ?>
  
  <br>
  <br>
</div>
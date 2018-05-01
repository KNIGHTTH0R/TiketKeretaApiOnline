<div class="container"> 

  <br>
  <h1>Pemesanan Tiket</h1>

  <hr>

        <div class="row">
          <?php $i = 0; foreach ($data as $key) : ?>

                <div class="card text-white bg-primary mb-3" style="width: 1200px;">
                  <div class="card-header"><?php $i++; echo $i; ?>. Kelas &nbsp; : &nbsp; <?php echo $key['nama_kelas'] ?></div>
                  <div class="card-body">
                    <h4 class="card-title">Nama Kereta &nbsp; : &nbsp; <?php echo $key['nama_kereta'] ?> , &nbsp;&nbsp; Tanggal Pemesanan &nbsp; : &nbsp; <?php echo $key['tanggal_pesan'] ?></h4>
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
                    <div align="center">
                      <?php if ($key['status_bayar'] == 0 && $key['status_pembatalan'] == 0){ ?>
                        <br>
                        <a href="<?php echo site_url('Utama/prosesKonfirmasi/'.$key['id_pesanan']); ?>"><span class="btn btn-outline-light col-md-6">Konfirmasi Pembayaran</span></a>
                      <?php } else if ($key['status_pembatalan'] == 0) { ?>
                        <br>
                        <p class="card-text">Pembayaran Sudah Di Konfirmasi</p>
                      <?php } ?>
                    </div>
                    <div align="center">
                      <br>
                      <?php if ($key['status_pembatalan'] == 0){ ?>
                        <a href="<?php echo site_url('Utama/prosesPembatalan/'.$key['id_pesanan']); ?>"><span class="btn btn-outline-light col-md-6">Batalkan Pesanan</span></a>
                      <?php } else { ?>
                        <p class="card-text">Pesanan Sudah Dibatalkan</p>
                      <?php } ?>
                    </div>
                  </div>
                </div>

          <?php endforeach; ?>
        </div>
  
  <br>
  <br>
</div>
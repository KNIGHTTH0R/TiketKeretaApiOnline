<div class="container">  

  <br>
  <h1>Pembayaran</h1>
  <hr>

  <?php if($input_metode == "0"){ ?>
    <br>
    <br>
    <br>
    <div class="container">
      <div class="card text-white bg-warning mb-3 offset-3" style="width: 500px;">
        <div class="card-body">
          <form method="post" action="<?php echo site_url('Utama/pembayaran'); ?>">

            <input type="hidden" name="id_pemesan" value="<?php echo $id_pemesan; ?>">
            <input type="hidden" name="id_pesanan" value="<?php echo $id_pesanan; ?>">

            <br>
            <h4 class="card-title" align="center">Pilih Metode Pembayaran</h4>
            <br>
            <select class="form-control col-md-10 offset-1" name="Metode" required>
              <option value="Transfer BANK">Transfer BANK</option>
              <option value="Minimarket">Minimarket</option>
            </select>
            <br>
            <br>
            <button type="submit" class="btn btn-outline-light col-md-10 offset-1">Bayar</button>
            <br>
            <br>
          </form>
        </div>
      </div>

    </div>
  <?php } else { ?>
    <br>
    <br>
    <br>
    <div class="container">
      <div class="card text-white bg-warning mb-3 offset-3" style="width: 500px;">
        <div class="card-body">
          <form method="post" action="<?php echo site_url('Utama/konfirmasi'); ?>">

            <input type="hidden" name="id_pemesan" value="<?php echo $id_pemesan; ?>">
            <input type="hidden" name="id_pesanan" value="<?php echo $id_pesanan; ?>">

            <br>
            <br>
            <h4 class="card-title col-md-10 offset-1">Metode Pembayaran</h4>
            <p class="card-title col-md-10 offset-1"><?php echo $metode_bayar; ?></p>
            <br>
            <h4 class="card-title col-md-10 offset-1">Dengan ID Booking</h4>
            <p class="card-title col-md-10 offset-1"><?php echo $id_pesanan; ?></p>
            <br>
            <?php if ($metode_bayar == "Transfer BANK"){ ?>
              <h4 class="card-title col-md-10 offset-1">Nomor Rekening</h4>
            <?php } else { ?>
              <h4 class="card-title col-md-10 offset-1">Kode Pembayaran</h4>
            <?php } ?>
            <p class="card-title col-md-10 offset-1"><?php echo $kode; ?></p>
            <br>
            <p class="card-title col-md-10 offset-1">Simpan Data Diatas Untuk Memudahkan Dalam Pencarian Pemesanan.</p>
            <p class="card-title col-md-10 offset-1">Lakukan Pembayaran Dalam 24 Jam. Jika Melebihi Waktu, Tiket Akan Hangus.</p>
            <br>
            <br>
            <button type="submit" class="btn btn-outline-light col-md-10 offset-1">OK</button>
            <br>
            <br>
          </form>
        </div>
      </div>

    </div>
  <?php } ?>
  
  <br>
  <br>
</div>
<div class="container">  

  <br>
  <h1>Beranda</h1>
  <hr>

<div class="row">
  <br>
    <div class="col-md-4">
      <div class="jumbotron">

          <form method="post" action="<?php echo site_url('Utama/pesanan'); ?>">
            
            <div class="row">
              <label class="col-md-6 control-label">Cari Pesanan</label>
            </div>
            <div class="row">
              <input type="text" name="id_pesanan" class="form-control col-md-6" placeholder="ID Booking" required>
              &nbsp;&nbsp;
              <button type="submit" name="submit" class="btn btn-success col-md-4">Cari</button>
            </div>

          </form>

      </div>
    </div>
  
  <br>
    <div class="col-md-8">
      <div class="jumbotron">
        <div class="row">
        <label class="col-md-3 offset-1 control-label">Cari Tiket</label>
        <br>
        <br>

          <form method="post" action="<?php echo site_url('Utama/prosesCariTiket'); ?>">

            <div class="row">
              <label class="col-md-5 offset-1 control-label">Stasiun Berangkat</label>
              &nbsp;&nbsp;&nbsp;
              <label class="col-md-5 control-label">Stasiun Tiba</label>
            </div>
            <div class="row">
              <select class="custom-control custom-select col-md-5 offset-1" name="StasiunAwal" required>
                <?php foreach ($data as $key) : ?>
                  <option value="<?php echo $key['id_stasiun'] ?>"><?php echo $key['nama_stasiun'] ?></option>
                <?php endforeach; ?>
              </select>
              &nbsp;&nbsp;&nbsp;
              <select class="custom-control custom-select col-md-5" name="StasiunAkhir" required>
                <?php foreach ($data as $key) : ?>
                  <option value="<?php echo $key['id_stasiun'] ?>"><?php echo $key['nama_stasiun'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            
            <br>
            <div class="row offset-2">
              <label class="col-md-5 offset-1 control-label">Tanggal Berangkat</label>
            </div>  
            <div class="row offset-2">
              <input type="date" name="TanggalB" class="form-control col-md-5 offset-1" id="inputTanggal" required>
            </div>
            <br>

            <div class="row offset-2">
              <label class="col-md-5 offset-1 control-label">Jumlah Tiket (Diatas 3 Tahun)</label>
              &nbsp;&nbsp;&nbsp;
              <label class="col-md-5 control-label">Jumlah Tiket Bayi (Dibawah 3 Tahun)</label>
            </div>
            <div class="row offset-2">
              <select class="custom-control custom-select col-md-5 offset-1" name="JumDew" required>
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
              &nbsp;&nbsp;&nbsp;
              <select class="custom-control custom-select col-md-5" name="JumBay" required>
                <option value="0" selected>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
            
            <br>
            <br>
            <div class="row" align="center">
              <div class="col-md-12">
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-success col-md-6 offset-3">Cari Tiket</button>
                </div>
              </div>
            </div>

          </form>

        </div>

      </div>
    </div>
  </div>

  <?php if ($cari == '1'){ ?>
        <br>

        <br>
        <h4>Sorting Daftar</h4>

          <form method="post" action="<?php echo site_url('Utama/prosesCariTiket'); ?>">

            <input type="hidden" name="StasiunAwal" value="<?php echo $stasAwal; ?>">
            <input type="hidden" name="StasiunAkhir" value="<?php echo $stasAkhir; ?>">
            <input type="hidden" name="JumDew" value="<?php echo $tiket_dewasa; ?>">
            <input type="hidden" name="JumBay" value="<?php echo $tiket_anak; ?>">

            <div class="row">
              &nbsp;
              &nbsp;
              &nbsp;
              <select class="form-control col-md-3" name="sort" required>
                <?php if ($sort == "Harga") { ?>
                  <option value="Jenis">Kelas Kereta</option>
                  <option value="Harga" selected>Harga Tiket</option>
                <?php } else { ?>
                  <option value="Kelas" selected>Kelas Kereta</option>
                  <option value="Harga">Harga Tiket</option>
                <?php } ?>
              </select>
              &nbsp;
              &nbsp;
              &nbsp;
              <select class="form-control col-md-2" name="ad" required>
                <?php if ($type == "DESC") { ?>
                  <option value="ASC">Ascending</option>
                  <option value="DESC" selected>Descending</option>
                <?php } else { ?>
                  <option value="ASC" selected>Ascending</option>
                  <option value="DESC">Descending</option>
                <?php } ?>
              </select>
              &nbsp;
              &nbsp;
              &nbsp;
              <button type="submit" name="submit" class="btn btn-success col-md-2">Sorting</button>
            </div>
          </form>

        <br>

        <br>
        <?php if ($status == '1'){ ?>
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
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($kereta as $key) : ?>
              <form method="post" action="<?php echo site_url('Utama/pesan'); ?>">
                <?php 
                  $total = $tiket_dewasa * $key['harga_dewasa'] + $tiket_anak * $key['harga_anak'];
                 ?>
                  <input type="hidden" name="id_jadwal" value="<?php echo $key['id_jadwal']; ?>">
                  <input type="hidden" name="id_kelas" value="<?php echo $key['id_kelas']; ?>">
                  <input type="hidden" name="Dewasa" value="<?php echo $tiket_dewasa; ?>">
                  <input type="hidden" name="Anak" value="<?php echo $tiket_anak; ?>">
                  <tr>
                    <td><?php echo $key['nama_kelas'] ?></td>
                    <td><?php echo $key['nama_kereta'] ?></td>
                    <td><?php echo $key['stasiun_awal'] ?> - <?php echo $key['stasiun_akhir'] ?></td>
                    <td><?php echo $key['tanggal_berangkat'] ?></td>
                    <td><?php echo $key['tanggal_tiba'] ?></td>
                    <td><?php echo $key['jam_berangkat'] ?></td>
                    <td><?php echo $key['jam_tiba'] ?></td>
                    <td><?php echo $key['durasi'] ?> jam</td>
                    <td><?php echo $key['harga_dewasa'] ?></td>
                    <td><?php echo $key['harga_anak'] ?></td>
                    <td><button type="submit" name="submit" class="btn btn-block btn-success">Pesan</button></td>
                  </tr>
              </form>
            <?php endforeach; ?>
            <tbody>
          </table>
        <?php } else { ?>
          <h1 align="center">Jadwal Kereta Tidak Ditemukan</h1>
        <?php } ?>
  <?php } ?>

  <br>
  <br>
  <br>
  <br>
</div>
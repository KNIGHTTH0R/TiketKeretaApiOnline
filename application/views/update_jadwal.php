<div class="container">

  <br>  
  <h1>Update Jadwal</h1>
  <hr>

  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-2">
        <div class="jumbotron">

          <form method="post" action="<?php echo site_url('Utama/prosesUpdateJadwal'); ?>">

            <input type="hidden" name="Id" class="form-control" value="<?php echo $jadwal->id_jadwal; ?>" id="inputId" required>

            <div class="row">
              <label class="col-md-5 offset-1 control-label">Nama Kereta</label>
            </div>

            <div class="row">
              <select class="form-control col-md-10 offset-1" name="Nama" required>
                  <option value="<?php echo $jadwal->nama_kereta; ?>"><?php echo $jadwal->nama_kereta; ?></option>
                <?php foreach ($data as $key) : 
                  if ($key['id_kereta'] != $jadwal->id_kereta){ ?>
                    <option value="<?php echo $key['nama_kereta'] ?>"><?php echo $key['nama_kereta'] ?></option>
                <?php } endforeach; ?>
              </select>
            </div>
            <br>

            <div class="row">
              <label class="col-md-5 offset-1 control-label">Tanggal Berangkat</label>
              &nbsp;&nbsp;&nbsp;
              <label class="col-md-5 control-label">Tanggal Tiba</label>
            </div>

            <div class="row">
              <input type="date" name="TanggalB" class="form-control col-md-5 offset-1" value="<?php echo $jadwal->tanggal_berangkat; ?>" id="inputTanggal" required>
              &nbsp;&nbsp;&nbsp;
              <input type="date" name="TanggalT" class="form-control col-md-5" value="<?php echo $jadwal->tanggal_tiba; ?>" id="inputTanggal" id="inputTanggal" required>
            </div>
            <br>

            <div class="row">
              <label class="col-md-5 offset-1 control-label">Jam Berangkat</label>
              &nbsp;&nbsp;&nbsp;
              <label class="col-md-5 control-label">Jam Tiba</label>
            </div>

            <div class="row">
              <input type="time" name="JamB" class="form-control col-md-5 offset-1" value="<?php echo $jadwal->jam_berangkat; ?>" id="inputTanggal" id="inputJam" required>
              &nbsp;&nbsp;&nbsp;
              <input type="time" name="JamT" class="form-control col-md-5" value="<?php echo $jadwal->jam_tiba; ?>" id="inputTanggal" id="inputJam" required>
            </div>
            <br>

            <div class="row">
              <label class="col-md-5 offset-1 control-label">Stasiun Berangkat</label>
              &nbsp;&nbsp;&nbsp;
              <label class="col-md-5 control-label">Stasiun Tiba</label>
            </div>

            <div class="row">
              <select class="form-control col-md-5 offset-1" name="StasAwal" required>
                <option value="<?php echo $jadwal->id_stasiun_awal; ?>"><?php echo $jadwal->stasiun_awal; ?></option>
                  <?php foreach ($data2 as $key) : 
                    if ($key['id_stasiun'] != $jadwal->id_stasiun_awal){ ?>
                      <option value="<?php echo $key['id_stasiun'] ?>"><?php echo $key['nama_stasiun'] ?></option>
                  <?php } endforeach; ?>
              </select>
              &nbsp;&nbsp;&nbsp;
              <select class="form-control col-md-5" name="StasAkhir" required>
                <option value="<?php echo $jadwal->id_stasiun_akhir; ?>"><?php echo $jadwal->stasiun_akhir; ?></option>
                  <?php foreach ($data2 as $key) : 
                    if ($key['id_stasiun'] != $jadwal->id_stasiun_akhir){ ?>
                      <option value="<?php echo $key['id_stasiun'] ?>"><?php echo $key['nama_stasiun'] ?></option>
                  <?php } endforeach; ?>
              </select>
            </div>
            <br>
            <br>

            <div class="row">
              <label class="col-md-5 offset-1 control-label">Data Harga Dewasa</label>
            </div>
            <br>

            <div class="row">
              <label class="col-md-5 offset-1 control-label">Ekonomi</label>
              &nbsp;&nbsp;&nbsp;
              <label class="col-md-5 control-label">Ekonomi AC</label>
            </div>

            <div class="row">
              <input type="number" name="Kelas_1" class="form-control col-md-5 offset-1" value="<?php echo $harga_1; ?>" required>
              &nbsp;&nbsp;&nbsp;
              <input type="number" name="Kelas_2" class="form-control col-md-5" value="<?php echo $harga_2; ?>" required>
            </div>
            <br>

            <div class="row">
              <label class="col-md-5 offset-1 control-label">Bisnis</label>
              &nbsp;&nbsp;&nbsp;
              <label class="col-md-5 control-label">Eksekutif</label>
            </div>

            <div class="row">
              <input type="number" name="Kelas_3" class="form-control col-md-5 offset-1" value="<?php echo $harga_3; ?>" required>
              &nbsp;&nbsp;&nbsp;
              <input type="number" name="Kelas_4" class="form-control col-md-5" value="<?php echo $harga_4; ?>" required>
            </div>
            <br>
            
            <br>
            <div class="row" align="center">
              <div class="col-md-12">
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-success col-md-6">Update Jadwal</button>
                </div>
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
</div>
<div class="container">  

  <br>
  <h1>Tambah Jadwal</h1>
  <hr>
  
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-2">
        <div class="jumbotron">

          <form method="post" action="<?php echo site_url('Utama/prosesInsertJadwal'); ?>">

            <div class="row">
              <label class="col-md-5 offset-1 control-label">Nama Kereta</label>
            </div>

            <div class="row">
              <select class="form-control col-md-10 offset-1" name="Id" required>
                <?php foreach ($data as $key) : ?>
                  <option value="<?php echo $key['id_kereta'] ?>"><?php echo $key['nama_kereta'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <br>

            <div class="row">
              <label class="col-md-5 offset-1 control-label">Tanggal Berangkat</label>
              &nbsp;&nbsp;&nbsp;
              <label class="col-md-5 control-label">Tanggal Tiba</label>
            </div>

            <div class="row">
              <input type="date" name="TanggalB" class="form-control col-md-5 offset-1" id="inputTanggal" required>
              &nbsp;&nbsp;&nbsp;
              <input type="date" name="TanggalT" class="form-control col-md-5" id="inputTanggal" required>
            </div>
            <br>

            <div class="row">
              <label class="col-md-5 offset-1 control-label">Jam Berangkat</label>
              &nbsp;&nbsp;&nbsp;
              <label class="col-md-5 control-label">Jam Tiba</label>
            </div>

            <div class="row">
              <input type="time" name="JamB" class="form-control col-md-5 offset-1" id="inputJam" required>
              &nbsp;&nbsp;&nbsp;
              <input type="time" name="JamT" class="form-control col-md-5" id="inputJam" required>
            </div>
            <br>

            <div class="row">
              <label class="col-md-5 offset-1 control-label">Stasiun Berangkat</label>
              &nbsp;&nbsp;&nbsp;
              <label class="col-md-5 control-label">Stasiun Tiba</label>
            </div>

            <div class="row">
              <select class="form-control col-md-5 offset-1" name="StasAwal" required>
                <?php foreach ($data2 as $key) : ?>
                  <option value="<?php echo $key['id_stasiun'] ?>"><?php echo $key['nama_stasiun'] ?></option>
                <?php endforeach; ?>
              </select>
              &nbsp;&nbsp;&nbsp;
              <select class="form-control col-md-5" name="StasAkhir" required>
                <?php foreach ($data2 as $key) : ?>
                  <option value="<?php echo $key['id_stasiun'] ?>"><?php echo $key['nama_stasiun'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <br>
            
            <br>
            <div class="row" align="center">
              <div class="col-md-12">
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-success col-md-6">Tambah Jadwal</button>
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
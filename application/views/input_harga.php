<div class="container">  

  <br>
  <h1>Masukkan Harga</h1>
  <hr>
  
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-2">
        <div class="jumbotron">

          <form method="post" action="<?php echo site_url('Utama/prosesInsertHarga'); ?>">
            
            <input type="hidden" name="id_jadwal" value="<?php echo $harga->id_jadwal; ?>">
            
            <?php $i = 0; foreach ($kelas as $key) : ?>
              
              <input type="hidden" name="id_kelas_<?php $i++; echo $i; ?>" value="<?php echo $key['id_kelas']; ?>">
              
              <label style="font-size: 18pt;" class="col-md-5 control-label"><?php echo $key['nama_kelas']; ?></label>
              <hr>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-md-5 control-label">Harga Dewasa</label>
                    <div class="col-md-12">
                      <input type="number" name="hd_<?php echo $i; ?>" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>

              <br>

            <?php endforeach; ?>
            
            <br>
            <div class="row" align="center">
              <div class="col-md-12">
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-success col-md-6">Submit</button>
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
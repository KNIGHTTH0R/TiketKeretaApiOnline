<div class="container">  

  <br>
  <h1>Profil User</h1>
  <hr>

  <a href="<?php echo base_url() .'utama/editProfil'; ?>"><button class="btn btn-primary col-md-3">Edit Profil</button></a>
  <br>
  <br>

  <div class="jumbotron col-md-10 offset-1">
    <div class="row offset-1">
      <label class="col-md-3 control-label">Nama</label>
      <label class="col-md-7 control-label"> : <?php echo $nama; ?></label>
    </div>
    <div class="row offset-1">
      <label class="col-md-3 control-label">Jenis Kelamin</label>
      <label class="col-md-7 control-label"> : <?php echo $jk; ?></label>
    </div>
    <div class="row offset-1">
      <label class="col-md-3 control-label">Tempat Lahir</label>
      <label class="col-md-7 control-label"> : <?php echo $tempat; ?></label>
    </div>
    <div class="row offset-1">
      <label class="col-md-3 control-label">Tanggal Lahir</label>
      <label class="col-md-7 control-label"> : <?php echo $tanggal; ?></label>
    </div>
    <div class="row offset-1">
      <label class="col-md-3 control-label">Nomor KTP</label>
      <label class="col-md-7 control-label"> : <?php echo $noktp; ?></label>
    </div>
    <div class="row offset-1">
      <label class="col-md-3 control-label">Nomor HP</label>
      <label class="col-md-7 control-label"> : <?php echo $nohp; ?></label>
    </div>
    <div class="row offset-1">
      <label class="col-md-3 control-label">Email</label>
      <label class="col-md-7 control-label"> : <?php echo $email; ?></label>
    </div>
    <div class="row offset-1">
      <label class="col-md-3 control-label">Alamat</label>
      <label class="col-md-7 control-label"> : <?php echo $alamat; ?></label>
    </div>
  
    <br>
  </div>

  <br>
  <br>
  <br>
  <br>
</div>
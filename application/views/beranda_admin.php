<div class="container"> 

  <br>
  <h1>Jadwal</h1>

  <hr>
  <button type="button" class="btn btn-primary"><a style="color: white;" href="<?php echo base_url() .'utama/tambahJadwal'; ?>">Tambah Jadwal</a></button>
  
  <br>
  <br>
  <br>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Nama Kereta</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Tanggal Berangkat</th>
        <th scope="col">Tanggal Tiba</th>
        <th scope="col">Jam Berangkat</th>
        <th scope="col">Jam Tiba</th>
        <th scope="col">Durasi</th>
        <th scope="col">Update</th>
        <th scope="col">Hapus</th>
      </tr>
    </thead>
    <tbody>
    	<?php foreach ($data as $key) : ?>
        <tr>
          <td><?php echo $key['nama_kereta'] ?></td>
          <td><?php echo $key['stasiun_awal'] ?> - <?php echo $key['stasiun_akhir'] ?></td>
          <td><?php echo $key['tanggal_berangkat'] ?></td>
          <td><?php echo $key['tanggal_tiba'] ?></td>
          <td><?php echo $key['jam_berangkat'] ?></td>
          <td><?php echo $key['jam_tiba'] ?></td>
          <td><?php echo $key['durasi'] ?> jam</td>
          <td><a href="<?php echo site_url('Utama/updateJadwal/'.$key['id_jadwal']); ?>"><span class="btn btn-outline-primary">Update</span></a></td>
          <?php if ($key['status_dipakai'] == 0){ ?>
            <td><a href="<?php echo site_url('Utama/deleteJadwal/'.$key['id_jadwal']); ?>"><span class="btn btn-outline-danger">Hapus</span></a></td>
          <?php } else { ?>
            <td>Tidak Bisa</td>
          <?php } ?>
        </tr>
      <?php endforeach; ?>
    <tbody>
  </table>
</div>
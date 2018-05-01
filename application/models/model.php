<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function GetAll(){

		$data = $this->db->get('akun');
		return $data->result_array();

	}

	public function GetAllAdmin(){

		$data = $this->db->get('admin');
		return $data->result_array();

	}

	public function GetAllJadwal(){

		$data = $this->db->query('SELECT id_jadwal, data_kereta.nama_kereta, data_jadwal.id_kereta, tanggal_berangkat, tanggal_tiba, jam_berangkat, jam_tiba, durasi, id_stasiun_awal, id_stasiun_akhir, data_stasiun.nama_stasiun as stasiun_awal, data_stasiun_akhir.nama_stasiun as stasiun_akhir, data_jadwal.status, status_dipakai
								FROM data_kereta, data_jadwal, data_stasiun, data_stasiun_akhir
								WHERE data_kereta.id_kereta = data_jadwal.id_kereta AND
									data_stasiun.id_stasiun = data_jadwal.id_stasiun_awal AND
									data_stasiun_akhir.id_stasiun = data_jadwal.id_stasiun_akhir');
		return $data->result_array();

	}

	public function GetAllPesananNotif(){

		$data = $this->db->query('SELECT id_pesanan, detail_pesanan.id_pemesan, data_pemesan.nama, data_pemesan.email, data_pemesan.nohp, data_pemesan.alamat, detail_pesanan.id_jadwal, data_jadwal.id_kereta, data_kereta.nama_kereta, data_jadwal.id_stasiun_awal, data_stasiun.nama_stasiun as stasiun_awal, data_jadwal.id_stasiun_akhir, data_stasiun_akhir.nama_stasiun as stasiun_akhir, tanggal_berangkat, tanggal_tiba, jam_berangkat, jam_tiba, durasi, detail_pesanan.id_kelas, data_kelas.nama_kelas, tiket_dewasa, tiket_anak, total, metode_bayar, kode_bayar, status_bayar, status_pembatalan, tanggal_pesan, notif, status_dipakai
								FROM detail_pesanan, data_kereta, data_jadwal, data_stasiun, data_stasiun_akhir, data_pemesan, data_kelas
								WHERE detail_pesanan.id_pemesan = data_pemesan.id_pemesan AND
									detail_pesanan.id_jadwal = data_jadwal.id_jadwal AND
									detail_pesanan.id_kelas = data_kelas.id_kelas AND
									data_kereta.id_kereta = data_jadwal.id_kereta AND
									data_stasiun.id_stasiun = data_jadwal.id_stasiun_awal AND
									data_stasiun_akhir.id_stasiun = data_jadwal.id_stasiun_akhir AND
									detail_pesanan.notif = 0');

		return $data->result_array();

	}

	public function GetAllPemesan(){

		$data = $this->db->query('SELECT id_pesanan, detail_pesanan.id_pemesan, data_pemesan.nama, data_pemesan.email, data_pemesan.nohp, data_pemesan.alamat, detail_pesanan.id_jadwal, data_jadwal.id_kereta, data_kereta.nama_kereta, data_jadwal.id_stasiun_awal, data_stasiun.nama_stasiun as stasiun_awal, data_jadwal.id_stasiun_akhir, data_stasiun_akhir.nama_stasiun as stasiun_akhir, tanggal_berangkat, tanggal_tiba, jam_berangkat, jam_tiba, durasi, detail_pesanan.id_kelas, data_kelas.nama_kelas, tiket_dewasa, tiket_anak, total, metode_bayar, kode_bayar, status_bayar, status_pembatalan, tanggal_pesan, notif, status_dipakai
								FROM detail_pesanan, data_kereta, data_jadwal, data_stasiun, data_stasiun_akhir, data_pemesan, data_kelas
								WHERE detail_pesanan.id_pemesan = data_pemesan.id_pemesan AND
									detail_pesanan.id_jadwal = data_jadwal.id_jadwal AND
									detail_pesanan.id_kelas = data_kelas.id_kelas AND
									data_kereta.id_kereta = data_jadwal.id_kereta AND
									data_stasiun.id_stasiun = data_jadwal.id_stasiun_awal AND
									data_stasiun_akhir.id_stasiun = data_jadwal.id_stasiun_akhir');

		return $data->result_array();

	}

	public function GetAllPemesanUser($id){

		$data = $this->db->query('SELECT id_pesanan, detail_pesanan.id_pemesan, data_pemesan.nama, data_pemesan.email, data_pemesan.nohp, data_pemesan.alamat, detail_pesanan.id_jadwal, data_jadwal.id_kereta, data_kereta.nama_kereta, data_jadwal.id_stasiun_awal, data_stasiun.nama_stasiun as stasiun_awal, data_jadwal.id_stasiun_akhir, data_stasiun_akhir.nama_stasiun as stasiun_akhir, tanggal_berangkat, tanggal_tiba, jam_berangkat, jam_tiba, durasi, detail_pesanan.id_kelas, data_kelas.nama_kelas, tiket_dewasa, tiket_anak, total, metode_bayar, kode_bayar, status_bayar, status_pembatalan, tanggal_pesan, notif, status_dipakai
								FROM detail_pesanan, data_kereta, data_jadwal, data_stasiun, data_stasiun_akhir, data_pemesan, data_kelas
								WHERE detail_pesanan.id_pemesan = data_pemesan.id_pemesan AND
									detail_pesanan.id_jadwal = data_jadwal.id_jadwal AND
									detail_pesanan.id_kelas = data_kelas.id_kelas AND
									data_kereta.id_kereta = data_jadwal.id_kereta AND
									data_stasiun.id_stasiun = data_jadwal.id_stasiun_awal AND
									data_stasiun_akhir.id_stasiun = data_jadwal.id_stasiun_akhir AND
									detail_pesanan.id_pemesan = ' . $id);

		return $data->result_array();

	}

	public function GetAllPesananUser($id){

		$data = $this->db->query('SELECT id_pesanan, detail_pesanan.id_pemesan, data_pemesan.nama, data_pemesan.email, data_pemesan.nohp, data_pemesan.alamat, detail_pesanan.id_jadwal, data_jadwal.id_kereta, data_kereta.nama_kereta, data_jadwal.id_stasiun_awal, data_stasiun.nama_stasiun as stasiun_awal, data_jadwal.id_stasiun_akhir, data_stasiun_akhir.nama_stasiun as stasiun_akhir, tanggal_berangkat, tanggal_tiba, jam_berangkat, jam_tiba, durasi, detail_pesanan.id_kelas, data_kelas.nama_kelas, tiket_dewasa, tiket_anak, total, metode_bayar, kode_bayar, status_bayar, status_pembatalan, tanggal_pesan, notif, status_dipakai
								FROM detail_pesanan, data_kereta, data_jadwal, data_stasiun, data_stasiun_akhir, data_pemesan, data_kelas
								WHERE detail_pesanan.id_pemesan = data_pemesan.id_pemesan AND
									detail_pesanan.id_jadwal = data_jadwal.id_jadwal AND
									detail_pesanan.id_kelas = data_kelas.id_kelas AND
									data_kereta.id_kereta = data_jadwal.id_kereta AND
									data_stasiun.id_stasiun = data_jadwal.id_stasiun_awal AND
									data_stasiun_akhir.id_stasiun = data_jadwal.id_stasiun_akhir AND
									detail_pesanan.id_pesanan = ' . $id);

		return $data->result_array();

	}

	public function GetAllStasiun(){

		$data = $this->db->get('data_stasiun');
		return $data->result_array();

	}

	public function GetAllKereta(){

		$data = $this->db->get('data_kereta');
		return $data->result_array();

	}

	public function GetAllKelas(){

		$data = $this->db->get('data_kelas');
		return $data->result_array();

	}

	public function SelectJadwalHarga(){

		$stat = 0;
		$this->db->select('id_jadwal');
		$this->db->select('status');
		$this->db->from('data_jadwal');
		$this->db->where('status', $stat);
		return $this->db->get();

	}

	public function selectJadwalPesan($id_jadwal){

		$data = $this->db->query('SELECT data_jadwal.id_jadwal, data_jadwal.id_kereta, data_kereta.nama_kereta, data_jadwal.id_stasiun_awal, data_jadwal.id_stasiun_akhir, data_stasiun.nama_stasiun as stasiun_awal, data_stasiun_akhir.nama_stasiun as stasiun_akhir, tanggal_berangkat, tanggal_tiba, jam_berangkat, jam_tiba, durasi, data_kelas.nama_kelas, data_harga.id_kelas, data_harga.harga_dewasa, data_harga.harga_anak, id_harga, status_dipakai
								FROM data_kereta, data_jadwal, data_stasiun, data_stasiun_akhir, data_harga, data_kelas
								WHERE data_kereta.id_kereta = data_jadwal.id_kereta AND
									data_stasiun.id_stasiun = data_jadwal.id_stasiun_awal AND
									data_stasiun_akhir.id_stasiun = data_jadwal.id_stasiun_akhir AND
									data_harga.id_jadwal = data_jadwal.id_jadwal AND
									data_kelas.id_kelas = data_harga.id_kelas
									AND data_jadwal.id_jadwal = ' . $id_jadwal);

		return $data->result_array();

	}

	public function selectPemesan($id_pemesan){

		$data = $this->db->query('SELECT * FROM data_pemesan WHERE id_pemesan = ' . $id_pemesan);

		return $data->result_array();

	}

	public function selectPesanan($id_pesanan){

		$data = $this->db->query('SELECT * FROM detail_pesanan WHERE id_pesanan = ' . $id_pesanan);

		return $data->result_array();

	}

	public function selectTiket($id_pesanan){

		$data = $this->db->query('SELECT * FROM data_tiket WHERE id_pesanan = ' . $id_pesanan);

		return $data->result_array();

	}

	public function selectTiketUser($id_pesanan){

		$data = $this->db->query('SELECT id_tiket, data_tiket.id_pesanan, data_tiket.id_gerbong, data_tiket.id_kursi, data_tiket.nama, data_tiket.noktp, data_tiket.jk, data_gerbong.nama_gerbong, data_kursi.nama_kursi
								FROM data_tiket, data_kursi, data_gerbong
								WHERE data_tiket.id_kursi = data_kursi.id_kursi AND
									data_tiket.id_gerbong = data_gerbong.id_gerbong AND
									id_pesanan = ' . $id_pesanan);

		return $data->result_array();

	}

	public function selectJadwal($id){

		$this->db->select('id_jadwal');
		$this->db->select('data_jadwal.id_kereta');
		$this->db->select('id_stasiun_awal');
		$this->db->select('id_stasiun_akhir');
		$this->db->select('data_kereta.nama_kereta');
		$this->db->select('data_stasiun.nama_stasiun as stasiun_awal');
		$this->db->select('data_stasiun_akhir.nama_stasiun as stasiun_akhir');
		$this->db->select('tanggal_berangkat');
		$this->db->select('tanggal_tiba');
		$this->db->select('jam_berangkat');
		$this->db->select('jam_tiba');
		$this->db->select('durasi');

		$this->db->from('data_jadwal');
		$this->db->from('data_kereta');
		$this->db->from('data_stasiun');
		$this->db->from('data_stasiun_akhir');

		$this->db->where('id_jadwal', $id);
		$this->db->where('data_kereta.id_kereta = data_jadwal.id_kereta');
		$this->db->where('data_stasiun.id_stasiun = data_jadwal.id_stasiun_awal');
		$this->db->where('data_stasiun_akhir.id_stasiun = data_jadwal.id_stasiun_akhir');
		return $this->db->get();

	}

	public function selectAkun($id){

		$this->db->select('id_akun');
		$this->db->select('nama');
		$this->db->select('jk');
		$this->db->select('tempat');
		$this->db->select('tanggal');
		$this->db->select('noktp');
		$this->db->select('nohp');
		$this->db->select('alamat');
		$this->db->select('email');
		$this->db->select('password');
		$this->db->from('akun');
		$this->db->where('id_akun', $id);
		return $this->db->get();

	}

	public function selectDataPemesan(){

		$data = $this->db->get('data_pemesan');
		return $data->result_array();

	}

	public function selectDataHarga($id_jadwal){

		$data = $this->db->query('SELECT * FROM data_harga WHERE id_jadwal = ' . $id_jadwal);
		return $data->result_array();

	}

	public function selectDataPesanan(){

		$data = $this->db->query('SELECT detail_pesanan.id_pesanan, detail_pesanan.id_pemesan, detail_pesanan.id_jadwal, detail_pesanan.id_kelas, detail_pesanan.tiket_dewasa, detail_pesanan.tiket_anak, detail_pesanan.total, detail_pesanan.metode_bayar, detail_pesanan.kode_bayar, detail_pesanan.status_bayar, data_jadwal.id_kereta, status_pembatalan, tanggal_pesan, status_dipakai
								FROM detail_pesanan, data_jadwal
								WHERE detail_pesanan.id_jadwal = data_jadwal.id_jadwal');

		return $data->result_array();

	}

	public function selectGerbong($id){

		$data = $this->db->query('SELECT data_gerbong.id_gerbong, data_gerbong.id_kelas, data_gerbong.nama_gerbong
								FROM data_gerbong
								WHERE data_gerbong.id_kelas = ' . $id);
		
		return $data->result_array();

	}

	public function selectData(){

		$data = $this->db->query('SELECT detail_pesanan.id_jadwal, data_jadwal.id_kereta, detail_pesanan.id_kelas, data_tiket.id_pesanan, data_tiket.id_tiket, data_tiket.id_gerbong, data_tiket.id_kursi, status_pembatalan, tanggal_pesan, status_dipakai
								FROM data_tiket, detail_pesanan, data_jadwal, data_gerbong, data_kursi, data_kereta, data_kelas
								WHERE data_tiket.id_pesanan = detail_pesanan.id_pesanan AND
									data_tiket.id_gerbong = data_gerbong.id_gerbong AND
									data_tiket.id_kursi = data_kursi.id_kursi AND
									detail_pesanan.id_jadwal = data_jadwal.id_jadwal AND
									data_kereta.id_kereta = data_jadwal.id_kereta AND
									data_kelas.id_kelas = detail_pesanan.id_kelas');

		return $data->result_array();

	}

	public function selectDataKursi($id_kelas){

		$data = $this->db->query('SELECT * FROM data_kursi WHERE id_kelas = ' . $id_kelas);
		return $data->result_array();

	}

	public function CariKereta($data, $sort, $type){

		if ($sort == "Harga"){
			$query = $this->db->query('SELECT data_jadwal.id_jadwal, data_jadwal.id_kereta, data_kereta.nama_kereta, data_jadwal.id_stasiun_awal, data_jadwal.id_stasiun_akhir, data_stasiun.nama_stasiun as stasiun_awal, data_stasiun_akhir.nama_stasiun as stasiun_akhir, tanggal_berangkat, tanggal_tiba, jam_berangkat, jam_tiba, durasi, data_kelas.nama_kelas, data_harga.id_kelas, data_harga.harga_dewasa, data_harga.harga_anak, id_harga, status_dipakai
								FROM data_kereta, data_jadwal, data_stasiun, data_stasiun_akhir, data_harga, data_kelas
								WHERE data_kereta.id_kereta = data_jadwal.id_kereta AND
									data_stasiun.id_stasiun = data_jadwal.id_stasiun_awal AND
									data_stasiun_akhir.id_stasiun = data_jadwal.id_stasiun_akhir AND
									data_harga.id_jadwal = data_jadwal.id_jadwal AND
									data_kelas.id_kelas = data_harga.id_kelas
									AND data_jadwal.id_stasiun_awal = ' . $data['id_stasiun_awal'] . ' AND
									data_jadwal.id_stasiun_akhir = ' . $data['id_stasiun_akhir'] . ' AND
									data_jadwal.tanggal_berangkat = "' . $data['tanggal_berangkat'] . '"
								ORDER BY data_harga.harga_dewasa ' . $type );
		} else {
			$query = $this->db->query('SELECT data_jadwal.id_jadwal, data_jadwal.id_kereta, data_kereta.nama_kereta, data_jadwal.id_stasiun_awal, data_jadwal.id_stasiun_akhir, data_stasiun.nama_stasiun as stasiun_awal, data_stasiun_akhir.nama_stasiun as stasiun_akhir, tanggal_berangkat, tanggal_tiba, jam_berangkat, jam_tiba, durasi, data_kelas.nama_kelas, data_harga.id_kelas, data_harga.harga_dewasa, data_harga.harga_anak, id_harga, status_dipakai
								FROM data_kereta, data_jadwal, data_stasiun, data_stasiun_akhir, data_harga, data_kelas
								WHERE data_kereta.id_kereta = data_jadwal.id_kereta AND
									data_stasiun.id_stasiun = data_jadwal.id_stasiun_awal AND
									data_stasiun_akhir.id_stasiun = data_jadwal.id_stasiun_akhir AND
									data_harga.id_jadwal = data_jadwal.id_jadwal AND
									data_kelas.id_kelas = data_harga.id_kelas
									AND data_jadwal.id_stasiun_awal = ' . $data['id_stasiun_awal'] . ' AND
									data_jadwal.id_stasiun_akhir = ' . $data['id_stasiun_akhir'] . '  AND
									data_jadwal.tanggal_berangkat = "' . $data['tanggal_berangkat'] . '"
								ORDER BY data_kelas.nama_kelas ' . $type );
		}
		
		return $query->result_array();

	}

	public function insertRegistrasi($data){

		$this->db->insert('akun', $data);

	}

	public function insertJadwal($data){

		$this->db->insert('data_jadwal', $data);

	}

	public function insertHarga($data){

		$this->db->insert('data_harga', $data);

		$this->db->query('UPDATE data_jadwal SET status = 1 WHERE id_jadwal = ' . $data['id_jadwal']);

	}

	public function insertDataPemesan($data){

		$this->db->insert('data_pemesan', $data);

	}

	public function insertDetailPesanan($data){

		$this->db->insert('detail_pesanan', $data);

	}

	public function insertDataTiket($data){

		$this->db->insert('data_tiket', $data);

	}

	public function updateJadwal($data){

		$this->db->where('id_jadwal', $data['id_jadwal']);
		$this->db->update('data_jadwal', $data);

	}

	public function updateHarga($data){
		
		$this->db->where('id_jadwal', $data['id_jadwal']);
		$this->db->where('id_kelas', $data['id_kelas']);
		$this->db->update('data_harga', $data);

	}

	public function updateJadwalStatus($id_jadwal){

		$this->db->query('UPDATE data_jadwal SET status_dipakai = 1 WHERE id_jadwal = ' . $id_jadwal);

	}

	public function updateDataPemesan($id_pemesan){

		$this->db->query('UPDATE data_pemesan SET status = 1 WHERE id_pemesan = ' . $id_pemesan);

	}

	public function updateDataPesanan($id_pesanan){

		$this->db->query('UPDATE detail_pesanan SET metode_bayar = "" WHERE id_pesanan = ' . $id_pesanan);

	}

	public function updatePesananNotif($id_pesanan){

		$this->db->query('UPDATE detail_pesanan SET notif = 1 WHERE id_pesanan = ' . $id_pesanan);

	}

	public function updateDetailPesanan($kode, $id_pesanan, $metode_bayar){

		$this->db->query('UPDATE detail_pesanan SET metode_bayar = "' . $metode_bayar . '", kode_bayar = "' . $kode . '" WHERE id_pesanan = ' . $id_pesanan);

	}

	public function deleteJadwal($id){

		$this->db->query('DELETE FROM data_harga WHERE id_jadwal = ' . $id);
		$this->db->query('DELETE FROM data_jadwal WHERE id_jadwal = ' . $id);

	}

	public function updateStatusBayar($id_pesanan){

		$this->db->query('UPDATE detail_pesanan SET status_bayar = 1 WHERE id_pesanan = ' . $id_pesanan);

	}

	public function deletePesanan($id_pesanan, $data){

		$this->db->query('DELETE FROM data_tiket WHERE id_pesanan = ' . $id_pesanan);
		$this->db->query('UPDATE detail_pesanan SET status_pembatalan = 1 WHERE id_pesanan = ' . $id_pesanan);
		$this->db->insert('data_pembatalan', $data);

	}

	public function updateProfil($data){

		$this->db->where('id_akun', $data['id_akun']);
		$this->db->update('akun', $data);

	}

}

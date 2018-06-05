<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

	public function index(){

		$argument['title'] = '0';
		if ($this->session->userdata("isLoggedIn")) {
			$argument['title'] = '1';
			$argument['idnya'] = $this->session->userdata("id");
			$argument['email'] = $this->session->userdata("email");
		} else {
			$argument['title'] = '0';
		}
		$argument['cari'] = '0';

		$argument['data'] = $this->model->GetAllStasiun();
		$this->load->view('template/header-user', $argument);
		$this->load->view('beranda', $argument);
		$this->load->view('template/footer-user');

	}

	public function kontak(){

		$argument['title'] = '0';
		if ($this->session->userdata("isLoggedIn")) {
			$argument['title'] = '1';
		} else {
			$argument['title'] = '0';
		}
		$argument['cari'] = '0';

		$this->load->view('template/header-user', $argument);
		$this->load->view('kontak', $argument);
		$this->load->view('template/footer-user');

	}

	public function login(){

		$argument['stat'] = "belum";
		$this->load->view('template/header-awal');
		$this->load->view('login', $argument);
		$this->load->view('template/footer-awal');

	}

	public function profil(){

		$argument['title'] = '0';
		if ($this->session->userdata("isLoggedIn")) {
			$argument['title'] = '1';
		} else {
			$argument['title'] = '0';
		}
		$argument['cari'] = '0';

		$id = $this->session->userdata("id");
		$data = $this->model->GetAll();

		foreach ($data as $row) {
			if ($row['id_akun'] == $id){
				$argument['id_akun'] = $row['id_akun'];
				$argument['nama'] = $row['nama'];
				$argument['jk'] = $row['jk'];
				$argument['tempat'] = $row['tempat'];
				$argument['tanggal'] = $row['tanggal'];
				$argument['noktp'] = $row['noktp'];
				$argument['nohp'] = $row['nohp'];
				$argument['alamat'] = $row['alamat'];
				$argument['email'] = $row['email'];
				$argument['password'] = $row['password'];
			}
		}

		$this->load->view('template/header-user', $argument);
		$this->load->view('profil', $argument);
		$this->load->view('template/footer-user');

	}

	public function logout(){

		$this->session->sess_destroy();
		redirect(base_url('utama/beranda'));

	}

	public function registrasi(){

		$this->load->view('template/header-awal');
		$this->load->view('registrasi');
		$this->load->view('template/footer-awal');

	}

	public function editProfil(){

		$argument['title'] = '0';
		if ($this->session->userdata("isLoggedIn")) {
			$argument['title'] = '1';
		} else {
			$argument['title'] = '0';
		}
		$argument['cari'] = '0';

		$id = $this->session->userdata("id");
		$data = $this->model->GetAll();

		foreach ($data as $row) {
			if ($row['id_akun'] == $id){
				$argument['id_akun'] = $row['id_akun'];
				$argument['nama'] = $row['nama'];
				$argument['jk'] = $row['jk'];
				$argument['tempat'] = $row['tempat'];
				$argument['tanggal'] = $row['tanggal'];
				$argument['noktp'] = $row['noktp'];
				$argument['nohp'] = $row['nohp'];
				$argument['alamat'] = $row['alamat'];
				$argument['email'] = $row['email'];
				$argument['password'] = $row['password'];
			}
		}

		$this->load->view('template/header-user', $argument);
		$this->load->view('edit_profil', $argument);
		$this->load->view('template/footer-user');

	}

	public function beranda(){

		$argument['title'] = '0';
		if ($this->session->userdata("isLoggedIn")) {
			$argument['title'] = '1';
			$argument['idnya'] = $this->session->userdata("id");
			$argument['email'] = $this->session->userdata("email");
		} else {
			$argument['title'] = '0';
		}
		$argument['cari'] = '0';

		$argument['data'] = $this->model->GetAllStasiun();
		$this->load->view('template/header-user', $argument);
		$this->load->view('beranda', $argument);
		$this->load->view('template/footer-user');

	}

	public function dataPesanan(){

		$id = $this->session->userdata("id");

		$dataAkun = $this->model->GetAll();
		foreach ($dataAkun as $row){
			if ($row['id_akun'] == $id){
				$email = $row['email'];
				$nohp = $row['nohp'];
			}
		}

		$argument['ada'] = '0';
		$argument['stat'] = '0';
		$dataPemesan = $this->model->selectDataPemesan();
		foreach ($dataPemesan as $row){
			if ($row['email'] == $email && $row['nohp'] == $nohp){
				$id_pemesan = $row['id_pemesan'];
				$argument['stat'] = '1';
			}
		}

		if ($argument['stat'] == '1'){
			$argument['data'] = $this->model->GetAllPemesanUser($id_pemesan);

			foreach ($argument['data'] as $row){
				$id_pesanan = $row['id_pesanan'];
			}
			$argument['data_tiket'] = $this->model->selectTiketUser($id_pesanan);
		}

		$argument['title'] = '0';
		if ($this->session->userdata("isLoggedIn")) {
			$argument['title'] = '1';
		} else {
			$argument['title'] = '0';
		}
		$argument['cari'] = '0';

		$this->load->view('template/header-user', $argument);
		$this->load->view('tiket_pesanan', $argument);
		$this->load->view('template/footer-user');

	}

	public function pesanan(){

		$id_pesanan = $this->input->post('id_pesanan');

		$argument['data'] = $this->model->GetAllPesananUser($id_pesanan);
		if ($argument['data']){
			$argument['ada'] = '0';
		} else {
			$argument['ada'] = '1';
			$argument['id_pesanan'] = $id_pesanan;
		}

		$argument['data_tiket'] = $this->model->selectTiketUser($id_pesanan);

		$argument['title'] = '0';
		if ($this->session->userdata("isLoggedIn")) {
			$argument['title'] = '1';
		} else {
			$argument['title'] = '0';
		}
		$argument['cari'] = '0';
		$argument['stat'] = '1';

		$this->load->view('template/header-user', $argument);
		$this->load->view('tiket_pesanan', $argument);
		$this->load->view('template/footer-user');

	}

	public function pesan(){

		$argument['id_jadwal'] = $this->input->post('id_jadwal');
		$argument['id_kelas'] = $this->input->post('id_kelas');
		$argument['dewasa'] = $this->input->post('Dewasa');
		$argument['anak'] = $this->input->post('Anak');

		$id_kelas = $this->input->post('id_kelas');
		$id_jadwal = $this->input->post('id_jadwal');

		$argument['jadwal'] = $this->model->selectJadwalPesan($id_jadwal);

		$argument['title'] = '0';
		if ($this->session->userdata("isLoggedIn")) {
			$argument['title'] = '1';
			$id_akun = $this->session->userdata("id");
			$argument['akun'] = $this->model->selectAkun($id_akun)->row();
		} else {
			$argument['title'] = '0';
		}
		$argument['cari'] = '0';

		$this->load->view('template/header-user', $argument);
		$this->load->view('pesan_tiket', $argument);
		$this->load->view('template/footer-user');

	}

	public function pembayaran(){

		$argument['id_pemesan'] = $this->input->post('id_pemesan');
		$argument['id_pesanan'] = $this->input->post('id_pesanan');
		$argument['metode_bayar'] = $this->input->post('Metode');

		$id_pemesan = $this->input->post('id_pemesan');
		$id_pesanan = $this->input->post('id_pesanan');
		$metode_bayar = $this->input->post('Metode');

		if ($metode_bayar == "Minimarket"){
			$kode = substr(md5($id_pesanan), 0, 7);
		} else {
			$kode = "13628496824" + $id_pesanan;
		}

		$this->model->updateDetailPesanan($kode, $id_pesanan, $metode_bayar);

		$argument['title'] = '0';
		if ($this->session->userdata("isLoggedIn")) {
			$argument['title'] = '1';
			$id_akun = $this->session->userdata("id");
			$argument['akun'] = $this->model->selectAkun($id_akun)->row();
		} else {
			$argument['title'] = '0';
		}
		$argument['cari'] = '0';
		$argument['input_metode'] = '1';

		$argument['kode'] = $kode;

		$this->load->view('template/header-user', $argument);
		$this->load->view('bayar', $argument);
		$this->load->view('template/footer-user');

	}

	public function konfirmasi(){

		$argument['id_pemesan'] = $this->input->post('id_pemesan');
		$argument['id_pesanan'] = $this->input->post('id_pesanan');

		$id_pemesan = $this->input->post('id_pemesan');
		$id_pesanan = $this->input->post('id_pesanan');

		$argument['data_pemesan'] = $this->model->selectPemesan($id_pemesan);
		$argument['data_pesanan'] = $this->model->selectPesanan($id_pesanan);
		$argument['data_tiket'] = $this->model->selectTiket($id_pesanan);

		foreach ($argument['data_pesanan'] as $row){
			$id_jadwal = $row['id_jadwal'];
			$argument['id_kelas'] = $row['id_kelas'];
			$argument['id_jadwal'] = $id_jadwal;
			$argument['dewasa'] = $row['tiket_dewasa'];
			$argument['anak'] = $row['tiket_anak'];
			$argument['metode'] = $row['metode_bayar'];
		}

		$argument['jadwal'] = $this->model->selectJadwalPesan($id_jadwal);

		$argument['title'] = '0';
		if ($this->session->userdata("isLoggedIn")) {
			$argument['title'] = '1';
			$id_akun = $this->session->userdata("id");
			$argument['akun'] = $this->model->selectAkun($id_akun)->row();
		} else {
			$argument['title'] = '0';
		}
		$argument['cari'] = '0';

		$this->load->view('template/header-user', $argument);
		$this->load->view('konfirmasi_data', $argument);
		$this->load->view('template/footer-user');

	}

	public function prosesRegistrasi(){

		$data['id_akun'] = null;
		$data['nama'] = $this->input->post('Nama');
		$data['jk'] = $this->input->post('JK');
		$data['tempat'] = $this->input->post('Tempat');
		$data['tanggal'] = $this->input->post('Tanggal');
		$data['noktp'] = $this->input->post('KTP');
		$data['nohp'] = $this->input->post('HP');
		$data['alamat'] = $this->input->post('Alamat');
		$data['email'] = $this->input->post('Email');
		$data['password'] = $this->input->post('Pass');

		$this->model->insertRegistrasi($data);

		$email = $this->input->post('Email');
        $pass = $this->input->post('Pass');

        $email_body =
        '
	    <table align="center" style="border: 1px solid #cccccc;" cellpadding="0" cellspacing="0" width="600">

			<tr>
				<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
					<h1 style="color: white; font-family: Arial, sans-serif; font-size: 36px; padding: 25px 0 0 0;">PT. KERETA API KITA</h1>
				</td>
			</tr>

			<tr>
				<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;" align="center">
								<b>Selamat ! Anda Telah Bergabung</b>
							</td>
						</tr>
						<tr>
							<td style="padding: 20px 0 5px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="center">
								Email : ' . $email . '
							</td>
						</tr>
						<tr>
							<td style="padding: 0 0 20px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="center">
								Password : ' . $pass . '
							</td>
						</tr>
						<tr>
							<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="justify">
								Anda telah bergabung di layanan pembelian tiket online PT. Kereta Api Kita. Keamanan privasi anda akan kami jaga dengan baik. Di website kami anda bisa memesan tiket kereta sesuai keinginan. Anda memiliki berbagai macam fitur, salah satunya fitur "cancel tiket", yang memudahkan bagi anda untuk membatalkan pesanan. Syarat dan ketentuan berlaku.
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td width="260" valign="top">
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td>
														<img src="https://png.icons8.com/color/1600/hand-with-pen.png" alt="" width="100%" height="stretch" style="display: block;" />
													</td>
												</tr>
												<tr>
													<td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="center">
														Pilih Jadwal dan Kelas Kereta
													</td>
												</tr>
											</table>
										</td>
										<td style="font-size: 0; line-height: 0;" width="20">
											&nbsp;
										</td>
										<td width="260" valign="top">
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td>
														<img src="https://png.icons8.com/color/1600/cash-in-hand.png" alt="" width="100%" height="stretch" style="display: block;" />
													</td>
												</tr>
												<tr>
													<td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="center">
														Lakukan Pembayaran
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td align="left">
								<table border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" align="left">
											&reg; PT. Kereta Api Kita 2018
										</td>
									</tr>
								</table>
							</td>
							<td style="padding: 20px 0 30px 0;"></td>
						</tr>
					</table>
				</td>
			</tr>

		</table>
        ';

        $config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'dummy.ilkomupi@gmail.com',
		  'smtp_pass' => 'ilkomupi',
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);

        $this->load->library('email', $config);
    	$this->email->set_newline("\r\n");
		$this->email->from('', 'PT Kereta Api Kita');
		$this->email->to($email);
		$this->email->subject('Selamat Datang Di Website Kami');
		$this->email->message($email_body);
		$this->email->send();

		redirect(base_url('utama/index'));
	}

	public function prosesLogin(){

		$email = $this->input->post('Email');
		$pass = $this->input->post('Pass');

		$ket = "0";
		$data = $this->model->GetAll();
		foreach ($data as $row){

			if (($email == $row['email']) && ($pass == $row['password'])) {

				$ses = [
					'isLoggedIn' => TRUE,
					'password' => $pass,
					'id' => $row['id_akun'],
					'email' => $row['email']
				];
				$this->session->set_userdata($ses);
				$ket = "1";

			}

		}

		if ($ket == "0"){
			$argument['stat'] = "gagal";
			$this->load->view('template/header-awal');
			$this->load->view('login', $argument);
			$this->load->view('template/footer-awal');
		} else {
			redirect(base_url('utama/beranda'));
		}

	}

	public function prosesCariTiket(){

		$data['id_stasiun_awal'] = $this->input->post('StasiunAwal');
		$data['id_stasiun_akhir'] = $this->input->post('StasiunAkhir');
		$data['tanggal_berangkat'] = $this->input->post('TanggalB');
		$argument['tiket_dewasa'] = $this->input->post('JumDew');
		$argument['tiket_anak'] = $this->input->post('JumBay');

		$sort = $this->input->post('sort');
		$type = $this->input->post('ad');
		
		$argument['sort'] = $sort;
		$argument['type'] = $type;

		$argument['stasAwal'] = $this->input->post('StasiunAwal');
		$argument['stasAkhir'] = $this->input->post('StasiunAkhir');

		$argument['kereta'] = $this->model->CariKereta($data, $sort, $type);

		if ($argument['kereta']){
			$argument['status'] = '1';
		} else {
			$argument['status'] = '0';
		}

		$argument['cari'] = '1';
		$argument['title'] = '0';
		if ($this->session->userdata("isLoggedIn")) {
			$argument['title'] = '1';
		} else {
			$argument['title'] = '0';
		}

		$argument['data'] = $this->model->GetAllStasiun();
		$this->load->view('template/header-user', $argument);
		$this->load->view('beranda', $argument);
		$this->load->view('template/footer-user');
	}

	public function prosesPembayaran(){

		$data['id_pemesan'] = null;
		$data['nama'] = $this->input->post('Nama');
		$data['email'] = $this->input->post('Email');
		$data['nohp'] = $this->input->post('HP');
		$data['alamat'] = $this->input->post('Alamat');
		$data['status'] = 0;

		$this->model->insertDataPemesan($data);

		$argument['pemesan'] = $this->model->selectDataPemesan();
		foreach ($argument['pemesan'] as $row){
			if($row['status'] == 0){
				$id_pemesan = $row['id_pemesan'];
			}
		}

		$data_pesanan['id_pesanan'] = null;
		$data_pesanan['id_pemesan'] = $id_pemesan;
		$data_pesanan['id_jadwal'] = $this->input->post('id_jadwal');
		$data_pesanan['id_kelas'] = $this->input->post('id_kelas');
		$data_pesanan['tiket_dewasa'] = $this->input->post('dewasa');
		$data_pesanan['tiket_anak'] = $this->input->post('anak');
		$data_pesanan['total'] = $this->input->post('total');
		$data_pesanan['metode_bayar'] = "ok";
		$data_pesanan['kode_bayar'] = "";
		date_default_timezone_set('Asia/Jakarta');
		$data_pesanan['tanggal_pesan'] = date("Y-m-d");
		$data_pesanan['status_bayar'] = 0;
		$data_pesanan['status_pembatalan'] = 0;
		$data_pesanan['notif'] = 0;

		$this->model->insertDetailPesanan($data_pesanan);

		$idJadwal = $this->input->post('id_jadwal');
		$this->model->updateJadwalStatus($idJadwal);

		$argument['pesanan'] = $this->model->selectDataPesanan();
		foreach ($argument['pesanan'] as $row){
			if($row['metode_bayar'] == "ok"){
				$id_pesanan = $row['id_pesanan'];
				$id_kereta = $row['id_kereta'];
			}
		}

		$data_jadwal = $this->input->post('id_jadwal');
		$data_kelas = $this->input->post('id_kelas');

		$m = 0;
		$argument['banyakGerbong'] = $this->model->selectGerbong($data_kelas);
		foreach ($argument['banyakGerbong'] as $row){
			$data_gerbong[$m] = $row['id_gerbong'];
			$m++;
		}

		if ($data_kelas == 1){
			$jum_kursi = 20;
			$pertama = 285;
		}
		else if ($data_kelas == 2){
			$jum_kursi = 18;
			$pertama = 385;
		}
		else if ($data_kelas == 3){
			$jum_kursi = 15;
			$pertama = 457;
		} else {
			$jum_kursi = 13;
			$pertama = 517;
		}

		$n = $this->input->post('dewasa');
		for ($i = 0; $i < $n; $i++){

			$argument['dataCariKursi'] = $this->model->selectData();

			$max_gerbong = 0;
			$inc = 0;
			foreach ($argument['dataCariKursi'] as $row){
				if ($row['id_jadwal'] == $data_jadwal && $row['id_kelas'] == $data_kelas && $row['id_kereta'] == $id_kereta && $row['id_gerbong'] > $max_gerbong){
					$max_gerbong = $row['id_gerbong'];
					$inc++;
				}
			}

			$count = 0;
			$id_kursi_akhir = 0;
			$id_kursi = 0;
			foreach ($argument['dataCariKursi'] as $row){
				if ($row['id_jadwal'] == $data_jadwal && $row['id_kelas'] == $data_kelas && $row['id_kereta'] == $id_kereta && $row['id_gerbong'] == $max_gerbong){
					$count++;
					$data_kursi[] = $row['id_kursi'];
					$id_kursi_akhir = $row['id_kursi'];
				}
			}

			$id_kursi_akhir = $id_kursi_akhir + 1;

			/*if ($count > 0){
				$ketemu = 0;
				$argument['dataKursi'] = $this->model->selectDataKursi($data_kelas);
				foreach ($argument['dataKursi'] as $row){
					if ($row['id_kursi'] != $data_kursi[$i] && $ketemu == 0){
						$id_kursi_akhir = $row['id_kursi'];
						$ketemu = 1;
					} else {
						$i++;
					}
				}
			}*/

			if ($count < $jum_kursi && $count > 0){
				$id_kursi = $id_kursi_akhir;
				$id_gerbong = $max_gerbong;
			}
			else if ($count == 0) {
				$id_kursi = $pertama;
				$id_gerbong = $data_gerbong[0];
			} else {
				$id_kursi = $pertama;
				$id_gerbong = $data_gerbong[0] + 1;
			}

			$data_tiket['id_tiket'] = null;
			$data_tiket['id_pesanan'] = $id_pesanan;
			$data_tiket['id_gerbong'] = $id_gerbong;
			$data_tiket['id_kursi'] = $id_kursi;
			$data_tiket['nama'] = $this->input->post('NamaDew_' . $i);
			$data_tiket['noktp'] = $this->input->post('NoKTP_' . $i);
			$data_tiket['jk'] = $this->input->post('JKDew_' . $i);

			$this->model->insertDataTiket($data_tiket);

		}

		$n = $this->input->post('anak');
		for ($i = 0; $i < $n; $i++){

			$argument['dataCariKursi'] = $this->model->selectData();

			$max_gerbong = 0;
			$inc = 0;
			foreach ($argument['dataCariKursi'] as $row){
				if ($row['id_jadwal'] == $data_jadwal && $row['id_kelas'] == $data_kelas && $row['id_kereta'] == $id_kereta && $row['id_gerbong'] > $max_gerbong){
					$max_gerbong = $row['id_gerbong'];
					$inc++;
				}
			}

			$count = 0;
			$id_kursi_akhir = 0;
			$id_kursi = 0;
			foreach ($argument['dataCariKursi'] as $row){
				if ($row['id_jadwal'] == $data_jadwal && $row['id_kelas'] == $data_kelas && $row['id_kereta'] == $id_kereta && $row['id_gerbong'] == $max_gerbong){
					$count++;
					$id_kursi_akhir = $row['id_kursi'];
				}
			}

			if ($count < $jum_kursi && $count > 0){
				$id_kursi = $id_kursi_akhir + 1;
				$id_gerbong = $max_gerbong;
			}
			else if ($count == 0) {
				$id_kursi = $pertama;
				$id_gerbong = $data_gerbong[0];
			} else {
				$id_kursi = $pertama;
				$id_gerbong = $data_gerbong[0] + 1;
			}

			$data_tiket['id_tiket'] = null;
			$data_tiket['id_pesanan'] = $id_pesanan;
			$data_tiket['id_gerbong'] = $id_gerbong;
			$data_tiket['id_kursi'] = $id_kursi;
			$data_tiket['nama'] = $this->input->post('NamaAn_' . $i);
			$data_tiket['noktp'] = "anak";
			$data_tiket['jk'] = $this->input->post('JKAn_' . $i);

			$this->model->insertDataTiket($data_tiket);

		}

		$this->model->updateDataPemesan($id_pemesan);
		$this->model->updateDataPesanan($id_pesanan);

		$argument['id_pesanan'] = $id_pesanan;
		$argument['id_pemesan'] = $id_pemesan;
		$argument['title'] = '0';
		if ($this->session->userdata("isLoggedIn")) {
			$argument['title'] = '1';
			$id_akun = $this->session->userdata("id");
			$argument['akun'] = $this->model->selectAkun($id_akun)->row();
		} else {
			$argument['title'] = '0';
		}
		$argument['cari'] = '0';
		$argument['input_metode'] = '0';

		$this->load->view('template/header-user', $argument);
		$this->load->view('bayar', $argument);
		$this->load->view('template/footer-user');
	}

	public function prosesPembatalanUser($id){

		date_default_timezone_set('Asia/Jakarta');
		$data['id_pembatalan'] = null;
		$data['id_pesanan'] = $id;
		$data['tanggal'] = date("Y-m-d");
		$data['oleh_user'] = 1;
		$data['oleh_admin'] = 0;

		$this->model->deletePesanan($id, $data);

		redirect(base_url('utama/dataPesanan'));
	}

	public function prosesEditProfil(){

		$data['id_akun'] = $this->input->post('id_akun');
		$data['nama'] = $this->input->post('Nama');
		$data['jk'] = $this->input->post('JK');
		$data['tempat'] = $this->input->post('Tempat');
		$data['tanggal'] = $this->input->post('Tanggal');
		$data['noktp'] = $this->input->post('KTP');
		$data['nohp'] = $this->input->post('HP');
		$data['alamat'] = $this->input->post('Alamat');
		$data['email'] = $this->input->post('Email');
		$data['password'] = $this->input->post('Pass');

		$this->model->updateProfil($data);

		redirect(base_url('utama/profil'));
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////

	public function cetak($id_pesanan){

		$argument['data'] = $this->model->GetAllPesananUser($id_pesanan);
		if ($argument['data']){
			$argument['ada'] = '0';
		} else {
			$argument['ada'] = '1';
			$argument['id_pesanan'] = $id_pesanan;
		}

		$argument['data_tiket'] = $this->model->selectTiketUser($id_pesanan);

		$this->load->library('pdf');
        
		$pdf = new FPDF("L", "cm", "A4");
		$pdf->AddPage();

        $pdf->SetFont('Arial','B',20);
        $pdf->Cell(27.5, 0.8, 'PT. KERETA API KITA', 0, 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(27.5, 0.7, 'DATA PEMESANAN', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(27.5, 0.3, ' ', 0, 0, 'C');
        $pdf->Ln();

        foreach ($argument['data'] as $row) {

	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(13.75, 0.7, '        ID BOOKING : ' . $id_pesanan, 0, 0, 'L');
	        $pdf->Cell(13.75, 0.7, 'Tanggal Pemesanan ' . $row['tanggal_pesan'] . '          ', 0, 0, 'R');
	        $pdf->Ln();
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(13.75, 0.7, '        Nama Kereta : ' . $row['nama_kereta'] . ',  Kelas : ' . $row['nama_kelas'], 0, 0, 'L');
	        $pdf->Ln();
	        $pdf->Cell(27.5, 0.3, ' ', 0, 0, 'C');
	        $pdf->Ln();
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(13.75, 0.7, 'DATA PEMESAN', 0, 0, 'L');
	        $pdf->Ln();
	        $pdf->Cell(27.5, 0.3, ' ', 0, 0, 'C');
	        $pdf->Ln();
	        $pdf->SetFont('Arial','',12);
	        $pdf->Cell(9.167, 0.7, '        Nama : ' . $row['nama'], 0, 0, 'L');
	        $pdf->Cell(9.167, 0.7, 'Email : ' . $row['email'], 0, 0, 'L');
	        $pdf->Cell(9.167, 0.7, 'No HP : ' . $row['nohp'], 0, 0, 'L');
	        $pdf->Ln();
	        $pdf->Cell(27.5, 0.7, '        Alamat : ' . $row['alamat'], 0, 0, 'L');
	        $pdf->Ln();
	        $pdf->Cell(27.5, 0.3, ' ', 0, 0, 'C');
	        $pdf->Ln();
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(13.75, 0.7, 'DATA PESANAN', 0, 0, 'L');
	        $pdf->Ln();
	        $pdf->Cell(27.5, 0.3, ' ', 0, 0, 'C');
	        $pdf->Ln();
	        $pdf->SetFont('Arial','',12);
	        $pdf->Cell(9.167, 0.7, '        Jurusan : ' . $row['stasiun_awal'] . ' - '  . $row['stasiun_akhir'], 0, 0, 'L');
	        $pdf->Cell(9.167, 0.7, 'Tanggal Berangkat : ' . $row['tanggal_berangkat'], 0, 0, 'L');
	        $pdf->Cell(9.167, 0.7, 'Tanggal Tiba : ' . $row['tanggal_tiba'], 0, 0, 'L');
	        $pdf->Ln();
	        $pdf->Cell(9.167, 0.7, '        Jam Berangkat : ' . $row['jam_berangkat'], 0, 0, 'L');
	        $pdf->Cell(9.167, 0.7, 'Jam Tiba : ' . $row['jam_tiba'], 0, 0, 'L');
	        $pdf->Cell(9.167, 0.7, 'Durasi : 8 Jam', 0, 0, 'L');
	        $pdf->Ln();
	        $pdf->Cell(9.167, 0.7, '        Total Harga : Rp. ' . $row['total'], 0, 0, 'L');
	        $pdf->Cell(9.167, 0.7, 'Metode Bayar : ' . $row['metode_bayar'], 0, 0, 'L');
	        if ($row['metode_bayar'] == "Minimarket"){
	        	$pdf->Cell(9.167, 0.7, 'Kode Bayar : ' . $row['kode_bayar'], 0, 0, 'L');
	        } else {
	        	$pdf->Cell(9.167, 0.7, 'Nomor Rekening : ' . $row['kode_bayar'], 0, 0, 'L');
	        }
	        $pdf->Ln();
	        $pdf->Cell(27.5, 0.3, ' ', 0, 0, 'C');
	        $pdf->Ln();
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(13.75, 0.7, 'DATA PENUMPANG', 0, 0, 'L');
	        $pdf->Ln();
	        $pdf->Cell(27.5, 0.3, ' ', 0, 0, 'C');

	    }

	    foreach ($argument['data_tiket'] as $row) {
	        $pdf->Ln();
	        if ($row['noktp'] == "anak"){
	        	$pdf->Cell(13.75, 0.7, '        ANAK', 0, 0, 'L');
	        } else {
	        	$pdf->Cell(13.75, 0.7, '        DEWASA', 0, 0, 'L');
	        }
	        $pdf->Ln();
	        $pdf->Cell(27.5, 0.3, ' ', 0, 0, 'C');
	        $pdf->Ln();
	        $pdf->SetFont('Arial','',12);
	        $pdf->Cell(9.167, 0.7, '        Nama : '. $row['nama'], 0, 0, 'L');
	        if ($row['noktp'] != "anak"){
	        	$pdf->Cell(9.167, 0.7, 'No KTP : ' . $row['noktp'], 0, 0, 'L');
	        }
	        $pdf->Cell(9.167, 0.7, 'Jenis Kelamin : ' . $row['jk'], 0, 0, 'L');
	        $pdf->Ln();
	        $pdf->Cell(9.167, 0.7, '        ID Tiket : ' . $row['id_tiket'], 0, 0, 'L');
	        $pdf->Cell(9.167, 0.7, 'Nomor Gerbong : ' . $row['nama_gerbong'], 0, 0, 'L');
	        $pdf->Cell(9.167, 0.7, 'Nomor Kursi : ' . $row['nama_kursi'], 0, 0, 'L');
	        $pdf->Ln();
	        $pdf->Cell(27.5, 0.3, ' ', 0, 0, 'C');
	    }

        $pdf->Output("DATA", "I");
    }










	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////



	
	




	
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////

	public function admin(){

		$ket['stat'] = "belum";
		$this->load->view('login_admin', $ket);

	}

	public function prosesLoginAdmin(){

		$user = $this->input->post('User');
		$pass = $this->input->post('Pass');

		$data = $this->model->GetAllAdmin();
		foreach ($data as $row){

			if (($user == $row['username']) && ($pass == $row['password'])) {
				redirect(base_url('utama/berandaAdmin'));
			}

		}

		$ket['stat'] = "gagal";
		$this->load->view('login_admin', $ket);
			
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////

	public function berandaAdmin(){

		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d', strtotime('+24 hours'));

		$data_pesanan = $this->model->GetAllPesananNotif();
		foreach ($data_pesanan as $row){
			if ($row['tanggal_berangkat'] == $tgl){

				$email_tujuan = $row['email'];

				$email_body =
		        '
			    <table align="center" style="border: 1px solid #cccccc;" cellpadding="0" cellspacing="0" width="600">

					<tr>
						<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
							<h1 style="color: white; font-family: Arial, sans-serif; font-size: 36px; padding: 25px 0 0 0;">PT. KERETA API KITA</h1>
						</td>
					</tr>

					<tr>
						<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;" align="center">
										<b>Besok Anda Harus Berangkat</b><br>
										<b>Dengan Jadwal</b>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td width="200" valign="top">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="left">
																ID Pesanan
															</td>
														</tr>
														<tr>
															<td style="padding: 10px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="left">
																Nama Kereta
															</td>
														</tr>
														<tr>
															<td style="padding: 10px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="left">
																Jurusan
															</td>
														</tr>
														<tr>
															<td style="padding: 10px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="left">
																Tanggal Berangkat / Jam
															</td>
														</tr>
													</table>
												</td>
												<td style="font-size: 0; line-height: 0;" width="20">
													&nbsp;
												</td>
												<td width="320" valign="top">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="left">
																: ' . $row['id_pesanan'] . '
															</td>
														</tr>
														<tr>
															<td style="padding: 10px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="left">
																: ' . $row['nama_kereta'] . '
															</td>
														</tr>
														<tr>
															<td style="padding: 10px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="left">
																: ' . $row['stasiun_awal'] . ' - ' . $row['stasiun_akhir'] . '
															</td>
														</tr>
														<tr>
															<td style="padding: 10px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="left">
																: ' . $row['tanggal_berangkat'] . ' / ' . $row['jam_berangkat'] . '
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td style="padding: 20px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;" align="justify">
										Tukarkan ID Pesanan dengan Tiket di stasiun keberangkatan. Pastikan anda tidak terlambat untuk jadwal keberangkatan, karena tidak ada toleransi untuk keterlambatan. Untuk info lainnya, kunjungi website kami di www.Tiket.com.
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<tr>
						<td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td align="left">
										<table border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" align="left">
													&reg; PT. Kereta Api Kita 2018
												</td>
											</tr>
										</table>
									</td>
									<td style="padding: 20px 0 30px 0;"></td>
								</tr>
							</table>
						</td>
					</tr>

				</table>

		        ';

		        $config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'ssl://smtp.googlemail.com',
				  'smtp_port' => 465,
				  'smtp_user' => 'dummy.ilkomupi@gmail.com',
				  'smtp_pass' => 'ilkomupi',
				  'mailtype' => 'html',
				  'charset' => 'iso-8859-1',
				  'wordwrap' => TRUE
				);

		        $this->load->library('email', $config);
		    	$this->email->set_newline("\r\n");
				$this->email->from('', 'PT Kereta Api Kita');
				$this->email->to($email_tujuan);
				$this->email->subject('Reminder');
				$this->email->message($email_body);
				$this->email->send();

				$this->model->updatePesananNotif($row['id_pesanan']);
			}
		}

		$argument['data'] = $this->model->GetAllJadwal();

		$this->load->view('template/header-admin');
		$this->load->view('beranda_admin', $argument);
		$this->load->view('template/footer-admin');

	}

	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////

	public function pemesanan(){

		$argument['data'] = $this->model->GetAllPemesan();

		$this->load->view('template/header-admin');
		$this->load->view('pemesanan_tiket', $argument);
		$this->load->view('template/footer-admin');

	}

	public function harga(){

		$data['harga'] = $this->model->SelectJadwalHarga()->row();
		$data['kelas'] = $this->model->GetAllKelas();

		$this->load->view('template/header-admin');
		$this->load->view('input_harga', $data);
		$this->load->view('template/footer-admin');

	}

	public function tambahJadwal(){

		$argument['data'] = $this->model->GetAllKereta();
		$argument['data2'] = $this->model->GetAllStasiun();

		$this->load->view('template/header-admin');
		$this->load->view('tambah_jadwal', $argument);
		$this->load->view('template/footer-admin');

	}

	public function updateJadwal($id){

		$data['jadwal'] = $this->model->selectJadwal($id)->row();
		$data['data'] = $this->model->GetAllKereta();
		$data['data2'] = $this->model->GetAllStasiun();
		$data_harga = $this->model->selectDataHarga($id);

		$i = 1;
		foreach ($data_harga as $row){
			$data['harga_' . $i] = $row['harga_dewasa'];
			$i++;
		}

		$this->load->view('template/header-admin');
		$this->load->view('update_jadwal', $data);
		$this->load->view('template/footer-admin');

	}

	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////

	public function prosesInsertJadwal(){

		$data['id_jadwal'] = null;
		$data['id_kereta'] = $this->input->post('Id');
		$data['tanggal_berangkat'] = $this->input->post('TanggalB');
		$data['tanggal_tiba'] = $this->input->post('TanggalT');
		$data['jam_berangkat'] = $this->input->post('JamB');
		$data['jam_tiba'] = $this->input->post('JamT');
		$data['stok_eko'] = 40;
		$data['stok_eko_ac'] = 36;
		$data['stok_bis'] = 30;
		$data['stok_eks'] = 26;
		$data['status'] = 0;
		$data['status_dipakai'] = 0;

		$tiba = $this->input->post('JamT');
		$berangkat = $this->input->post('JamB');
		if ($tiba >= $berangkat){
			$durasi = $tiba - $berangkat;
		} else {
			$berangkat = $berangkat - 12;
			$berangkat = 12 - $berangkat;
			$durasi = $berangkat + $tiba;
		}

		$data['durasi'] = $durasi;
		$data['id_stasiun_awal'] = $this->input->post('StasAwal');
		$data['id_stasiun_akhir'] = $this->input->post('StasAkhir');

		$this->model->insertJadwal($data);

		redirect(base_url('utama/harga'));
	}

	public function prosesInsertHarga(){

		$id = $this->input->post('id_jadwal');

		for ($i = 1; $i < 5; $i++){

			$data['id_harga'] = null;
			$data['id_jadwal'] = $id;
			$data['id_kelas'] = $this->input->post('id_kelas_' . $i);
			$data['harga_dewasa'] = $this->input->post('hd_' . $i);
			$data['harga_anak'] = $this->input->post('hd_' . $i) / 2;

			$this->model->insertHarga($data);

		}

		redirect(base_url('utama/berandaAdmin'));
	}

	public function prosesUpdateJadwal(){

		$nama = $this->input->post('Nama');
		$data_kereta = $this->model->GetAllKereta();
		$data['id_kereta'] = '1';
		foreach ($data_kereta as $row){

			if ($nama == $row['nama_kereta']) {

				$data['id_kereta'] = $row['id_kereta'];

			}

		}

		$data['id_jadwal'] = $this->input->post('Id');
		$data['tanggal_berangkat'] = $this->input->post('TanggalB');
		$data['tanggal_tiba'] = $this->input->post('TanggalT');
		$data['jam_berangkat'] = $this->input->post('JamB');
		$data['jam_tiba'] = $this->input->post('JamT');

		$tiba = $this->input->post('JamT');
		$berangkat = $this->input->post('JamB');
		if ($tiba >= $berangkat){
			$durasi = $tiba - $berangkat;
		} else {
			$berangkat = $berangkat - 12;
			$berangkat = 12 - $berangkat;
			$durasi = $berangkat + $tiba;
		}

		$data['durasi'] = $durasi;

		$data['durasi'] = $durasi;
		$data['id_stasiun_awal'] = $this->input->post('StasAwal');
		$data['id_stasiun_akhir'] = $this->input->post('StasAkhir');

		$this->model->updateJadwal($data);

		for ($i = 1; $i < 5; $i++){

			$data2['id_jadwal'] = $this->input->post('Id');
			$data2['id_kelas'] = $i;
			$data2['harga_dewasa'] = $this->input->post('Kelas_' . $i);
			$data2['harga_anak'] = $this->input->post('Kelas_' . $i) / 2;

			$this->model->updateHarga($data2);

		}

		redirect(base_url('utama/berandaAdmin'));
	}

	public function deleteJadwal($id){

		$this->model->deleteJadwal($id);
		redirect(base_url('utama/berandaAdmin'));

	}

	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////

	public function prosesKonfirmasi($id){

		$this->model->updateStatusBayar($id);

		redirect(base_url('utama/pemesanan'));
	}

	public function prosesPembatalan($id){

		date_default_timezone_set('Asia/Jakarta');
		$data['id_pembatalan'] = null;
		$data['id_pesanan'] = $id;
		$data['tanggal'] = date("Y-m-d");
		$data['oleh_user'] = 0;
		$data['oleh_admin'] = 1;

		$this->model->deletePesanan($id, $data);

		redirect(base_url('utama/pemesanan'));
	}

}

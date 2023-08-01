<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->library('pagination');
		$this->load->helper('cookie');
		$this->load->model('peminjaman_model');
		$this->load->model('pengadaan_model');
		$this->load->model('anggota_model');
		$this->load->model('buku_model');
	}

	public function index()
	{
		$batas = $this->peminjaman_model->peringatan()->result();
// INI NOTIFIKASI EMAIL
		for ($i = 0; $i < count($batas); $i++) {
		// Konfigurasi email
		$this->load->library('email');
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'adindanuorr01@gmail.com',  // Email gmail
            'smtp_pass'   => 'kkzprselmkspuzen',  // Password gmail
			"smtp_crypto"=> 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
		$this->email->initialize($config);

        // Email dan nama pengirim
        $this->email->from('no-reply@perpusstikes.com', 'perpusstikes.com');

        // Email penerima
        $this->email->to($batas[$i]->email); 

        // Lampiran email, isi dengan url/path file
        // $this->email->attach();

        // Subject email
        $this->email->subject('Reminder PINJAMAN BUKU PERPUS STIKES');

        // Isi email
        $this->email->message(
			'Hai ' . $batas[$i]->nama_lengkap . ', Batas Peminjaman Buku Telah Jatuh Tempo Hari ini, Mohon untuk Segera Mengembalikan Buku yang Dipinjam'
		   );

		   if ( $this->email->send() ) {
			echo 'Your Email has successfully been sent.';
		} else {
		
			$errors = $this->email->print_debugger();
			print_r($errors);
		}

        
	}

// INI NOTIFIKASI WA
		// for ($i = 0; $i < count($batas); $i++) {
		// 	$params = array(
		// 		'token' => 'ai5e8omucfpo68qi',
		// 		'to' => $batas[$i]->notelp,
		// 		'body' => 'Hai ' . $batas[$i]->nama_lengkap . ', Batas Peminjaman Buku Telah Jatuh Tempo Hari ini, Mohon untuk Segera Mengembalikan Buku yang Dipinjam'
		// 	);
		// 	$curl = curl_init();
		// 	curl_setopt_array($curl, array(
		// 		CURLOPT_URL => "https://api.ultramsg.com/instance49551/messages/chat",
		// 		CURLOPT_RETURNTRANSFER => true,
		// 		CURLOPT_ENCODING => "",
		// 		CURLOPT_MAXREDIRS => 10,
		// 		CURLOPT_TIMEOUT => 30,
		// 		CURLOPT_SSL_VERIFYHOST => 0,
		// 		CURLOPT_SSL_VERIFYPEER => 0,
		// 		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// 		CURLOPT_CUSTOMREQUEST => "POST",
		// 		CURLOPT_POSTFIELDS => http_build_query($params),
		// 		CURLOPT_HTTPHEADER => array(
		// 			"content-type: application/x-www-form-urlencoded"
		// 		),
		// 	));
		// 	$response = curl_exec($curl);
		// 	$err = curl_error($curl);

		// 	curl_close($curl);
		// 	if ($err) {
		// 		echo "cURL Error #:" . $err;
		// 	} else {

		// 	}

			// $data = array(
			// 	'peringatan' => '1'
			// );

			// $where = array(
			// 	'id_pinjam' => $batas[$i]->id_pinjam
			// );
			// $this->peminjaman_model->ubah_data($where, $data, 'peminjaman');
		// }

		$data['title'] = 'Dashboard';

		$data['jmlpinjam'] = $this->peminjaman_model->data()->num_rows();
		$data['jmlanggota'] = $this->anggota_model->data()->num_rows();
		$data['jmlpengadaan'] = $this->pengadaan_model->data()->num_rows();
		$data['jmlbuku'] = $this->buku_model->data()->num_rows();
		$data['buku_semua'] = $this->buku_model->data()->result();
		$data['top3buku'] = $this->peminjaman_model->top3buku()->result();
		$data['top3anggota'] = $this->peminjaman_model->top3anggota()->result();

		$data['yearnow'] = date('Y', strtotime('+0 year'));
		$data['previousyear'] = date('Y', strtotime('-1 year'));
		$data['twoyearago'] = date('Y', strtotime('-2 year'));

		$this->load->view('templates/header', $data);
		$this->load->view('home/index');
		$this->load->view('templates/footer');
	}





	public function getFilterTahun()
	{
		$tahun = $this->input->post('tahun');

		//Januari
		$januari = 'January';
		$last_januari = date('Y-m-t', strtotime($tahun . '-' . $januari . '-01'));
		$first_januari = date('Y-m-01', strtotime($tahun . '-' . $januari . '-01'));
		$jmlpinjamJanuari = $this->peminjaman_model->jmlperbulan($first_januari, $last_januari)->num_rows();

		//Februari
		$februari = 'February';
		$last_februari = date('Y-m-t', strtotime($tahun . '-' . $februari . '-01'));
		$first_februari = date('Y-m-01', strtotime($tahun . '-' . $februari . '-01'));
		$jmlpinjamFebruari = $this->peminjaman_model->jmlperbulan($first_februari, $last_februari)->num_rows();

		//Maret
		$maret = 'March';
		$last_maret = date('Y-m-t', strtotime($tahun . '-' . $maret . '-01'));
		$first_maret = date('Y-m-01', strtotime($tahun . '-' . $maret . '-01'));
		$jmlpinjamMaret = $this->peminjaman_model->jmlperbulan($first_maret, $last_maret)->num_rows();

		//april
		$april = 'April';
		$last_april = date('Y-m-t', strtotime($tahun . '-' . $april . '-01'));
		$first_april = date('Y-m-01', strtotime($tahun . '-' . $april . '-01'));
		$jmlpinjamApril = $this->peminjaman_model->jmlperbulan($first_april, $last_april)->num_rows();

		//mei
		$mei = 'May';
		$last_mei = date('Y-m-t', strtotime($tahun . '-' . $mei . '-01'));
		$first_mei = date('Y-m-01', strtotime($tahun . '-' . $mei . '-01'));
		$jmlpinjamMei = $this->peminjaman_model->jmlperbulan($first_mei, $last_mei)->num_rows();

		//juni
		$juni = 'June';
		$last_juni = date('Y-m-t', strtotime($tahun . '-' . $juni . '-01'));
		$first_juni = date('Y-m-01', strtotime($tahun . '-' . $juni . '-01'));
		$jmlpinjamJuni = $this->peminjaman_model->jmlperbulan($first_juni, $last_juni)->num_rows();

		//juli
		$juli = 'July';
		$last_juli = date('Y-m-t', strtotime($tahun . '-' . $juli . '-01'));
		$first_juli = date('Y-m-01', strtotime($tahun . '-' . $juli . '-01'));
		$jmlpinjamJuli = $this->peminjaman_model->jmlperbulan($first_juli, $last_juli)->num_rows();

		//agustus
		$agustus = 'August';
		$last_agustus = date('Y-m-t', strtotime($tahun . '-' . $agustus . '-01'));
		$first_agustus = date('Y-m-01', strtotime($tahun . '-' . $agustus . '-01'));
		$jmlpinjamAgustus = $this->peminjaman_model->jmlperbulan($first_agustus, $last_agustus)->num_rows();

		//september
		$september = 'September';
		$last_september = date('Y-m-t', strtotime($tahun . '-' . $september . '-01'));
		$first_september = date('Y-m-01', strtotime($tahun . '-' . $september . '-01'));
		$jmlpinjamSeptember = $this->peminjaman_model->jmlperbulan($first_september, $last_september)->num_rows();

		//oktober
		$oktober = 'October';
		$last_oktober = date('Y-m-t', strtotime($tahun . '-' . $oktober . '-01'));
		$first_oktober = date('Y-m-01', strtotime($tahun . '-' . $oktober . '-01'));
		$jmlpinjamOktober = $this->peminjaman_model->jmlperbulan($first_oktober, $last_oktober)->num_rows();

		//november
		$november = 'November';
		$last_november = date('Y-m-t', strtotime($tahun . '-' . $november . '-01'));
		$first_november = date('Y-m-01', strtotime($tahun . '-' . $november . '-01'));
		$jmlpinjamNovember = $this->peminjaman_model->jmlperbulan($first_november, $last_november)->num_rows();

		//desember
		$desember = 'December';
		$last_desember = date('Y-m-t', strtotime($tahun . '-' . $desember . '-01'));
		$first_desember = date('Y-m-01', strtotime($tahun . '-' . $desember . '-01'));
		$jmlpinjamDesember = $this->peminjaman_model->jmlperbulan($first_desember, $last_desember)->num_rows();


		$data = array(
			'jmlpinjamJanuari' => $jmlpinjamJanuari,
			'jmlpinjamFebruari' => $jmlpinjamFebruari,
			'jmlpinjamMaret' => $jmlpinjamMaret,
			'jmlpinjamApril' => $jmlpinjamApril,
			'jmlpinjamMei' => $jmlpinjamMei,
			'jmlpinjamJuni' => $jmlpinjamJuni,
			'jmlpinjamJuli' => $jmlpinjamJuli,
			'jmlpinjamAgustus' => $jmlpinjamAgustus,
			'jmlpinjamSeptember' => $jmlpinjamSeptember,
			'jmlpinjamOktober' => $jmlpinjamOktober,
			'jmlpinjamNovember' => $jmlpinjamNovember,
			'jmlpinjamDesember' => $jmlpinjamDesember,
		);
		echo json_encode($data);
	}
}

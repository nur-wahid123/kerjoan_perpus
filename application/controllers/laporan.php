<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
    $this->load->model('user_model');
  }

  public function pengadaan()
  {
    $data['title'] = 'Laporan Pengadaan';

    $this->load->view('templates/header', $data);
    $this->load->view('pengadaan/laporan');
    $this->load->view('templates/footer');
  }

  public function peminjaman()
  {
    $data['title'] = 'Laporan Peminjaman';

    $this->load->view('templates/header', $data);
    $this->load->view('peminjaman/laporan');
    $this->load->view('templates/footer');
  }

  public function kartu_pdf()
  {

    $id = $this->input->post('idang');
    $data['title'] = 'Kartu Anggota';

    $where = array('id_anggota' => $id);
    $data['data'] = $this->anggota_model->detail_data($where, 'anggota')->result();
    $data['data2'] = $this->user_model->detail_data($where, 'pengguna');

    $usr = $data['data2']->row()->nama;
    $pwd = $data['data2']->row()->pass;

    $this->load->library('ciqrcode');

    $params['data'] = "www." . $usr . "-" . $pwd . ".com";
    $params['level'] = 'H';
    $params['size'] = 10;
    $params['savename'] = FCPATH . "assets/qrcode/" . $id . '-qr.jpg';
    $this->ciqrcode->generate($params);

    $data['judul'] = 'Kartu Anggota';
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [265, 168]]);
    ob_start();
    $html = $this->load->view('laporan/kartu_pdf', $data, true);
    $mpdf->WriteHTML($html);
    ob_clean();
    $tgl = date('Ymd_his');
    $namaFile = 'kartu_' . $id . '-' . $tgl . '.pdf';
    $mpdf->Output($namaFile, 'D');
  }

  public function pengadaan_pdf()
  {

    $tglawal = $this->input->post('tglawal');
    $tglakhir = $this->input->post('tglakhir');

    if ($tglawal != '' && $tglakhir != '') {
      $data['data'] = $this->pengadaan_model->lapdata($tglawal, $tglakhir)->result();
    } else {
      $data['data'] = $this->pengadaan_model->dataJoin()->result();
    }

    $data['tglawal'] = $tglawal;
    $data['tglakhir'] = $tglakhir;

    $data['judul'] = 'Laporan Pengadaan';
    $mpdf = new \Mpdf\Mpdf();
    ob_start();
    $html = $this->load->view('laporan/pengadaan_pdf', $data, true);
    $mpdf->WriteHTML($html);
    ob_clean();
    $tgl = date('Ymd_his');
    $namaFile = 'Pengadaan_' . $tgl . '.pdf';
    $mpdf->Output($namaFile, 'D');
  }

  public function peminjaman_pdf()
  {
    $tglawal = $this->input->post('tglawal');
    $tglakhir = $this->input->post('tglakhir');

    if ($tglawal != '' && $tglakhir != '') {
      $data['data'] = $this->peminjaman_model->lapdata($tglawal, $tglakhir)->result();
    } else {
      $data['data'] = $this->peminjaman_model->dataJoin()->result();
    }

    $data['tglawal'] = $tglawal;
    $data['tglakhir'] = $tglakhir;

    $data['judul'] = 'Laporan Peminjaman';
    $mpdf = new \Mpdf\Mpdf();
    ob_start();
    $html = $this->load->view('laporan/peminjaman_pdf', $data, true);
    $mpdf->WriteHTML($html);
    ob_clean();
    $tgl = date('Ymd_his');
    $namaFile = 'Peminjaman_' . $tgl . '.pdf';
    $mpdf->Output($namaFile, 'D');
  }
}

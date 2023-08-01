<?php
// application/controllers/Cronjob.php

class Cronjob extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        // Load necessary libraries and helpers here (if needed).
    }

    public function dailyTask()
    {
        $this->load->library('email');
        $config = array(
            'protocol' => 'smtp',             // Use 'smtp' for using SMTP server
            'smtp_host' => 'web8-cpn.neohosting.id',  // Replace with your SMTP server hostname
            'smtp_port' => '465',             // Replace with your SMTP server port (e.g., 587)
            'smtp_user' => '_mainaccount@perpusstikesabdurahmanplg.my.id',   // Replace with your domain email username
            'smtp_pass' => 'Yq3t__2sr%',   // Replace with your domain email password
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'wordwrap' => TRUE
        );
        $this->email->initialize($config);
        
        $oke = $this->user_model->telat_pinjam();
        $temp_email = '';
        foreach ($oke as $account) {
            $to_email = $account->email;
            if ($to_email != $temp_email) {
                $temp_email = $to_email;
                $subject = 'Peringatan Jatuh Tempo Peminjaman';
                $message = "Halo $account->name \nKami harap email ini menemukan Anda dalam keadaan sehat dan baik-baik saja.".
                '\nMelalui email ini, kami ingin mengingatkan bahwa Anda memiliki buku yang saat ini sedang melewati batas waktu peminjaman. Kami mengingatkan pentingnya mengembalikan buku tepat waktu agar buku tersebut dapat tersedia untuk peminjaman oleh anggota lain.'
                .'\nBerdasarkan catatan kami, Anda meminjam buku dengan detail sebagai berikut:\n';
                foreach ($oke as $key ) {
                    if ($temp_email==$key->email) {
                        $message .= "\n\nJudul Buku\t: $key->judul";
                        $message .= "\nJatuh Tempo\t: $key->tempo";
                    }
                }
                $message .= "\nKami mohon kerjasamanya untuk segera mengembalikan buku tersebut ke perpustakaan kami agar kami dapat terus memberikan layanan yang baik kepada semua anggota perpustakaan.";
                $message .= "Terima kasih atas perhatiannya dan kami harap untuk segera menerima kembalian buku dari Anda.\n\nSalam hangat,";
                $message .= "\nPerpustakaan STIKES Abdurahman";
                $this->email->from('_mainaccount@perpusstikesabdurahmanplg.my.id', 'Perpustakaan STIKES Abdurahman');
                $this->email->to($to_email);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();
            }
        }
        // Your cron job task code goes here.
        // For example, you can update a database, send emails, etc.
        // Avoid actions that require user interaction or session data.

        // Log the task execution (optional).
        log_message('info', 'Cron job executed successfully.');

        // Output to the console (only for debugging purposes, won't be seen by cron job).
        echo 'Cron job executed successfully.';
    }
}

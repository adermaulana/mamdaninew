<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\HasilTes;

class MailController extends Controller
{
    //
    public function sendMail($id)
    {

        $pengumuman = HasilTes::find($id);
        $jurusan = $pengumuman->hasil_jurusan;
        $nama = $pengumuman->peserta->name;
        $email = $pengumuman->peserta->email;

        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'rekomendasijurusan@gmail.com';   //  sender username
            $mail->Password = 'zcet axnx uddz glpk';       // sender password
            $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
            $mail->Port = 465;                          // port - 587/465

            $mail->setFrom('rekomendasijurusan@gmail.com', 'rekomendasijurusan@gmail.com');
            $mail->addAddress($email);

            $mail->addReplyTo('rekomendasijurusan@gmail.com', 'rekomendasijurusan@gmail.com');


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = 'Info Rekomendasi Jurusan';
            $mail->Body    = '<b>' . $nama . '</b>, Anda Cocok di Jurusan <b>' . $jurusan . '</b>' ;

            // $mail->AltBody = plain text version of email body;

            $mail->send();

            return redirect('/dashboard/minat')
            ->with('success','Berhasil Mengirim Ke Email Peserta!');

        } catch (Exception $e) {
            return back()->with('error','Message could not be sent.');
        }

    }
}

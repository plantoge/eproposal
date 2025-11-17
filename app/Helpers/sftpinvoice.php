<?php 

namespace app\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpseclib\Net\SFTP;

class sftpinvoice
{
    public static function upload($requestfile)
    {
        // untuk menjalankan ftp ini, di server tujuan harus install apk vsftpd
        // aktifkan write_enable=YES di file nano /etc/vsftpd.conf
        // Storage::disk('sftp')->delete('folder_path/file_name.jpg'); //delete file
        // return storage::disk('sftp')->download('/apk_keuanganv2/tagihan_checklist/bast/'.$nama_bast); //download file
        $disk             = Storage::disk('sftp'); //sftp
            $file         = $requestfile;
            $randomName   = Str::random(40);
            $filePath     = env('SFTP_DIRECTORY') . '/tagihan_checklist/invoice/' . $randomName .'.'. $file->getClientOriginalExtension(); // Menentukan jalur dan nama file tujuan di server FTP
            $fileContents = file_get_contents($file->getRealPath()); // Membaca isi file menjadi string
            $nama_file    = $randomName .'.'. $file->getClientOriginalExtension();
        $disk->put($filePath, $fileContents);

        return $nama_file;
    }

    public static function reupload($filedelete, $requestfile)
    {
        // Delete File Lama
        $disk     = Storage::disk('sftp');
        $filePath = env('SFTP_DIRECTORY') . '/tagihan_checklist/invoice/' . $filedelete;
        $disk->delete($filePath);

        // upload file baru
        $disk             = Storage::disk('sftp'); //sftp
            $file         = $requestfile;
            $randomName   = Str::random(40);
            $filePath     = env('SFTP_DIRECTORY') . '/tagihan_checklist/invoice/' . $randomName .'.'. $file->getClientOriginalExtension(); // Menentukan jalur dan nama file tujuan di server FTP
            $fileContents = file_get_contents($file->getRealPath()); // Membaca isi file menjadi string
            $nama_file    = $randomName .'.'. $file->getClientOriginalExtension();
        $disk->put($filePath, $fileContents);

        return $nama_file;
    }

    public static function delete($filedelete)
    {
        $disk     = Storage::disk('sftp');
        $filePath = env('SFTP_DIRECTORY') . '/tagihan_checklist/invoice/' . $filedelete;
        return $disk->delete($filePath);
    }

    public static function showfile($requestfile)
    {
        // Inisialisasi koneksi SFTP
        $sftp = new SFTP('192.168.1.128', 39615);
        if (!$sftp->login('apkKeuangan', 'aplikasiKeuangan123')) {
            // Penanganan kesalahan jika gagal masuk
            abort(500, 'Gagal masuk ke server NAS');
        }

        // Path file PDF di server NAS
        $pdfPath =  env('SFTP_ROOT') .'/'. env('SFTP_DIRECTORY') .'/tagihan_checklist/invoice/' . $requestfile;

        // Baca isi file PDF menggunakan SFTP
        $pdfContent = $sftp->get($pdfPath);

        // Tampilkan file PDF di browser
        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$requestfile.'"',
        ]);
    }

    // ------------------------------------------------------------------------------------------------------------------------------

    public static function hutangupload($requestfile)
    {
        // untuk menjalankan ftp ini, di server tujuan harus install apk vsftpd
        // aktifkan write_enable=YES di file nano /etc/vsftpd.conf
        // Storage::disk('sftp')->delete('folder_path/file_name.jpg'); //delete file
        // return storage::disk('sftp')->download('/apk_keuanganv2/tagihan_checklist/bast/'.$nama_bast); //download file
        $disk             = Storage::disk('sftp'); //sftp
            $file         = $requestfile;
            $randomName   = Str::random(40);
            $filePath     = env('SFTP_DIRECTORY') . '/hutang/invoice/' . $randomName .'.'. $file->getClientOriginalExtension(); // Menentukan jalur dan nama file tujuan di server FTP
            $fileContents = file_get_contents($file->getRealPath()); // Membaca isi file menjadi string
            $nama_file    = $randomName .'.'. $file->getClientOriginalExtension();
        $disk->put($filePath, $fileContents);

        return $nama_file;
    }

    public static function hutangreupload($filedelete, $requestfile)
    {
        // Delete File Lama
        $disk     = Storage::disk('sftp');
        $filePath = env('SFTP_DIRECTORY') . '/hutang/invoice/' . $filedelete;
        $disk->delete($filePath);

        // upload file baru
        $disk             = Storage::disk('sftp'); //sftp
            $file         = $requestfile;
            $randomName   = Str::random(40);
            $filePath     = env('SFTP_DIRECTORY') . '/hutang/invoice/' . $randomName .'.'. $file->getClientOriginalExtension(); // Menentukan jalur dan nama file tujuan di server FTP
            $fileContents = file_get_contents($file->getRealPath()); // Membaca isi file menjadi string
            $nama_file    = $randomName .'.'. $file->getClientOriginalExtension();
        $disk->put($filePath, $fileContents);

        return $nama_file;
    }

    public static function hutangdelete($filedelete)
    {
        $disk     = Storage::disk('sftp');
        $filePath = env('SFTP_DIRECTORY') . '/hutang/invoice/' . $filedelete;
        return $disk->delete($filePath);
    }

    public static function hutangshowfile($requestfile)
    {
        // Inisialisasi koneksi SFTP
        $sftp = new SFTP('192.168.1.128', 39615);
        if (!$sftp->login('apkKeuangan', 'aplikasiKeuangan123')) {
            // Penanganan kesalahan jika gagal masuk
            abort(500, 'Gagal masuk ke server NAS');
        }

        // Path file PDF di server NAS
        $pdfPath =  env('SFTP_ROOT') .'/'. env('SFTP_DIRECTORY') .'/hutang/invoice/' . $requestfile;

        // Baca isi file PDF menggunakan SFTP
        $pdfContent = $sftp->get($pdfPath);

        // Tampilkan file PDF di browser
        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$requestfile.'"',
        ]);
    }
}
<?php 

namespace app\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Filestorage
{
    public static function upload($direktori, $requestfile)
    {
        // untuk menjalankan ftp ini, di server tujuan harus install apk vsftpd
        // aktifkan write_enable=YES di file nano /etc/vsftpd.conf
        // Storage::disk('sftp')->delete('folder_path/file_name.jpg'); //delete file
        // return storage::disk('sftp')->download('/apk_keuanganv2/tagihan_checklist/bast/'.$nama_bast); //download file
        if ($requestfile) {

            $disk                = Storage::disk('public'); //sftp //s3 //local
                $file            = $requestfile;
                $namenekstension = date('dmYHis').'_'.$file->getClientOriginalName();
                $filePath        = $direktori. '/' . $namenekstension; // $file->getClientOriginalExtension(); // Menentukan jalur dan nama file tujuan di server FTP / local
                $fileContents    = file_get_contents($file->getRealPath()); // Membaca isi file menjadi string
            $disk->put($filePath, $fileContents);

            return $namenekstension;   
        }
    }

    public static function delete($direktori, $requestfile)
    {
        $filePath = $direktori.'/'.$requestfile;
        $disk     = Storage::disk('public');
        $disk->delete($filePath);
    }

    // public static function reupload($directorynfile, $requestfile, $direktori)
    // {
    //     // Delete File Lama
    //     $disk     = Storage::disk('local');
    //     $filePath = env('SFTP_DIRECTORY') . $directorynfile;
    //     $disk->delete($filePath);

    //     // upload file baru
    //     $disk             = Storage::disk('sftp'); //sftp
    //         $file         = $requestfile;
    //         $randomName   = Str::random(40);
    //         $filePath     = env('SFTP_DIRECTORY') . $direktori . $randomName .'.'. $file->getClientOriginalExtension(); // Menentukan jalur dan nama file tujuan di server FTP
    //         $fileContents = file_get_contents($file->getRealPath()); // Membaca isi file menjadi string
    //         $nama_file    = $randomName .'.'. $file->getClientOriginalExtension();
    //     $disk->put($filePath, $fileContents);

    //     return $nama_file;
    // } 
}
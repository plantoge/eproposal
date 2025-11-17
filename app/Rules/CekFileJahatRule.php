<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CekFileJahatRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Ambil konten file
        $fileContent = file_get_contents($value->path());

        // Daftar karakter berbahaya
        $maliciousChars = [
            '\\/bin\\/bash',
            '__HALT_COMPILER',
            'Guzzle',
            'Laravel',
            'Monolog',
            'PendingRequest',
            '\\<script',
            'ThinkPHP',
            'phar',
            'phpinfo',
            '\\<\\?php',
            '\\$_GET',
            '\\$_POST',
            '\\$_SESSION',
            '\\$_REQUEST',
            'JavaScript',
            'alert',
            'whoami',
            'python',
            'composer',
            'passthru',
            'shell_exe',
            'PHPShell',
            'FilesMan',
            'loggerSystem',
            // ''
        ];

        // Cek apakah file mengandung karakter berbahaya
        foreach ($maliciousChars as $char) {
            if (strpos($fileContent, $char) !== false) {
                return false; // Jika ditemukan karakter berbahaya
            }
        }

        return true; // Jika file aman
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '<br> Bahaya, file mengandung konten jahat!';
    }
}

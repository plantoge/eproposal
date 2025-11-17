<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiKontakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_kontak', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('telepon')->nullable();
            $table->string('fax')->nullable();
            $table->string('callcenter')->nullable();
            $table->string('hotline')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('deskripsi_alamat')->nullable();
            $table->string('cp_kaji_etik')->nullable();
            $table->string('cp_pks')->nullable();
            $table->string('cp_mta')->nullable();
            $table->string('cp_kerahasiaan')->nullable();
            $table->string('wa_kaji_etik')->nullable();
            $table->string('wa_pks')->nullable();
            $table->string('wa_mta')->nullable();
            $table->string('wa_kerahasiaan')->nullable();
            $table->string('pemilik_rekening')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('logo_bank')->nullable();
            $table->string('deskripsi_biaya')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi_kontak');
    }
}

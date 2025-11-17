<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanPenelitian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_penelitian', function (Blueprint $table) {
            $table->char('PENGAJUAN_PENELITIAN_ID', 50)->primary();
            $table->string('PENGAJUAN_PENELITIAN_KODE')->nullable();
            $table->string('PENGAJUAN_PENELITIAN_PENELITI_UTAMA')->nullable();
            $table->text('PENGAJUAN_PENELITIAN_TIM_PENELITI')->nullable();
            $table->text('PENGAJUAN_PENELITIAN_JUDUL_PENELITIAN')->nullable();
            $table->string('PENGAJUAN_PENELITIAN_SURAT_PENGANTAR')->nullable();
            $table->string('PENGAJUAN_PENELITIAN_PROPOSAL_PENELITIAN')->nullable();
            $table->string('PENGAJUAN_PENELITIAN_KAJI_ETIK')->nullable();
            $table->string('PENGAJUAN_PENELITIAN_SERTIFIKAT_GCP')->nullable();
            $table->string('PENGAJUAN_PENELITIAN_LAPORAN_PENELITIAN')->nullable();
            $table->string('PENGAJUAN_PENELITIAN_RAW_DATA_PENELITIAN')->nullable();
            $table->string('PENGAJUAN_PENELITIAN_INSTITUSI_ASAL')->nullable();
            $table->string('PENGAJUAN_PENELITIAN_EMAIL')->nullable();
            $table->string('PENGAJUAN_PENELITIAN_PHONE')->nullable();
            $table->char('PENGAJUAN_PENELITIAN_USER_ID', 50);
            
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_penelitian');
    }
}

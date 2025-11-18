<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::statement('CREATE SCHEMA IF NOT EXISTS eproposal');

        Schema::create('eproposal.pengajuan_penelitian', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('pengajuan_penelitian_kode')->nullable();
            $table->string('pengajuan_penelitian_peneliti_utama')->nullable();
            $table->text('pengajuan_penelitian_tim_peneliti')->nullable();
            $table->text('pengajuan_penelitian_judul_penelitian')->nullable();
            $table->string('pengajuan_penelitian_surat_pengantar')->nullable();
            $table->string('pengajuan_penelitian_proposal_penelitian')->nullable();
            $table->string('pengajuan_penelitian_kaji_etik')->nullable();
            $table->string('pengajuan_penelitian_sertifikat_gcp')->nullable();
            $table->string('pengajuan_penelitian_laporan_penelitian')->nullable();
            $table->string('pengajuan_penelitian_raw_data_penelitian')->nullable();
            $table->string('pengajuan_penelitian_institusi_asal')->nullable();
            $table->string('pengajuan_penelitian_email')->nullable();
            $table->string('pengajuan_penelitian_phone')->nullable();
            $table->uuid('pengajuan_penelitian_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('eproposal.pengajuan_penelitian');
        DB::statement('DROP TABLE IF EXISTS eproposal.pengajuan_penelitian CASCADE');
    }
}

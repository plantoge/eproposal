<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal', function (Blueprint $table) {
            $table->char('PROPOSAL_ID', 50)->primary();
            $table->bigInteger('PROPOSAL_NOMOR')->nullable();
            $table->string('PROPOSAL_KODE')->nullable();
            $table->string('PROPOSAL_PENELITI_UTAMA')->nullable();
            $table->text('PROPOSAL_TIM_PENELITI')->nullable();
            $table->text('PROPOSAL_JUDUL_PENELITIAN')->nullable();
            $table->string('PROPOSAL_SURAT_PENGANTAR')->nullable();
            $table->string('PROPOSAL_PROPOSAL_PENELITIAN')->nullable();
            $table->string('PROPOSAL_KAJI_ETIK')->nullable();
            $table->string('PROPOSAL_KAJI_ETIK_RSPI')->nullable();
            $table->string('PROPOSAL_SERTIFIKAT_GCP')->nullable();
            // $table->string('PROPOSAL_LAPORAN_PENELITIAN')->nullable();
            // $table->string('PROPOSAL_RAW_DATA_PENELITIAN')->nullable();
            $table->string('PROPOSAL_INSTITUSI_ASAL')->nullable();
            $table->string('PROPOSAL_EMAIL')->nullable();
            $table->string('PROPOSAL_PHONE')->nullable();
            $table->char('PROPOSAL_USER_ID', 50);
            $table->string('PROPOSAL_TAHAPAN')->nullable();
            $table->string('PROPOSAL_STATUS')->nullable();
            $table->text('PROPOSAL_SURAT_TANGGAPAN')->nullable();
            $table->text('PROPOSAL_SURAT_PENOLAKAN')->nullable();
            $table->text('PROPOSAL_PKS')->nullable();
            $table->text('PROPOSAL_MTA')->nullable();
            $table->text('PROPOSAL_KERAHASIAAN')->nullable();
            $table->text('PROPOSAL_BUKTI_BAYAR')->nullable();
            $table->text('PROPOSAL_IZIN_PENELITIAN')->nullable();
            $table->text('PROPOSAL_IZIN_PENELITIAN_DRAFT')->nullable();
            
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
        Schema::dropIfExists('proposal');
    }
}

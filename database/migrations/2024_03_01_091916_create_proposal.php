<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::statement('CREATE SCHEMA IF NOT EXISTS eproposal');
        
        Schema::create('eproposal.proposal', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->bigInteger('proposal_nomor')->nullable();
            $table->string('proposal_kode')->nullable();
            $table->string('proposal_peneliti_utama')->nullable();
            $table->text('proposal_tim_peneliti')->nullable();
            $table->text('proposal_judul_penelitian')->nullable();
            $table->string('proposal_surat_pengantar')->nullable();
            $table->string('proposal_proposal_penelitian')->nullable();
            $table->string('proposal_kaji_etik')->nullable();
            $table->string('proposal_sertifikat_gcp')->nullable();
            $table->string('proposal_kaji_etik_rspi')->nullable();
            $table->text('proposal_pks')->nullable();
            $table->text('proposal_mta')->nullable();
            $table->text('proposal_kerahasiaan')->nullable();
            $table->text('proposal_bukti_bayar')->nullable();
            $table->text('proposal_laporan_penelitian')->nullable();
            $table->text('proposal_raw_data_penelitian')->nullable();
            $table->text('proposal_izin_penelitian_draft')->nullable();
            $table->text('proposal_izin_penelitian')->nullable();
            $table->string('proposal_institusi_asal')->nullable();
            $table->text('proposal_surat_tanggapan')->nullable();
            $table->text('proposal_surat_penolakan')->nullable();
            $table->string('proposal_tahapan')->nullable();
            $table->string('proposal_status')->nullable();
            $table->string('proposal_email')->nullable();
            $table->string('proposal_phone')->nullable();
            $table->uuid('proposal_user_id')->nullable();
            $table->timestamp('proposal_tanggal_presentasi')->nullable();
            $table->text('proposal_kategori_presentasi')->nullable();
            $table->text('proposal_media_presentasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('eproposal.proposal');
        DB::statement('DROP TABLE IF EXISTS eproposal.proposal CASCADE');
    }
}

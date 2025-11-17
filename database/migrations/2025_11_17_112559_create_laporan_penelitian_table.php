<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPenelitianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE SCHEMA IF NOT EXISTS eproposal');
        
        Schema::create('eproposal.laporan_penelitian', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->uuid('proposal_id', 50)->nullable();
            $table->string('penelitian_laporan', 255)->nullable();
            $table->string('penelitian_raw_data', 255)->nullable();
            $table->string('penelitian_surat_izin', 255)->nullable();
            $table->string('penelitian_user_id', 255)->nullable();
            $table->string('penelitian_status', 255)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eproposal.laporan_penelitian');
    }
}

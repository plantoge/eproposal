<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTraceTrackProposal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE SCHEMA IF NOT EXISTS eproposal');
        
        Schema::create('eproposal.trace_track_proposal', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->text('track_proposal_id', 50)->nullable();
            $table->string('track_tahapan', 50)->nullable();
            $table->string('track_status', 50)->nullable();
            $table->text('track_keterangan', 50)->nullable();
            $table->uuid('track_user_id', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eproposal.trace_track_proposal');
    }
}

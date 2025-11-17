<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('trace_track_proposal', function (Blueprint $table) {
            $table->char('TRACK_ID', 50)->primary();
            $table->text('TRACK_PROPOSAL_ID', 50)->nullable();
            $table->string('TRACK_TAHAPAN', 50)->nullable();
            $table->string('TRACK_STATUS', 50)->nullable();
            $table->text('TRACK_KETERANGAN', 50)->nullable();
            $table->char('TRACK_USER_ID', 50);
            
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
        Schema::dropIfExists('trace_track_proposal');
    }
}

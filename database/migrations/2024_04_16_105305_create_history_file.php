<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHistoryFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE SCHEMA IF NOT EXISTS eproposal');
        
        Schema::create('eproposal.history_file', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->text('history_proposal_id', 50)->nullable();
            $table->text('history_file', 50)->nullable();
            $table->text('history_keterangan', 50)->nullable();
            $table->uuid('history_user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('eproposal.history_file');
        DB::statement('DROP TABLE IF EXISTS eproposal.history_file CASCADE');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('history_file', function (Blueprint $table) {
            $table->char('HISTORY_ID', 50)->primary();
            $table->text('HISTORY_PROPOSAL_ID', 50)->nullable();
            $table->text('HISTORY_FILE', 50)->nullable();
            $table->text('HISTORY_KETERANGAN', 50)->nullable();
            $table->char('HISTORY_USER_ID', 50);
            
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
        Schema::dropIfExists('history_file');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHistoryRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apprentice_id')->unsigned();
            $table->date('fecha');
            $table->foreign('apprentice_id')->references('id')->on('apprentices')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_records');
    }
}

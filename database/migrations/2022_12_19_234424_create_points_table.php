<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->string('event', 250)->nullable();
            $table->double('point', 10, 2)->nullable();
            $table->string('file', 250);
            $table->date('event_date')->default(NULL)->nullable();
            $table->tinyInteger('status');
            $table->unsignedBigInteger('checked_by')->nullable();
           $table->date('checked_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
}

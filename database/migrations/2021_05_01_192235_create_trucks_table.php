<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('name');
            $table->integer('owners_count')->nullable();
            $table->text('comments')->nullable();
            $table->unsignedBigInteger('truckmaker_id');
            $table->foreign('truckmaker_id')
                ->references('id')->on('truckmakers')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trucks');
    }
}

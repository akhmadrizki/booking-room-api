<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('image_ruangan')->nullable();
            $table->string('nama_ruangan');
            $table->char('kapasitas_ruangan', 10)->nullable()->default(null);
            $table->char('proyektor', 10)->nullable()->default(null);
            $table->char('panggung', 10)->nullable()->default(null);
            $table->string('status_ruangan');
            $table->unsignedInteger('category_id')->nullable()->default(null);
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
        Schema::dropIfExists('rooms');
    }
}

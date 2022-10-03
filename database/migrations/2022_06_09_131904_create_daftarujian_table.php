<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarujianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftarujian', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->date('tgl_daftar')->nullable();
            $table->string('sabuk')->nullable();
            $table
                ->foreignId('ujian_id')
                ->constrained('ujian')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreignId('atlet_id')
                ->constrained('atlet')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('daftarujian');
    }
}
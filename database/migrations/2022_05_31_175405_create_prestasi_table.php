<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_atlet')->nullable();
            $table->string('name')->nullable();
            $table->date('nama_kejuaraan')->nullable();
            $table->string('tingkat')->nullable();
            $table->string('kelas')->nullable();
            $table->string('kategori')->nullable();
            $table->string('perolehan')->nullable();
            $table->date('tgl_acara')->nullable();
            $table->string('lokasi')->nullable();
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
        Schema::dropIfExists('prestasi');
    }
}
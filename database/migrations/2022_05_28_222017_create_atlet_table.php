<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atlet', function (Blueprint $table) {
            $table->id();
            $table->string('kode_atlet')->nullable();
            $table->string('nisn')->nullable();
            $table->string('name')->nullable();
            $table->date('tgl_registrasi')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('bb')->nullable();
            $table->string('tb')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('tingkat_sabuk')->nullable();
            $table->string('kelas')->nullable();
            $table
                ->foreignId('user_id')
                ->constrained('users')
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
        Schema::dropIfExists('atlet');
    }
}
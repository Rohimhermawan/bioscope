<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Participants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('cabang')->nullable();
            $table->string('sekolah')->nullable();
            $table->string('pembimbing')->nullable();
            $table->string('nama1')->nullable();
            $table->string('domisili1')->nullable();
            $table->integer('kelas1', false, true)->lenght(2)->nullable();
            $table->string('alamat1')->nullable();
            $table->string('telepon1')->nullable();
            $table->string('line1')->nullable();
            $table->string('email1')->unique()->nullable();
            $table->string('foto1')->nullable();
            $table->string('kartu1')->nullable();
            $table->string('nama2')->nullable();
            $table->string('domisili2')->nullable();
            $table->integer('kelas2', false, true)->lenght(2)->nullable();
            $table->string('alamat2')->nullable();
            $table->string('telepon2')->nullable();
            $table->string('line2')->nullable();
            $table->string('email2')->unique()->nullable();
            $table->string('foto2')->nullable();
            $table->string('kartu2')->nullable();
            $table->string('nama3')->nullable();
            $table->string('domisili3')->nullable();
            $table->integer('kelas3', false, true)->lenght(2)->nullable();
            $table->string('alamat3')->nullable();
            $table->string('telepon3')->nullable();
            $table->string('line3')->nullable();
            $table->string('email3')->unique()->nullable();
            $table->string('foto3')->nullable();
            $table->string('kartu3')->nullable();
            $table->string('bukti')->nullable();
            $table->string('pengirim')->nullable();
            $table->string('penerima')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        //
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_lelangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->constrained('tb_barangs')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tgl_lelang');
            $table->integer('harga_akhir');
            $table->foreignId('id_user')->constrained('tb_masyarakats')->onUpdate('cascade');
            $table->foreignId('id_petugas')->constrained('tb_petugas')->onUpdate('cascade');
            $table->enum('status', ['dibuka', 'ditutup']);
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
        Schema::dropIfExists('tb_lelangs');
    }
};

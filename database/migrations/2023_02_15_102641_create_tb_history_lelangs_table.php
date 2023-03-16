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
        Schema::create('tb_history_lelangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lelang')->constrained('tb_lelangs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_barang')->constrained('tb_barangs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('tb_masyarakats')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('penawaran_harga');
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
        Schema::dropIfExists('tb_history_lelangs');
    }
};

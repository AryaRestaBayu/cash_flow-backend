<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cash_flows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('jenis_transaksi', ['masuk', 'keluar']);
            $table->unsignedBigInteger('nominal');
            $table->date('tanggal');
            $table->string('alasan');
            $table->timestamps();

            // Define foreign key relationship with users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cash_flows');
    }
};


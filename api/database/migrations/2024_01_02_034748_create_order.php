<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('no_invoice');
            $table->string('email');
            $table->string('phone');
            $table->string('status_pembayaran')->default('Belum Bayar');
            $table->string('no_resi')->nullable();
            $table->BigInteger('produk_id')->unsigned();
            $table->string('ekspedisi')->nullable();
            $table->double('jumlah_pesanan', 12, 2)->default(0);
            $table->double('subtotal', 12, 2)->default(0);
            $table->double('ongkir', 12, 2)->default(0);
            $table->double('total', 12, 2)->default(0);
            $table->foreign('produk_id')->references('id')->on('produk');
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
        Schema::dropIfExists('order');
    }
}

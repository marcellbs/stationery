<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id("id_produk");
            $table->string("nama_produk", 150);
            $table->integer("harga");
            // $table->bigInteger("kategori_id");
            // $table->bigInteger("status_id");
            $table->timestamps();
        });

        Schema::table('produk', function (Blueprint $table) {
            $table->foreignId("kategori_id")->references("id_kategori")->on("kategori");
            $table->foreignId("status_id")->references("id_status")->on("status");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}

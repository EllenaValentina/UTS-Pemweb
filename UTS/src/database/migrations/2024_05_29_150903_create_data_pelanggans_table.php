<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPelanggansTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('datapelanggans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('nama')->nullable();
            $table->longText('email')->nullable();
            $table->longText('no_telp');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datapelanggans');
    }
};

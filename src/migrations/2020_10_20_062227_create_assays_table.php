<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assays', function (Blueprint $table) {
            $table->id();
            $table->string('assay_id');
            $table->string('assay_name')->nullable();
            $table->string('assay_barcode')->nullable();
            $table->string('assay_lot_no')->nullable();
            $table->date('assay_manufactured_date')->nullable();
            $table->string('assay_status')->nullable();
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
        Schema::dropIfExists('assays');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssaysControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assayscontrols', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('assay_admin')->nullable();
            $table->string('assay_view')->nullable();
            $table->string('assay_add')->nullable();
            $table->string('assay_edit')->nullable();
            $table->string('assay_del')->nullable();
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
        Schema::dropIfExists('assayscontrols');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_meta', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_permohonan')
            //     ->references('id')->on('permohonan') 
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            $table->string('id_permohonan', 20)->unique();
            $table->string('meta_name');
            $table->longText('meta_value');
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
        Schema::dropIfExists('permohonan_meta');
    }
}

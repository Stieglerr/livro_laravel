<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('livros', function (Blueprint $table) {
        $table->integer('ano_publicacao')->change(); 
    });
}

public function down()
{
    Schema::table('livros', function (Blueprint $table) {
        $table->tinyInteger('ano_publicacao')->change();
    });
}

};

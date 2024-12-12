<?php

// database/migrations/create_libraries_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrariesTable extends Migration
{
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->string('contact_number');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('libraries');
    }
}
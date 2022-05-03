<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('expires_at');
            $table->integer('count');
        });
    }

    public function down()
    {
        Schema::dropIfExists('parts');
    }
};

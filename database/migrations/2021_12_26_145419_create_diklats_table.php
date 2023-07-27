<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiklatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diklats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diklat_category_id');
            $table->string('tittle');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('desc');
            $table->text('desc_body');
            $table->string('trainer');
            $table->timestamp('regist_deadline');
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
        Schema::dropIfExists('diklats');
    }
}

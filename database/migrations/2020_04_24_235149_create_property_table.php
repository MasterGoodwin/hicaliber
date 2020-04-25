<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('price')->unsigned();
            $table->integer('bedrooms')->unsigned();
            $table->integer('bathrooms')->unsigned();
            $table->integer('storeys')->unsigned();
            $table->integer('garages')->unsigned();
        });
        Artisan::call('db:seed', [
            '--class' => PropertySeeder::class,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property');
    }
}

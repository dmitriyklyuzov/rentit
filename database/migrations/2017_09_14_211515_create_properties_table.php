<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');                     // 1
            $table->string('title');                        // Lovely 1-bedroom in Brooklyn!
            $table->string('type');                         // Residential/Commercial
            $table->string('street');                       // 1405 71st St
            $table->string('apartment');                    // B3
            $table->string('city');                         // Brooklyn
            $table->integer('zip');                         // 11228
            $table->integer('bedrooms');                    // 1
            $table->double('bathrooms');                    // 1.5
            $table->longText('description');                // This lovely 1-bedroom apt in Brooklyn ... 
            $table->boolean('available');                   // True
            $table->dateTime('rented')->default(NULL);    // 10.05.2015
            $table->double('price');                        // 1205.00
            $table->string('cover_image');                  // 'img/1405B3/cover.jpg'
            $table->boolean('utilities_included');          // False
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
        Schema::dropIfExists('properties');
    }
}

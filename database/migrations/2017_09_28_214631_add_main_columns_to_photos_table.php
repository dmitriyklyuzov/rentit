<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMainColumnsToPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photos', function($table){
            $table->integer('property_id')->after('id');
            $table->string('photo')->after('property_id');
            $table->string('title')->after('photo');
            $table->string('size')->after('title');
            $table->string('description')->after('size');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photos', function($table){
            $table->dropcolumn('property_id');
            $table->dropcolumn('photo');
            $table->dropcolumn('title');
            $table->dropcolumn('size');
            $table->dropcolumn('description');
        });
    }
}

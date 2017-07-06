<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 11:05
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Course extends Migration
{
    public function up(){
        Schema::create('course',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->longText('introduction');
            $table->integer('coursetype');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::drop('course');
    }
}
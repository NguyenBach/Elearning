<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 11:09
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CourseType extends Migration
{
    public function up(){
        Schema::create('course_type',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->longText('description');
            $table->string('template');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::drop('course');
    }
}
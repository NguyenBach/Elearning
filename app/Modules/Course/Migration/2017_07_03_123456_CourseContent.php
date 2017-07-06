<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 11:11
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CourseContent extends Migration
{
    public function up(){
        Schema::create('course_content',function (Blueprint $table){
            $table->increments('id');
            $table->integer('course_id');
            $table->char('course_title',255);
            $table->longText('course_content');
            $table->longText('course_media_url');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::drop('course');
    }
}
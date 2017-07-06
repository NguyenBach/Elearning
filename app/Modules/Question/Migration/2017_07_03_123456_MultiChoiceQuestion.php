<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 11:17
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class MultiChoiceQuestion extends Migration
{
    public function up(){
        Schema::create('multichoice_question',function (Blueprint $table){
            $table->increments('id');
            $table->integer('course_id');
            $table->integer('question_type');
            $table->mediumText('question');
            $table->mediumText('answer_a');
            $table->mediumText('answer_b');
            $table->mediumText('answer_c');
            $table->mediumText('answer_d');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::drop('multichoice_question');
    }
}
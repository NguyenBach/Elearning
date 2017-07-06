<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 11:15
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class QuestionType extends Migration
{
    public function up(){
        Schema::create('question_type',function (Blueprint $table){
            $table->increments('id');
            $table->char('name',50);
            $table->longText('description');
            $table->char('template',100);
            $table->timestamps();
        });
    }
    public function down(){
        Schema::drop('question_type');
    }
}
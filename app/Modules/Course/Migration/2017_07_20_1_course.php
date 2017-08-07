<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 20/07/2017
 * Time: 21:28
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Course extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('shortname');
            $table->longText('introduction');
            $table->string('feature_picture');
            $table->date('start_date');
            $table->string('course_format');
            $table->integer('number_lessions');
            $table->boolean('active');
            $table->boolean('visible');
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
        Schema::drop('course');
    }
}
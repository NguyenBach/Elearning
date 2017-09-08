<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 07/09/2017
 * Time: 15:02
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class Video extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id');
            $table->integer('lesson_id');
            $table->string('name');
            $table->string('description');
            $table->string('template');
            $table->timestamps();
        });
        DB::table('activity_type')->insert(['name'=>'Video','description'=>'Module Video','active'=>1,'type_template'=>'template1','table'=>'video','created_at'=>date('Y-m-d h:m:s',time())]);

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('video');
    }
}
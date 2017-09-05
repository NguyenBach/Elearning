<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 05/09/2017
 * Time: 08:00
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class Text extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id');
            $table->integer('lesson_id');
            $table->string('name');
            $table->mediumText('description');
            $table->string('template');
            $table->timestamps();
        });
        DB::table('activity_type')->insert(['name'=>'Text','description'=>'hello text','active'=>1,'type_template'=>'template1','table'=>'text','created_at'=>date('Y-m-d h:m:s',time())]);

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('text');
    }
}
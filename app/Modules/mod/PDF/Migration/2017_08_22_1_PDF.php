<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 29/07/2017
 * Time: 10:36
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class PDF extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id');
            $table->integer('lesson_id');
            $table->string('name');
            $table->string('description');
            $table->string('template');
            $table->timestamps();
        });
        DB::table('activity_type')->insert(['name'=>'PDF','description'=>'pdf module','active'=>1,'type_template'=>'template1','table'=>'pdf','created_at'=>date('Y-m-d h:m:s',time())]);

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pdf');
    }
}
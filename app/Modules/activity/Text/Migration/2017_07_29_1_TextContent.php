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


class TextContent extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_content', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lesson_id');
            $table->string('title');
            $table->longText('content');
            $table->timestamps();
        });
        DB::table('activity_type')->insert(['name'=>'Text','description'=>'hello text','active'=>1,'type_template'=>'template1','created_at'=>date('Y-m-d h:m:s',time())]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('text_content');
    }
}
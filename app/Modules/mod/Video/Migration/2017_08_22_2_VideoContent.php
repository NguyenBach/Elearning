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


class VideoContent extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_content', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('intro');
            $table->string('video_link');
            $table->string('video_script');
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
        Schema::drop('video_content');
    }
}
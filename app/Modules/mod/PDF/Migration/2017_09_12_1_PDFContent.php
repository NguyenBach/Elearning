<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 12/09/2017
 * Time: 08:34
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class PDFContent extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf_content', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mod_id');
            $table->string('title');
            $table->string('url');
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
        Schema::drop('pdf_content');
    }
}
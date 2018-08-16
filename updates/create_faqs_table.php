<?php namespace Xitara\PMFaq\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('xitara_pmfaq_faqs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('question')->nullable();
            $table->text('answer')->nullable();
            $table->integer('group_id')->default(0);
            $table->boolean('active')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xitara_pmfaq_faqs');
    }
}

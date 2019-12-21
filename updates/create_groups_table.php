<?php namespace Xitara\Faq\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('xitara_faq_groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xitara_faq_groups');
    }
}

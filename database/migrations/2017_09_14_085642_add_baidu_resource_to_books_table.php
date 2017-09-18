<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBaiduResourceToBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('cover')->nullable()->comment('封面图');
            $table->string('baidu_source')->nullable()->comment('百度云地址');
            $table->string('baidu_source_key')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('cover');
            $table->dropColumn('baidu_source');
            $table->dropColumn('baidu_source_key');
        });
    }
}

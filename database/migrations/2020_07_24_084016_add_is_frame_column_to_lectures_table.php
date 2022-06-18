<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsFrameColumnToLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lectures', function (Blueprint $table) {
            $table->boolean('is_frame')->default(0)->nullable();
            $table->string('main_image')->nullable();
            $table->string('back_image')->nullable();
            $table->float('frame_height')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lectures', function (Blueprint $table) {
            $table->dropColumn('is_frame');
            $table->dropColumn('frame_height');
            $table->dropColumn('main_image');
            $table->dropColumn('back_image');
        });
    }
}

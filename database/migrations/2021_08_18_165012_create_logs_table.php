<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("room_id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("partner_id")->nullable();
            $table->string("lesson_name");
            $table->string("day_log");
            $table->string("time_log");
            $table->string("content");
            $table->string("duration");
            $table->integer("rate_per_hour");
            $table->integer("rate_for_class");
            $table->string("comment")->nullable();
            $table->foreign("room_id")->references("id")->on("rooms");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("partner_id")->references("id")->on("users");
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
        Schema::dropIfExists('logs');
    }
}

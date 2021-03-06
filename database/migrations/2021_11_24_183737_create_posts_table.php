<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable()->unique();
            $table->string('description', 1000);
            $table->text('content');
            $table->unsignedInteger('views')->default(0);
            $table->unsignedBigInteger('post_category_id');
            $table->string('image')->nullable();
            $table->unsignedTinyInteger('need_confirmation')->default(1);
            $table->unsignedTinyInteger('confirmed')->default(0);
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('posts');
    }
}

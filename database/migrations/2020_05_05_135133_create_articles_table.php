<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('img');
            $table->text('texte');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->on('users')
            ->references('id')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->bigInteger('categorie_id')->unsigned();
            $table->foreign('categorie_id')->on('categories')
            ->references('id')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('valid');
            $table->timestamps();
        });

        Schema::create('article_tag', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('article_id')->unsigned();
            $table->foreign('article_id')->on('articles')
            ->references('id')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('tag_id')->on('tags')
            ->references('id')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('articles');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            
            $table->string('title');
            $table->string('slug');
            
            $table->string('image')->nullable();
            
            $table->text('summary')->nullable();
            $table->text('content');
            $table->string('tags')->nullable();
            
            $table->string('source')->nullable();
            $table->string('source_url')->nullable();
            $table->text('references')->nullable();

            $table->enum('type',['article','news'])->default('news');
            $table->enum('locale',['en','hi'])->default('hi');

            $table->enum('status', ['published','rejected','under-review'])->default('under-review');

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
        Schema::dropIfExists('news');
    }
}

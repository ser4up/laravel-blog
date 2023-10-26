<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->foreignId('post_id');
            $table->foreignId('tag_id');

            $table->index('post_id', 'post_tags_post_id_idx');
            $table->foreign('post_id', 'post_tags_post_fk')->on('posts')->references('id');

            $table->index('tag_id', 'post_tags_tag_id_idx');
            $table->foreign('tag_id', 'post_tags_tag_fk')->on('tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tags');
    }
};

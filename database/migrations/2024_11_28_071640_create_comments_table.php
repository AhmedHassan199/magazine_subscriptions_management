<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade'); // معرف المقال
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // معرف المستخدم
            $table->text('content'); // محتوى التعليق
            $table->boolean('is_approved')->default(false); // حالة الموافقة على التعليق
            $table->date('comment_date');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

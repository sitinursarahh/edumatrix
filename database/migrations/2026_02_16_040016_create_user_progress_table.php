<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_progress', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('materi_slug');
            $table->string('sub_materi_slug');

            $table->boolean('unlocked')->default(true);
            $table->boolean('completed')->default(false);

            $table->timestamps();

            $table->unique([
                'user_id',
                'materi_slug',
                'sub_materi_slug'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_progress');
    }
};

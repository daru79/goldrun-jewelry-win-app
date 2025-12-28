<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const POSTS = [
        'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight',
    ];

    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        DB::transaction(function (): void {
            foreach (self::POSTS as $posts) {
                DB::table('posts')->insert([
                    'title' => $posts,
                ]);
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

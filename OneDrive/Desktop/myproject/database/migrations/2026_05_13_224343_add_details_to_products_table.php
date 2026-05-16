<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->string('category')->nullable()->after('id');

            $table->string('ram')->nullable();

            $table->string('storage')->nullable();

            $table->string('processor')->nullable();

            $table->string('size')->nullable();

            $table->string('color')->nullable();

            $table->string('material')->nullable();

            $table->string('tone')->nullable();

            $table->string('weight')->nullable();

            $table->string('skin_type')->nullable();

            $table->string('shoe_size')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn([
                'category',
                'ram',
                'storage',
                'processor',
                'size',
                'color',
                'material',
                'tone',
                'weight',
                'skin_type',
                'shoe_size'
            ]);
        });
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->string('processor')->nullable();

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
                'processor',
                'material',
                'tone',
                'weight',
                'skin_type',
                'shoe_size'
            ]);

        });
    }
};
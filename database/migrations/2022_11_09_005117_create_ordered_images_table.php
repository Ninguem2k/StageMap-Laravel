<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_images', function (Blueprint $table) {
            $table->id();

            $table->string('url');
            $table->string('title')->nullable();

            $table->foreignId('ordered_id')
                ->constrained()
                ->onDelete("CASCADE")
                ->onUpdated("CASCADE");

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
        Schema::dropIfExists('ordered_images');
    }
};

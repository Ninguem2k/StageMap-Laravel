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
        Schema::create('ordereds', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->date('deadline');
            $table->date('predictions');
            $table->string('priority')->default('NORMAL');
            $table->text('description')->nullable();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete("CASCADE")
                ->onUpdated("CASCADE");

            $table->foreignId('client_id')
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
        Schema::dropIfExists('ordereds');
    }
};

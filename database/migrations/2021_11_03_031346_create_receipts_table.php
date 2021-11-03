<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191);
            $table->unsignedBigInteger('provider_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->timestamp('finalized_at')->nullable();
            $table->foreign('provider_id')
            ->references('id')
            ->on('providers');
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipts');
    }
}

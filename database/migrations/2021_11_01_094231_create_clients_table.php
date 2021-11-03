<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->char('document_type', 1)->default('V');
            $table->integer('document_id')->unique('clients_document_id_unique');
            $table->string('name', 191);
            $table->string('email', 191)->nullable();
            $table->string('phone', 191)->nullable();
            $table->timestamp('last_purchase')->nullable();
            $table->unsignedInteger('total_purchases')->default(0);
            $table->unsignedDecimal('total_paid')->default(0.00);
            $table->unsignedDecimal('balance')->default(0.00);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}

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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('claim_type');
            $table->string('date');
            $table->string('total_claim');
            $table->string('receipt');
            $table->string('status');
            $table->string('note');
            $table->string('sst_amount')->nullable();
            $table->string('sst_percentage')->nullable();
            $table->string('total_mileage')->nullable();
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
        Schema::dropIfExists('claims');
    }
};

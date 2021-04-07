<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('reference')->unique();

            $table->integer('days')->nullable();

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->boolean('is_active');

            $table->boolean('is_agent');
            $table->uuid('agent_id')->nullable();
            $table->text('url');

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
        Schema::dropIfExists('promo_codes');
    }
}

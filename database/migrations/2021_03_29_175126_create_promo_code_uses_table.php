<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodeUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_code_uses', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('promo_code_id');

            $table->boolean('is_institution');
            $table->uuid('institution_id')->nullable();

            $table->boolean('is_user');
            $table->integer('promo_user_id')->unsigned()->nullable();

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');

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
        Schema::dropIfExists('promo_code_uses');
    }
}

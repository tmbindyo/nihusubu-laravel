<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNihusubusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nihusubus', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name', 200);
            $table->string('kra_pin_number', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('phone_number', 200)->nullable();
            $table->string('website', 200)->nullable();

            $table->string('town', 200)->nullable();
            $table->string('po_box', 200)->nullable();
            $table->string('postal_code', 200)->nullable();
            $table->string('address_line_1', 200)->nullable();
            $table->string('street', 200)->nullable();

            $table->string('instagram', 200)->nullable();
            $table->string('facebook', 200)->nullable();
            $table->string('twitter', 200)->nullable();

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');

            $table->uuid('logo_id')->nullable();
            $table->uuid('currency_id');


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
        Schema::dropIfExists('nihusubus');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->integer('code');

            $table->string('id_number', 200);
            $table->string('kra_pin', 200);
            $table->string('phone_number', 200);

            $table->string('url', 200);

            $table->boolean('is_approved');
            $table->boolean('is_disabled');

            $table->date('approved_at')->nullable();
            $table->date('disabled_at')->nullable();

            $table->integer('user_id')->unsigned();
            $table->integer('registered_by')->unsigned()->nullable();
            $table->integer('approved_by')->unsigned()->nullable();
            $table->integer('disabled_by')->unsigned()->nullable();
            $table->uuid('status_id');
            $table->uuid('tier_id');

            $table->uuid('kra_pin_copy')->nullable();
            $table->uuid('id_copy')->nullable();

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
        Schema::dropIfExists('agents');
    }
}

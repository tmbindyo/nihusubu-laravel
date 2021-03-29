<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_payments', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->double('amount',20,6);
            $table->double('balance_before',20,6);
            $table->double('balance_after',20,6);

            $table->date('start_date');
            $table->date('end_date');

            $table->boolean('is_successful');

            $table->integer('user_id')->unsigned();
            $table->uuid('agent_id');
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
        Schema::dropIfExists('agent_payments');
    }
}

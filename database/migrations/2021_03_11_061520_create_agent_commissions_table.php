<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_commissions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->double('commission_rate',20,6);
            $table->double('amount',20,6);
            $table->double('withholding_amount',20,6);

            $table->date('date_paid')->nullable();
            $table->text('reason_nullified');

            $table->integer('user_id')->unsigned();
            $table->integer('nullified_by')->unsigned();
            $table->uuid('agent_id');
            $table->uuid('subscription_id');
            $table->uuid('status_id');
            $table->uuid('tier_id');

            $table->boolean('is_paid');
            $table->boolean('is_nullified');

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
        Schema::dropIfExists('agent_commissions');
    }
}

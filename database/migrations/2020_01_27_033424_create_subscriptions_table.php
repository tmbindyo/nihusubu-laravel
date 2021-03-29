<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('reference');

            $table->decimal('amount', 20,2);
            $table->decimal('paid', 20,2);
            // TODO move to institution table
            $table->integer('trial_duration');

            $table->integer('month');
            $table->integer('year');
            $table->date('start_date');
            $table->date('end_date')->nullable();

            $table->boolean('is_user');
            $table->integer('user_id')->unsigned();
            $table->boolean('is_institution');
            $table->uuid('institution_id')->nullable();
            $table->uuid('status_id');
            $table->uuid('subscription_type_id')->nullable();
            $table->uuid('plan_id')->nullable();

            $table->boolean('is_paid');
            $table->boolean('is_fully_paid');
            $table->boolean('is_active');
            $table->boolean('is_trial_period');
            $table->boolean('is_promotion');

            $table->text('text')->nullable();

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
        Schema::dropIfExists('subscriptions');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomingSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_sms', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->text('sms');
            $table->string('from');

            $table->uuid('status_id');

            $table->boolean('is_user');
            $table->integer('user_id')->unsigned();

            $table->boolean('is_institution');
            $table->uuid('institution_id');

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
        Schema::dropIfExists('incoming_sms');
    }
}

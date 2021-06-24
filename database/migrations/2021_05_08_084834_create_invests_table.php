<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('partner_id');
            $table->integer('bank_target_id');
            $table->integer('bank_sender_id');
            $table->string('transfer_number', 128);
            $table->bigInteger('amount');
            $table->text('note');
            $table->text('proof');
            $table->smallInteger('invest_status_id');
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
        Schema::dropIfExists('invests');
    }
}

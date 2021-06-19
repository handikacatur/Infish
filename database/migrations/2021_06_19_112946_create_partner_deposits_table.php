<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_deposits', function (Blueprint $table) {
            $table->id();
            $table->integer('partner_id');
            $table->integer('bank_target_id');
            $table->integer('bank_sender_id');
            $table->string('transfer_number');
            $table->bigInteger('amount');
            $table->text('proof');
            $table->smallInteger('status_partner_deposit_id');
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
        Schema::dropIfExists('partner_deposits');
    }
}

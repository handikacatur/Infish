<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id');
            $table->string('company_name', 100);
            $table->text('address');
            $table->string('phone_number', 15);
            $table->string('alternate_number', 15)->nullable();
            $table->string('cultivation', 100);
            $table->string('wide', 100);
            $table->integer('amount_of_production');
            $table->integer('production_value');
            $table->string('npwp');
            $table->string('siup');
            $table->text('description')->nullable();
            $table->string('image', 100);
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
        Schema::dropIfExists('partner_profiles');
    }
}

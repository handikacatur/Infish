<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBuktiFisikBuktiPembelianInTableProgress extends Migration
{
    public function up()
    {
        Schema::table('progress', function (Blueprint $table) {
            $table->string('proof_physic', 100)->nullable()->after('description');
            $table->string('proof_purchase', 100)->nullable()->after('proof_physic');
        });
    }

    public function down()
    {
        Schema::table('progress', function (Blueprint $table) {
            $table->string('proof_physic', 100)->nullable();
            $table->string('proof_purchase', 100)->nullable();
        });
    }
}

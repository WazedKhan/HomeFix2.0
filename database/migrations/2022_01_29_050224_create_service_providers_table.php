<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_id');
            $table->string('nid_number');
            $table->date('b_day');
            $table->string('address');
            $table->string('address_2');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('sp_status')->default('Active');
            $table->string('status')->default('Pending');
            $table->integer('exprience')->nullable();
            $table->double('job_finished')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_providers');
    }
}

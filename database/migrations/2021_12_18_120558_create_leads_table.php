<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('title');
            $table->string('email');
            $table->string('country');
            $table->string('status');
            $table->string('f_date');
            $table->time('time');
            $table->integer('phone');
            $table->string('a_phone');
            $table->string('time_zone');
            $table->string('website');
            $table->string('gate_keeper_name');
            $table->string('source');
            $table->string('industry');
            $table->string('marketing_partner');
            $table->string('industry_details');
            $table->string('cd');
            $table->text('other');
            $table->text('tasks');
            $table->text('events');
            $table->integer('ad_spend');
            $table->text('notes')->nullable(true);
            $table->string('files')->nullable(true);
            $table->string('followup_status', 255)->nullable(true);
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
        Schema::dropIfExists('leads');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('office_add_1');
            $table->string('office_add_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('work_area');
            $table->string('total_exp')->comment('in year');
            $table->string('type_of_segment');
            $table->string('service_intro');
            $table->string('company_name')->nullable();
            $table->string('gst_n')->nullable();
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
        Schema::dropIfExists('user_profile_details');
    }
};

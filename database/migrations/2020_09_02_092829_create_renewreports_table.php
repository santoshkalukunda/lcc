<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenewreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renewreports', function (Blueprint $table) {
            $table->id();
            $table->string('renewreport_fiscal')->nullable();
            $table->longText('renewreport_comments')->nullable();
            $table->longText('renewreport_reg_fiscal')->nullable();
            $table->foreignId('company_id')->constrained('company_infos')->onDelete('cascade');
            $table->unsignedBigInteger('renew_id')->nullable();
            $table->foreign('renew_id')->references('id')->on('renews')->onDelete('CASCADE');
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
        Schema::dropIfExists('renewreports');
    }
}

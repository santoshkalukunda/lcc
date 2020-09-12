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
            $table->string('renewreport_status')->nullable();
            $table->foreignId('company_id')->constrained('company_infos')->onDelete('cascade');
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

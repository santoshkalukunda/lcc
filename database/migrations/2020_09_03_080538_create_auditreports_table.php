<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditreports', function (Blueprint $table) {
            $table->id();
            $table->string('auditreport_fiscal')->nullable();
            $table->longText('auditreport_comments')->nullable();
            $table->longText('auditreport_reg_fiscal')->nullable();
            $table->string('auditreport_status')->nullable();
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
        Schema::dropIfExists('auditreports');
    }
}

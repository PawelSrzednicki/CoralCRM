<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeadSalesPipelinePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_salespipeline', function (Blueprint $table) {
            $table->bigInteger('lead_id')->unsigned()->index();
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->bigInteger('sales_pipeline_id')->unsigned()->index()->nullable();
            $table->foreign('sales_pipeline_id')->references('id')->on('pltbl_sales_pipelines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_salespipeline');
    }
}

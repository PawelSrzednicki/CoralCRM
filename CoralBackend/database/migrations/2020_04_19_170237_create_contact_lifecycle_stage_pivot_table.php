<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactLifecycleStagePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_lifecyclestage', function (Blueprint $table) {
            $table->bigInteger('contact_id')->unsigned()->index();
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->bigInteger('lifecyclestage_id')->unsigned()->index()->nullable();
            $table->foreign('lifecyclestage_id')->references('id')->on('pltbl_lifecyclestages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_lifecycle_stage');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketStatusTicketPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_status_ticket', function (Blueprint $table) {
            $table->bigInteger('ticket_status_id')->unsigned()->index();
            $table->foreign('ticket_status_id')->references('id')->on('pltbl_ticket_statuses')->onDelete('cascade');
            $table->bigInteger('ticket_id')->unsigned()->index()->nullable();
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_status_ticket');
    }
}

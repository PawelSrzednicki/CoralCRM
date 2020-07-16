<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketPriorityTicketPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_priority_ticket', function (Blueprint $table) {
            $table->bigInteger('ticket_priority_id')->unsigned()->index();
            $table->foreign('ticket_priority_id')->references('id')->on('pltbl_ticket_priorities')->onDelete('cascade');
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
        Schema::dropIfExists('ticket_priority_ticket');
    }
}

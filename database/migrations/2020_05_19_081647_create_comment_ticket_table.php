<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_ticket', function (Blueprint $table) {
            $table->foreignId('comment_id')->constrained();
            $table->foreignId('ticket_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->primary(['comment_id', 'ticket_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_ticket');
    }
}

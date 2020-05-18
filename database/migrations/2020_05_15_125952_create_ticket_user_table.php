<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->foreignId('ticket_id')->constrained('tickets', 'ticket_id')->onDelete('cascade');
            $table->foreignId('comment_id')->constrained('comments', 'comment_id');
            $table->timestamps();
            $table->primary(['user_id', 'ticket_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_user');
    }
}

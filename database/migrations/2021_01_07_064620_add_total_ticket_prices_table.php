<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalTicketPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_prices', function (Blueprint $table) {
            $table->integer('total')->nullable()->after('amount');
            $table->integer('limit')->nullable()->after('duration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('ticket_prices', function (Blueprint $table) {
            $table->dropColumn('total');
        });
    }
}

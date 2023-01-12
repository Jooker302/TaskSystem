<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // SchemeDB::table('users')
        Schema::table('inspection_items', function (Blueprint $table) {
            // $table->dropColumn('inspection_items');
            $table->string('start_date')->nullable()->after('status');
            $table->string('end_date')->nullable()->after('start_date');
            // $table->string('type')->nullable()->after('status');
            // $table->string('end_date')->nullable()->after('start_date');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

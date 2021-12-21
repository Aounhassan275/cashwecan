<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price')->nullable();
            $table->float('direct_income')->nullable();
            $table->float('direct_team_income')->nullable();
            $table->float('upline_income')->nullable();
            $table->float('down_line_income')->nullable();
            $table->float('upline_placement_income')->nullable();
            $table->float('down_line_placement_income')->nullable();
            $table->float('trade_income')->nullable();
            $table->float('company_income')->nullable();
            $table->integer('max_limit')->nullable();
            $table->integer('min_limit')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('packages');
    }
}

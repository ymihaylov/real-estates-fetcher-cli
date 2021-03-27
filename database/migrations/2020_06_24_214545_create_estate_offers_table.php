<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_offers', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('provider', 100)->nullable();
            $table->string('price', 100)->nullable()->nullable();
            $table->string('filter_name', 100)->nullable();
            $table->string('link_to_offer')->nullable();
            $table->string('link_to_offer_hash')->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();

            $table->index(['provider', 'filter_name', 'link_to_offer_hash']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estate_offers');
    }
}

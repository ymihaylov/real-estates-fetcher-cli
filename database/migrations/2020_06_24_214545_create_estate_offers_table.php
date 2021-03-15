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

            $table->string('title');
            $table->string('provider', 100);
            $table->string('filter_name', 100);
            $table->string('link_to_offer');
            $table->string('link_to_offer_hash');
            $table->timestamp('created_at')->useCurrent();

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

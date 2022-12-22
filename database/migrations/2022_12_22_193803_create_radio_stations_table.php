<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radio_stations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('band');
            $table->string('country');
            $table->enum('genres', ['rock', 'alternative', 'metal']);
            $table->timestamps();
        });

        DB::table('radio_stations')->insert([
            [
                'name' => '181 fm',
                'band' => 'fm',
                'country' => 'United Kingdom',
                'genres' => 'rock'
            ],

            [
                'name' => 'BBC Radio 6',
                'band' => 'fm',
                'country' => 'United Kingdom',
                'genres' => 'alternative'
            ],

             [
                'name' => 'Hard Rock',
                'band' => 'dab',
                'country' => 'United Kingdom',
                'genres' => 'alternative'
            ],

             [
                'name' => 'Nation Radio',
                'band' => 'am',
                'country' => 'United Kingdom',
                'genres' => 'metal'
            ],
        ]);
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radio_stations');
    }
};

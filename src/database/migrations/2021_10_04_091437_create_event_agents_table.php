<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_agents', function (Blueprint $table) {
            $table->id();
            $table->string('country',255);
            $table->string('agent_name',255)->nullable();
            $table->string('company',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('mobile',255)->nullable();
            $table->string('fax',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('type',255)->nullable();
            $table->string('css_class',255)->nullable();
            $table->string('bg_color',255)->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order');
            $table->softDeletes();
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
        Schema::dropIfExists('event_agents');
    }
}

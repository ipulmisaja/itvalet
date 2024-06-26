<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 50);
            $table->string('serial')->nullable()->unique();
            $table->string('brand');
            $table->string('type');
            $table->bigInteger('image_id')->nullable();
            $table->string('operating_system')->nullable();
            $table->timestamp('procurement_period')->nullable();
            $table->enum('procurement_type', ['Pusat', 'Daerah']);
            $table->string('bmn_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}

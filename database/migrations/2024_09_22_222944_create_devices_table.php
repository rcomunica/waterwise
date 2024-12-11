<?php

use App\Enums\DeviceStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name")->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->enum("status", [1, 2, 3])->default(DeviceStatus::Active);
            $table->timestamps();

            $table->foreign("user_id")->on("users")->references("id");
        });

        Schema::table('users', function (Blueprint $table) {
            $table->uuid('current_device_id')->nullable();
            $table->foreign('current_device_id')->references('id')->on('devices')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};

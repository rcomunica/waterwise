<?php

use App\Enums\MeasureStatus;
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
        Schema::create('measures', function (Blueprint $table) {
            $table->id();
            $table->uuid("device_id")->nullable();
            $table->double("value")->nullable();
            $table->string("in_time")->nullable();
            $table->enum("status", [1, 2, 3])->default(MeasureStatus::Active);

            $table->timestamps();

            $table->foreign("device_id")->on("devices")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('measures');
    }
};

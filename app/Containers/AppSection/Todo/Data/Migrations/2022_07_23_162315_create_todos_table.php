<?php

use App\Containers\AppSection\Todo\Enum\TodoStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->text('description')->nullable();
            $table->timestamp('expectation_of_completion')->nullable();
            $table->timestamp('completion_date')->nullable();
            $table->string('status')->default(TodoStatusEnum::pendent());
            $table->foreignId('user_id')->constrained();

            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};

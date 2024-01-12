<?php

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

        if(Schema::hasTable('groups')) return;
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_code');
            $table->string('group_name');
            $table->string('group_slug');
            $table->string('group_type')->nullable();
            $table->tinyInteger('group_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allposts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('industry_type');
            $table->text('description');
            $table->string('image');
            $table->string('thumbnail');
            $table->string('caption');
            $table->string('start_date');
            $table->date('end_date');
            $table->string('status');
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
        Schema::dropIfExists('allposts');
    }
};

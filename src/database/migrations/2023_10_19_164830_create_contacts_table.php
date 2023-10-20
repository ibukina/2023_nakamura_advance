<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * // $table->foreignId('management_id')->constrained('managements', 'management_id')->cascadeOnDelete();
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('management_id')->constrained('managements', 'management_id')->cascadeOnDelete();
            $table->string('fullname');
            $table->integer('gender');
            $table->string('email');
            $table->string('postcode'); $table->string('address'); $table->string('building_name')->nullable();
            $table->text('opinion');
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
        Schema::dropIfExists('contacts');
    }
}

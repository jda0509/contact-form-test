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
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('last_name');
            $table->string('first_name');
            $table->tinyInteger('gender'); // 1:男性, 2:女性 ,3:その他
            $table->string('email');
            $table->string('first_phone',3);
            $table->string('second_phone',4);
            $table->string('third_phone',4);
            $table->string('address');
            $table->string('building')->nullable();
            $table->text('detail');
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

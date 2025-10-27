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
  public function up(): void
{
    Schema::create('borrowings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
        $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
        $table->date('borrow_date');
        $table->date('return_date')->nullable();
        $table->enum('status', ['borrowed', 'returned'])->default('borrowed');
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
        Schema::dropIfExists('borrowings');
    }
};

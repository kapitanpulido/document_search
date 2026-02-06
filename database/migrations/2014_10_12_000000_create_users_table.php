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
    Schema::create('users', function (Blueprint $table) {
      
			$table->id();
			$table->unsignedInteger('role_id')->default(0)->comment('Role ID');
      $table->string('name', 255)->nullable()->comment('Name');
      $table->string('email', 255)->unique()->comment('Email');
      $table->string('password', 255)->comment('Password');
      $table->string('photo', 255)->nullable()->comment('Photo');
      $table->rememberToken();
      $table->unsignedTinyInteger('is_active')->default(1)->comment('Active');

      $table->timestamps();
      $table->softDeletes();
			
    });

		DB::statement("ALTER TABLE users comment 'Users table'");
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};




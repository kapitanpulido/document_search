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
		Schema::create('roles', function (Blueprint $table) {
			$table->bigIncrements('id');

			$table->string('name', 255)->nullable()->comment('Role Name');
			$table->unsignedTinyInteger('is_active')->default(1)->comment('Active');

			$table->timestamps();
			$table->softDeletes();
		});

		DB::statement("ALTER TABLE roles comment 'Roles table'");
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('roles');
  }
};

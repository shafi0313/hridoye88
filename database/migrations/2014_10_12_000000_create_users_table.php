<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('profession_id')->nullable()->constrained()->onDeleteSetNull();
            $table->string('name', 191);
            $table->string('name_b', 191)->nullable();
            $table->string('email', 64)->unique();
            $table->tinyInteger('permission')->index()->default(0)->comment('0=No login,1=admin,2=member');
            $table->string('phone', 25)->nullable();
            $table->date('d_o_b')->nullable();
            $table->string('designation', 80)->nullable();
            $table->text('hobby')->nullable();
            $table->string('school', 191)->nullable();
            $table->string('district', 80)->nullable();
            $table->string('address')->nullable();
            $table->string('pre_address', 255)->nullable();
            $table->string('blood', 10)->nullable();
            $table->string('fb', 191)->nullable();
            $table->string('image', 32)->nullable();
            $table->string('cv', 32)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Str;

return new class extends Migration
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
            $table->string('name');
            $table->string('id_group');
            $table->longText('photo_profile')->nullable();
            $table->longText('about')->nullable();
            $table->longText('company')->nullable();;
            $table->longText('job')->nullable();;
            $table->longText('country')->nullable();;
            $table->longText('address')->nullable();;
            $table->longText('phone')->nullable();;
            $table->longText('product_notifycation')->nullable();
            $table->longText('promo_notifycation')->nullable();
            $table->longText('securiry_notifycation')->nullable();
            $table->string('type')->default('admin');
            $table->string('email')->unique();
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
};

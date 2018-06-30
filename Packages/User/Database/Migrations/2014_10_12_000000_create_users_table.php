<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('username')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mid_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('role_id')->nullable();
            $table->string('avatar_link')->nullable();
            $table->date('dob')->nullable();
            $table->longText('permissions')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Create default User
        $now = \Carbon\Carbon::now();
        $users = [
            [
            'username'  => 'eden',
            'first_name'    => 'Eden',
            'last_name' => 'Hazard',
            'email' => 'root@bigin.vn',
            'role_id'   => 1,
            'password'  => \Illuminate\Support\Facades\Hash::make(env('DEFAULT_USER_PASSWORD', 'Bigin2016')),
            'updated_at' => $now,
            'created_at'    => $now,
            ],
            [
                'username'  => 'admin',
                'email' => 'admin@bigin.vn',
                'first_name'    => 'Admin',
                'last_name'    => 'Bigin',
                'role_id'   => 1,
                'password'  => \Illuminate\Support\Facades\Hash::make(env('DEFAULT_USER_PASSWORD', 'Bigin2016')),
                'updated_at' => $now,
                'created_at'    => $now,
            ]
        ];
        foreach($users as $user){
            DB::table('users')->insert($user);
        }
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

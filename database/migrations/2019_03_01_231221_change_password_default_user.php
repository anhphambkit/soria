<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChangePasswordDefaultUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create default User
        $now = Carbon::now();
        $user = [
            'username'  => 'drlinhlinh',
            'email' => 'phamtuananh.bkit@gmail.com',
            'password'  => \Illuminate\Support\Facades\Hash::make(env('DEFAULT_USER_PASSWORD', '@G01ngM3rry!1412')),
            'updated_at' => $now,
        ];
        DB::table('users')->where('username', $user['username'])->where('email', $user['email'])->update($user);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

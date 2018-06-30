<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\DB;
use Packages\User\Permissions\Permission;
class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('permissions')->nullable(); // Store permissions in json_encode array permissions
            $table->timestamps();
        });

        // Create default Role Config
        $roles = [
            [
                'name'  => 'ROOT',
                'permissions'   => '*'
            ],
            [
                'name'  => 'MANAGER',
                'permissions'   => json_encode([Permission::USER_UPDATE_PROFILE, Permission::USER_VIEW_PROFILE, Permission::USER_REMOVE_USERS_PROFILE, Permission::USER_UPDATE_USERS_PROFILE, Permission::USER_VIEW_USERS_PROFILE])
            ]
        ];
        $now = \Carbon\Carbon::now();
        foreach ($roles as $role) {
            $role['updated_at'] = $now;
            $role['created_at'] = $now;
            DB::table('roles')->insert([$role]);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}

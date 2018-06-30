<?php
namespace Packages\User\Permissions;

interface Permission
{
    // View own profile
    const USER_VIEW_PROFILE = 'USER_VIEW_PROFILE';
    // Update own profile
    const USER_UPDATE_PROFILE = 'USER_UPDATE_PROFILE';
    // Remove other user profile
    const USER_REMOVE_USERS_PROFILE = 'USER_REMOVE_USERS_PROFILE';
    // View other user profile
    const USER_VIEW_USERS_PROFILE = 'USER_VIEW_USERS_PROFILE';
    // Update other user profile
    const USER_UPDATE_USERS_PROFILE = 'USER_UPDATE_USERS_PROFILE';

    // View other role
    const ROLE_VIEW_ROLES = 'ROLE_VIEW_ROLES';
    // Update other profile
    const ROLE_UPDATE_ROLES = 'ROLE_UPDATE_ROLES';
    // Remove other role
    const ROLE_REMOVE_ROLES = 'ROLE_REMOVE_ROLES';
}
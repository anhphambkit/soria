<?php
namespace Packages\Frontend\Permissions;

interface Permission
{
    // Access FRONTEND
    const FRONTEND_ACCESS = 'FRONTEND_ACCESS';

    // Config Banner
    const FRONTEND_BANNER_ACCESS = 'FRONTEND_BANNER_ACCESS';
    const FRONTEND_BANNER_CREATE = 'FRONTEND_BANNER_CREATE';
    const FRONTEND_BANNER_EDIT = 'FRONTEND_BANNER_EDIT';
    const FRONTEND_BANNER_DELETE = 'FRONTEND_BANNER_DELETE';
}
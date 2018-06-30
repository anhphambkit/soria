<?php
namespace Packages\Post\Permissions;

interface Permission
{
    // Access POST
    const POST_ACCESS = 'POST_ACCESS';
    const POST_CREATE = 'POST_CREATE';
    const POST_EDIT = 'POST_EDIT';
    const POST_DELETE = 'POST_DELETE';

    // Category
    const POST_CATEGORY_ACCESS = 'POST_CATEGORY_ACCESS';
    const POST_CATEGORY_CREATE = 'POST_CATEGORY_CREATE';
    const POST_CATEGORY_EDIT = 'POST_CATEGORY_EDIT';
    const POST_CATEGORY_DELETE = 'POST_CATEGORY_DELETE';
}
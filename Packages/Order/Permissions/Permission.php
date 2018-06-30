<?php
namespace Packages\Order\Permissions;

interface Permission
{
    // Access ORDER
    const ORDER_ACCESS = 'ORDER_ACCESS';
    const ORDER_CREATE = 'ORDER_CREATE';
    const ORDER_EDIT = 'ORDER_EDIT';
    const ORDER_DELETE = 'ORDER_DELETE';
}
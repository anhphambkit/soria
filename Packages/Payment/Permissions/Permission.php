<?php
namespace Packages\Payment\Permissions;

interface Permission
{
    // Access PAYMENT
    const PAYMENT_ACCESS = 'PAYMENT_ACCESS';
    const PAYMENT_CREATE = 'PAYMENT_CREATE';
    const PAYMENT_EDIT = 'PAYMENT_EDIT';
    const PAYMENT_DELETE = 'PAYMENT_DELETE';
}
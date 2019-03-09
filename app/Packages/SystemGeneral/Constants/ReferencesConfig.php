<?php
/**
 * Created by PhpStorm.
 * User: BiWin
 * Date: 22/12/2018
 * Time: 1:17 PM
 */

namespace App\Packages\SystemGeneral\Constants;

interface ReferencesConfig
{
    CONST REFERENCE_TBL = 'references';
    // Post types:
    CONST POST_TYPE = 'POST_TYPE';
    CONST NORMAL_POST_TYPE = 'Normal';
    CONST GALLERY_POST_TYPE = 'Gallery';
    CONST SLIDE_POST_TYPE = 'Slide';
    CONST VIDEO_POST_TYPE = 'Video';
    CONST AUDIO_POST_TYPE = 'Audio';

    // Status order types:
    CONST STATUS_INVOICE_ORDER_TYPE = 'STATUS_INVOICE_ORDER_TYPE';
    CONST NEW_INVOICE_ORDER_STATUS = 'Mới';
    CONST PROCESSING_INVOICE_ORDER_STATUS = 'Đang Xử Lý';
    CONST COMPLETE_INVOICE_ORDER_STATUS = 'Hoàn Thành';

    // Shipping Methods:
    CONST SHIPPING_METHOD_TYPE = 'SHIPPING_METHOD_TYPE';
    CONST STANDARD_SHIPPING_METHOD = 'Giao hàng tiêu chuẩn';

    // Payment Methods:
    CONST PAYMENT_METHOD_TYPE = 'PAYMENT_METHOD_TYPE';
    CONST COD_PAYMENT_METHOD = 'Thanh toán tiền mặt khi nhận hàng (COD)';
}
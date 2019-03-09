<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2019-03-10
 * Time: 02:22
 */
?>
<div>
    <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" class="m_7759863093632542988wrapper"
                       style="min-width:600px;width:600px" width="600">
                    <tbody>
                    <tr>
                        <td align="left" bgcolor="#ffffff" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                <tr>
                                    <td align="center" style="border-bottom:0px solid #d8ddd7; padding-bottom: 10px;" valign="top">
                                        <a href="{{ route('client.page.home') }}"
                                           target="_blank"
                                           data-saferedirecturl="{{ route('client.page.home') }}">
                                            <img alt="{{ env('SITE_TITLE') }}" height="30"
                                                 src="{{ asset($shopSettings['shop_logo_primary']) }}"
                                                 width="300" class="CToWUd" />
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>


    <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" class="m_7759863093632542988wrapper"
                       style="min-width:600px;width:600px" width="600">
                    <tbody>
                    <tr>
                        <td align="left" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                <tr>
                                    <td align="left" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                            <tr>
                                                <td align="left" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td align="left" bgcolor="#5ece65"
                                                                class="m_7759863093632542988padding-10"
                                                                style="background:#5ece65;color:#ffffff;padding:0 15px"
                                                                valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                       width="100%">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td align="left"
                                                                            class="m_7759863093632542988td-order"
                                                                            valign="middle" width="67%">
                                                                            <table border="0" cellpadding="0"
                                                                                   cellspacing="0" width="100%">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td align="left"
                                                                                        style="font-family:Arial,Helvetica,sans-serif;color:#ffffff"
                                                                                        valign="top">
                                                                                        <p style="padding:7px 0 5px 0;margin:0;font-family:Arial,Helvetica,sans-serif;font-size:13px;line-height:14px;color:#ffffff">
                                                                                            Đơn hàng mới
                                                                                        </p>

                                                                                        <p style="padding:0;margin:0 0 7px;font-family:Arial,Helvetica,sans-serif;font-size:20px;text-transform:uppercase;line-height:18px;color:#ffffff">
                                                                                            MÃ ĐƠN HÀNG #<span
                                                                                                    class="m_7759863093632542988no-link">{{ $detailOrder->id }}</span>
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" class="m_7759863093632542988padding-10"
                                                    style="padding:15px 15px 10px 15px;font-family:Arial,Helvetica,sans-serif;color:#494949"
                                                    valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td align="left" style="padding-bottom:15px" valign="top">
                                                                <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;font-size:13px;padding:0;margin:0 0 2px 0;line-height:18px">
                                                                    <strong>Kính chào quản trị viên,</strong>
                                                                </p>

                                                                <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;font-size:13px;padding:0;margin:0;line-height:18px">
                                                                    <a href="{{ route('client.page.home') }}"
                                                                       style="text-decoration:none;color:#494949"
                                                                       title="{{ env('SITE_TITLE') }}" target="_blank"
                                                                       data-saferedirecturl="{{ route('client.page.home') }}">
                                                                        <span style="color:#494949">{{ env('SITE_TITLE') }}</span></a>
                                                                    vừa nhận được đơn hàng #<strong><span
                                                                                class="m_7759863093632542988no-link">{{ $detailOrder->id }}</span></strong>, được đặt vào lúc <strong><span
                                                                                class="m_7759863093632542988no-link">{{ $detailOrder->created_at }}</span>.
                                                                    </strong>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left"
                                                                style="padding:15px 0 0 0;border-top:1px solid #f1f1f1;color:#494949"
                                                                valign="top">
                                                                <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;margin:0 0 7px 0;padding:0;font-weight:bold;line-height:18px;text-transform:uppercase">
                                                                    THÔNG TIN GIAO HÀNG
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" bgcolor="#f1f1f1"
                                                                style="background:#f1f1f1;padding:10px" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                       width="100%">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td align="left"
                                                                            class="m_7759863093632542988info-left"
                                                                            valign="top">
                                                                            <table border="0" cellpadding="0"
                                                                                   cellspacing="0" width="100%">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td align="left" valign="top"
                                                                                        width="31%">
                                                                                        <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;margin:0;padding:0;line-height:18px;font-size:13px">
                                                                                            Tên người nhận:
                                                                                        </p>
                                                                                    </td>
                                                                                    <td align="left"
                                                                                        class="m_7759863093632542988padding-left1"
                                                                                        valign="top" width="69%">
                                                                                        <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;margin:0;padding:0;line-height:18px;font-weight:bold;font-size:13px">
                                                                                            {{ $detailOrder->customer }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" valign="top">
                                                                                        <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;margin:0;padding:0;line-height:18px;font-size:13px">
                                                                                            Địa chỉ:
                                                                                        </p>
                                                                                    </td>
                                                                                    <td align="left"
                                                                                        class="m_7759863093632542988padding-left1"
                                                                                        valign="top">
                                                                                        <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;margin:0;padding:0;line-height:18px;font-weight:bold;font-size:13px">
                                                                                            {{ $detailOrder->address }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" valign="top">
                                                                                        <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;margin:0;padding:0;line-height:18px;font-size:13px">
                                                                                            Điện thoại:
                                                                                        </p>
                                                                                    </td>
                                                                                    <td align="left"
                                                                                        class="m_7759863093632542988padding-left1"
                                                                                        valign="top">
                                                                                        <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;margin:0;padding:0;line-height:18px;font-weight:bold;font-size:13px">
                                                                                            {{ $detailOrder->mobile_phone }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left"
                                                                style="padding:15px 0 0 0;border-top:1px solid #f1f1f1;color:#494949"
                                                                valign="top">
                                                                <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;margin:0 0 7px 0;padding:0;font-weight:bold;line-height:18px;text-transform:uppercase">
                                                                    PHƯƠNG PHÁP THANH TOÁN
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" bgcolor="#f1f1f1"
                                                                style="background:#f1f1f1;padding:10px" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                       width="100%">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td align="left"
                                                                            class="m_7759863093632542988info-left"
                                                                            valign="top">
                                                                            <table border="0" cellpadding="0"
                                                                                   cellspacing="0" width="100%">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td align="left"
                                                                                        class="m_7759863093632542988payment-method"
                                                                                        valign="top" width="31%">
                                                                                        <strong>{{ $detailOrder->payment }}</strong>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left"
                                                                style="padding:15px 0 0 0;border-top:1px solid #f1f1f1;color:#494949"
                                                                valign="top">
                                                                <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;margin:0 0 7px 0;padding:0;font-weight:bold;line-height:18px;text-transform:uppercase">
                                                                    PHƯƠNG THỨC VẬN CHUYỂN
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" bgcolor="#f1f1f1"
                                                                style="background:#f1f1f1;padding:10px" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                       width="100%">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td align="left"
                                                                            class="m_7759863093632542988info-left"
                                                                            valign="top">
                                                                            <table border="0" cellpadding="0"
                                                                                   cellspacing="0" width="100%">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td align="left" valign="top"
                                                                                        width="31%">
                                                                                        <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;margin:0;padding:0;line-height:18px;font-size:13px">
                                                                                            <strong>{{ $detailOrder->shipping }}</strong>
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left"
                                                                style="padding:15px 0 0 0;border-top:1px solid #f1f1f1;color:#494949"
                                                                valign="top">
                                                                <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;margin:0 0 7px 0;padding:0;font-weight:bold;line-height:18px;text-transform:uppercase">
                                                                    CHI TIẾT ĐƠN HÀNG
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" class="m_7759863093632542988info-order"
                                                                style="border:1px solid #f1f1f1" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                       width="100%">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td align="left" valign="top">
                                                                            <table border="0" cellpadding="0"
                                                                                   cellspacing="0" width="100%">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td align="left" bgcolor="#f1f1f1"
                                                                                        class="m_7759863093632542988tbl-type"
                                                                                        style="background:#f1f1f1;padding:10px;font-weight:bold;font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;line-height:16px"
                                                                                        valign="middle">Sản Phẩm
                                                                                    </td>
                                                                                    <td align="right" bgcolor="#f1f1f1"
                                                                                        class="m_7759863093632542988tbl-type"
                                                                                        style="background:#f1f1f1;padding:10px;font-weight:bold;font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;line-height:16px"
                                                                                        valign="middle">Đơn Giá (VNĐ)
                                                                                    </td>
                                                                                    <td align="right" bgcolor="#f1f1f1"
                                                                                        class="m_7759863093632542988tbl-type"
                                                                                        style="background:#f1f1f1;padding:10px;font-weight:bold;font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;line-height:16px"
                                                                                        valign="middle">Số
                                                                                        Lượng
                                                                                    </td>
                                                                                    <td align="right" bgcolor="#f1f1f1"
                                                                                        class="m_7759863093632542988tbl-type"
                                                                                        style="background:#f1f1f1;padding:10px;font-weight:bold;font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;line-height:16px"
                                                                                        valign="middle">Giảm Giá (VNĐ)
                                                                                    </td>
                                                                                    <td align="right" bgcolor="#f1f1f1"
                                                                                        class="m_7759863093632542988tbl-type"
                                                                                        style="background:#f1f1f1;padding:10px;font-weight:bold;font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;line-height:16px"
                                                                                        valign="middle">Tổng
                                                                                        Cộng (VNĐ)
                                                                                    </td>
                                                                                </tr>
                                                                                @foreach($orderProducts as $orderProduct)
                                                                                    @php
                                                                                        $featureImageOrderProduct = $orderProduct->medias[0];
                                                                                        $linkProduct = "{$orderProduct->slug}.{$orderProduct->id}";
                                                                                        $salePriceOnProduct = ($orderProduct->sale_price) ? ($orderProduct->price - $orderProduct->sale_price)*$orderProduct->quantity : 0;
                                                                                        $priceOnProducts = ($orderProduct->sale_price) ? $orderProduct->sale_price*$orderProduct->quantity : $orderProduct->price*$orderProduct->quantity;
                                                                                    @endphp
                                                                                    <tr>
                                                                                        <td align="left"
                                                                                            class="m_7759863093632542988tbl-type"
                                                                                            style="padding:10px"
                                                                                            valign="top">
                                                                                            <table border="0"
                                                                                                   cellpadding="0"
                                                                                                   cellspacing="0"
                                                                                                   width="100%">
                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <td align="left"
                                                                                                        valign="top"
                                                                                                        width="70">
                                                                                                        <div style="padding:0;margin:0;border:1px solid #f1f1f1;width:68px;text-align:center">
                                                                                                            <a href="{{ route('client.product.detail', $linkProduct) }}"
                                                                                                               style="text-decoration:none"
                                                                                                               target="_blank"
                                                                                                               data-saferedirecturl="{{ route('client.product.detail', $linkProduct) }}"><img
                                                                                                                        alt="{{ $orderProduct->name }}"
                                                                                                                        height="68"
                                                                                                                        src="{{ asset($featureImageOrderProduct['path_org']) }}"
                                                                                                                        style="border:none;display:block;max-width:100%;height:auto;margin:0 auto"
                                                                                                                        width="68"
                                                                                                                        class="CToWUd">
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td align="left"
                                                                                                        class="m_7759863093632542988padding-left"
                                                                                                        style="padding:0 0 0 10px"
                                                                                                        valign="top">
                                                                                                        <div style="padding:0;margin:0;width:100%;max-width:200px">
                                                                                                            <p class="m_7759863093632542988font12"
                                                                                                               style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;margin:0;padding:0;line-height:18px">
                                                                                                                <a href="{{ route('client.product.detail', $linkProduct) }}"
                                                                                                                   style="font-family:Arial,Helvetica,sans-serif;color:#494949;text-decoration:none"
                                                                                                                   target="_blank"
                                                                                                                   data-saferedirecturl="{{ route('client.product.detail', $linkProduct) }}"><span
                                                                                                                            style="color:#494949">{{ $orderProduct->name }}</span></a>
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td align="right"
                                                                                            class="m_7759863093632542988tbl-type"
                                                                                            style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;padding:10px;font-weight:bold;line-height:18px"
                                                                                            valign="top">{{ number_format($orderProduct->price, 0, ',', '.') }} đ
                                                                                        </td>
                                                                                        <td align="right"
                                                                                            class="m_7759863093632542988tbl-type"
                                                                                            style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;padding:10px;font-weight:bold;line-height:18px"
                                                                                            valign="top">{{ number_format($orderProduct->quantity, 0, ',', '.') }}
                                                                                        </td>
                                                                                        <td align="right"
                                                                                            class="m_7759863093632542988tbl-type"
                                                                                            style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;padding:10px;font-weight:bold;line-height:18px"
                                                                                            valign="top">{{ number_format($salePriceOnProduct, 0, ',', '.') }} đ
                                                                                        </td>
                                                                                        <td align="right"
                                                                                            class="m_7759863093632542988tbl-type"
                                                                                            style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;padding:10px;font-weight:bold;line-height:18px"
                                                                                            valign="top">{{ number_format($priceOnProducts, 0, ',', '.') }} đ
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left"
                                                                            style="border-top:1px solid #f1f1f1;padding:15px 0 0 0"
                                                                            valign="top">
                                                                            <table border="0" cellpadding="0"
                                                                                   cellspacing="0" width="100%">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td align="right"
                                                                                        class="m_7759863093632542988total-left"
                                                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;line-height:20px"
                                                                                        valign="top" width="74%">Thành
                                                                                        tiền:
                                                                                    </td>
                                                                                    <td align="right"
                                                                                        class="m_7759863093632542988total-right"
                                                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;line-height:20px;padding:0 10px 0 5px;font-weight:bold"
                                                                                        valign="top" width="26%">{{ number_format($detailOrder->sub_total, 0, ",", ".") }} đ
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="right"
                                                                                        class="m_7759863093632542988total-left"
                                                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;line-height:20px"
                                                                                        valign="top">Giảm giá:
                                                                                    </td>
                                                                                    <td align="right"
                                                                                        class="m_7759863093632542988total-right"
                                                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#5ece65;text-align:right;line-height:20px;padding:0 10px 0 5px;font-weight:bold"
                                                                                        valign="top">-{{ number_format($detailOrder->discount_price + $detailOrder->discount_on_products, 0, ",", ".") }} đ
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="right"
                                                                                        class="m_7759863093632542988total-left"
                                                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;line-height:20px;padding:0 0 12px"
                                                                                        valign="top">Phí giao hàng:
                                                                                    </td>
                                                                                    <td align="right"
                                                                                        class="m_7759863093632542988total-right"
                                                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;line-height:20px;padding:0 10px 12px 5px;font-weight:bold"
                                                                                        valign="top">{{ number_format($detailOrder->shipping_fee, 0, ",", ".") }} đ
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="right" bgcolor="#f1f1f1"
                                                                                        class="m_7759863093632542988total-left"
                                                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#494949;text-align:right;line-height:20px;background:#f1f1f1;font-weight:bold;padding:5px 0"
                                                                                        valign="top">Tổng cộng:
                                                                                    </td>
                                                                                    <td align="right" bgcolor="#f1f1f1"
                                                                                        class="m_7759863093632542988total-right"
                                                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:15px;text-align:right;line-height:20px;padding:5px 10px 5px 0;font-weight:bold;color:#ed1c24;background:#f1f1f1"
                                                                                        valign="top">{{ number_format($detailOrder->total_price, 0, ",", ".") }} đ
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    class="m_7759863093632542988info-left m_7759863093632542988padding-10"
                                                    style="padding:15px 15px 10px 15px" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td align="left" class="m_7759863093632542988padding-10"
                                                                style="padding:0 15px 0 0" valign="top"
                                                                width="70%"></td>
                                                            <td align="right" class="m_7759863093632542988padding-10"
                                                                style="padding:0" valign="top" width="30%">
                                                                <p style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;text-align:right;line-height:20px;padding:0;margin:0;font-style:italic">
                                                                    (Đã bao gồm VAT)
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" class="m_7759863093632542988padding-10"
                                                    style="padding:10px 15px 15px 15px;font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949"
                                                    valign="top">

                                                    <p style="padding:15px 0 0 0;font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#494949;line-height:18px;margin:0;border-top:1px solid #f1f1f1">
                                                        *Nếu có thông tin không chính xác, bạn vui lòng liên hệ ngay với
                                                        Trung tâm hỗ trợ khách hàng qua email: <a
                                                                href="mailto:{{ $shopSettings['shop_email'] }}"
                                                                style="text-decoration:none;color:#494949"
                                                                target="_blank"><span
                                                                    style="color:#494949;font-weight:bold">{{ $shopSettings['shop_email'] }}</span></a>
                                                        hoặc <strong>Hotline: {{ $shopSettings['shop_phone'] }}</strong>
                                                    </p>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>


    <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" class="m_7759863093632542988wrapper"
                       style="min-width:600px;width:600px" width="600">
                    <tbody>
                    <tr>
                        <td align="left" bgcolor="#ffffff"
                            style="font-family:Arial,Helvetica,sans-serif;color:#494949;font-size:13px;line-height:16px"
                            valign="top">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td align="center" valign="top" style="padding-top:15px">
                                        <a href="{{ $shopSettings['shop_facebook'] }}"
                                           target="_blank"
                                           data-saferedirecturl="{{ $shopSettings['shop_facebook'] }}">
                                            <img src="{{ asset('storage/general/icons/facebook.png') }}" width="30" height="33" alt="" class="CToWUd" />
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding-top:15px" valign="top"><p
                                                style="font-family:Arial,Helvetica,sans-serif;color:#494949;font-size:12px;line-height:14px;margin:0;padding:0">
                                            <strong style="color:#494949">Hotline:</strong> {{ $shopSettings['shop_phone'] }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong
                                                    style="color:#494949">Email:</strong> <a
                                                    href="mailto:{{ $shopSettings['shop_email'] }}"
                                                    style="text-decoration:none;color:#494949" target="_blank"><span
                                                        style="color:#494949">{{ $shopSettings['shop_email'] }}</span></a></p></td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="padding-top:20px">
                                        <p style="font-family:Arial,Helvetica,sans-serif;color:#494949;font-size:10px;line-height:14px;margin:0 0 15px;padding:0">
                                            © 2018 <a href="{{ route('client.page.home') }}" target="_blank"
                                                      data-saferedirecturl="{{ route('client.page.home') }}">{{ env('SITE_TITLE') }}</a>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p align="left" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:18px;color:#4b8da5;padding:10px 15px 15px 15px;margin:0px;font-weight:normal">Quý khách nhận được email này vì đã mua hàng tại {{ env('SITE_TITLE') }}.<br>
                                            Để chắc chắn luôn nhận được email thông báo, xác nhận mua hàng từ {{ env('SITE_TITLE') }}, quý khách vui lòng thêm địa chỉ <strong><a href="mailto:{{ $shopSettings['shop_email'] }}" target="_blank">{{ $shopSettings['shop_email'] }}</a></strong> vào số địa chỉ (Address Book, Contacts) của hộp email.<br>
                                        </p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>


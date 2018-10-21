<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 9/2/18
 * Time: 09:35
 */
$isDefault = isset($isDefault) ? $isDefault : true;
$classTable_DTS = isset($classTable_DTS) ? $classTable_DTS : '';
$idTable_DTS = isset($idTable_DTS) ? $idTable_DTS : '';
?>
<table id="{{ $idTable_DTS }}" class="b-table-custom display responsive no-wrap {{ $isDefault ? 'table table-striped table-bordered' : '' }} {{ $classTable_DTS }}" width="100%">
</table>

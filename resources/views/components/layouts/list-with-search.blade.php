<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 9/1/18
 * Time: 23:21
 */

$hasSearchFilter = isset($hasSearchFilter) ? $hasSearchFilter : true;
$hasBtnDefault = isset($hasBtnDefault) ? $hasBtnDefault : true;
$titleSearchCard = isset($titleSearchCard) ? $titleSearchCard : trans('generals.search');
$titleTableCard = isset($titleTableCard) ? $titleTableCard : '';
?>
<div class="list-with-search-section">
    @if($hasSearchFilter)
        <div class="row">
            <div class="col-lg-12 ks-panels-column-section">
                @component('components.sections.card')
                    @slot('title', $titleSearchCard)
                    @slot('content')
                        @include('components.layouts.search-filter')
                    @endslot
                @endcomponent
            </div>
        </div>
    @endif
    @if($hasBtnDefault)
        <div class="row btn-default-area">
            @section('btn-others')
            @show
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 ks-panels-column-section">
            <div class="ks-user-list-view-table">
                @component('components.sections.card')
                    @slot('title', $titleTableCard)
                    @slot('content')
                        @include('components.partials.data-table-standard')
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
</div>
@section('area-modals')
@show


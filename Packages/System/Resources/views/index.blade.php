@extends('theme::layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('theme::components.cardbox')
                @slot('title', trans('system::system.package'))
                @slot('content')
                <p class="text-muted font-14 m-b-20">... Your content</p>
                @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
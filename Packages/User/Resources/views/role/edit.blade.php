@extends('theme::layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('packages/theme/vendors/css/switchery.min.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('theme::components.cardbox')
                @slot('title', 'Roles')
                @slot('isActive', true)
                @slot('content')
                <p class="text-muted font-14 m-b-20">Edit role {{ mb_strtoupper($role->name) }}</p>
                <form role="form" novalidate="" id="form-update-role">
                    <div class="form-group row">
                        <div class="col-md-12">
                            @component('theme::components.field')
                            @slot('title', 'Role name')
                            @slot('id', 'role-name')
                            @slot('required', true)
                            @slot('value', $role->name)
                            @slot('name', 'name')
                            @endcomponent
                        </div>
                    </div>

                    @foreach($packages as $package)
                    <div class="form-group row">
                        <div class="col-12">
                            <p class="mb-1 mt-4 font-weight-bold text-muted">{{ strtoupper($package['package']) }}</p>
                        </div>
                        @foreach($package['permissions'] as $permission)
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', strtoupper($permission))
                            @slot('id', 'permission_'. $permission)
                            @slot('type', 'checkbox')
                            @slot('name', 'permissions['. strtoupper($permission). ']')
                            @slot('checked', $roleServices->roleHasAccess($role->getKey(), $permission))
                            @endcomponent
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    <div class="form-group row action-group">
                        <div class="col-12 text-right">
                            @component('theme::components.button')
                            @slot('id', 'update-role')
                            @slot('control', 'submit')
                            @slot('label', trans('theme::theme.action.update'))
                            @endcomponent

                            @component('theme::components.button')
                            @slot('id', 'cancel-update-role')
                            @slot('control', 'cancel')
                            @endcomponent
                        </div>
                    </div>
                </form>
                @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection

@section('plugin-scripts')
    <script src="{{ asset('packages/theme/vendors/js/switchery.min.js')}}"></script>
@endsection

@section('scripts')
    <script>
        var api = {
            role: {
                update: '{{ route('user.role.update', ['id' => $role->getKey()]) }}',
                get: '{{ route('user.role.get', ['id' => $role->getKey()]) }}',
            }
        }
    </script>
    <script src="{{ asset('packages/user/assets/js/role.edit.js')}}"></script>
@endsection
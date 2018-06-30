@extends('theme::layouts.admin')
@section('styles')
    <link href="{{ asset('packages/theme/vendors/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('theme::components.cardbox')
                @slot('title', 'User Setting')
                @slot('isActive', true)
                @slot('content')
                <p class="text-muted font-14 m-b-20">Setting your account information</p>
                <form role="form" id="form-update-profile">
                    <div class="form-group row">
                        <div class="col-md-12">
                            @component('theme::components.field')
                            @slot('title', 'Username')
                            @slot('name', 'username')
                            @slot('id', 'user-name')
                            @slot('required', true)
                            @slot('value', $user->username)
                            @endcomponent
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            @component('theme::components.field')
                            @slot('title', 'First name')
                            @slot('name', 'first_name')
                            @slot('id', 'first-name')
                            @slot('value', $user->first_name)
                            @endcomponent
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            @component('theme::components.field')
                            @slot('title', 'Mid name')
                            @slot('name', 'mid_name')
                            @slot('id', 'mid-name')
                            @slot('value', $user->mid_name)
                            @endcomponent
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            @component('theme::components.field')
                            @slot('title', 'Last name')
                            @slot('name', 'last_name')
                            @slot('id', 'last-name')
                            @slot('value', $user->last_name)
                            @endcomponent
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            @component('theme::components.field')
                            @slot('title', 'Email')
                            @slot('id', 'user-email')
                            @slot('required', true)
                            @slot('type', 'email')
                            @slot('value', $user->email)
                            @slot('name', 'email')
                            @endcomponent
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            @component('theme::components.field')
                            @slot('title', 'Password')
                            @slot('type', 'password')
                            @slot('name', 'password')
                            @slot('id', 'new-pwd')
                            @endcomponent

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            @component('theme::components.field')
                            @slot('title', 'Confirm Password')
                            @slot('id', 'confirm-pwd')
                            @slot('name', 'confirm-pwd')
                            @slot('type', 'password')
                            @endcomponent
                        </div>
                    </div>
                    <div class="form-group row action-group">
                        <div class="col-12 text-right">
                            @component('theme::components.button')
                            @slot('id', 'submit-user-profile')
                            @slot('control', 'submit')
                            @slot('label', trans('theme::theme.action.update'))
                            @endcomponent

                            @component('theme::components.button')
                            @slot('id', 'cancel-user-profile')
                            @slot('control', 'cancel')
                            @endcomponent
                        </div>
                    </div>
                </form>
                @endslot
                @endcomponent
            </div>
        </div>
        <?php $roleServices = app()->make(\Packages\User\Custom\Services\RoleServices::class); ?>
        @if($roleServices->hasAccess(\Packages\User\Permissions\Permission::ROLE_UPDATE_ROLES))
            <div class="row">
            <div class="col-md-12">
                @component('theme::components.cardbox')
                @slot('title', 'User role')
                @slot('isActive', true)
                @slot('content')
                <p class="text-muted font-14 m-b-20">Setting your permission</p>
                <form role="form" id="form-role-profile">
                    <div class="form-group row">
                        <div class="col-md-12">
                            @component('theme::components.field')
                            @slot('title', 'Role')
                            @slot('name', 'role_id')
                            @slot('type', 'dropdown')
                            @slot('id', 'user-role')
                            @slot('required', true)
                            <?php
                                foreach ($roles as $role) {
                                    $roleDropdown[$role->getKey()] = $role->name;
                                }
                            ?>
                            @slot('values', $roleDropdown)
                            @endcomponent
                        </div>
                    </div>

                    <div class="form-group row action-group">
                        <div class="col-12 text-right">
                            @component('theme::components.button')
                            @slot('id', 'submit-role-profile')
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
        @endif
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('packages/theme/vendors/js/select2.min.js')}}"></script>
    <script>
        var api = {
            user: {
                update: '{{ route('user.update.profile', ['id'  => $user->getKey() ]) }}',
                get:    '{{ route('user.get', ['id'  => $user->getKey() ]) }}'
            },
            role: {
                update: '{{ route('user.update.user-role', ['id' => $user->getKey() ]) }}',
                get:    '{{ route('user.role.get', ['id'  => $user->role()->first()->getKey() ]) }}'
            }
        }
    </script>
    <script src="{{ asset('packages/user/assets/js/user.js')}}"></script>
@endsection
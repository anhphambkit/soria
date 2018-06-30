@extends('theme::layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('theme::components.cardbox')
                @slot('title', trans('general::general.package'))
                @slot('isActive', true)
                @slot('content')
                <p class="text-muted font-14 m-b-20">... Config your website</p>
                <form role="form" id="form-update-general">
                    <div class="form-group row">
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('general::general.site-url'))
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SITE_URL)
                            @slot('id', 'site-url')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SITE_URL])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('general::general.site-name'))
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SITE_NAME)
                            @slot('id', 'site-name')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SITE_NAME])
                            @endcomponent
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Facebook')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_FB)
                            @slot('id', 'fb')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_FB])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Twitter')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_TWITTER)
                            @slot('id', 'twitter')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_TWITTER])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Google Plus')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_GOOGLE)
                            @slot('id', 'google-plus')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_GOOGLE])
                            @endcomponent
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Zalo')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_ZALO)
                            @slot('id', 'zalo')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_ZALO])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Pinterest')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_PINTEREST)
                            @slot('id', 'pinterest')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_PINTEREST])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'LinkedIn')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_LINKEDIN)
                            @slot('id', 'linkedin')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_LINKEDIN])
                            @endcomponent
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Flickr')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_FLICKR)
                            @slot('id', 'flickr')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_FLICKR])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Skype')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SKYPE)
                            @slot('id', 'skype')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SKYPE])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Youtube')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_YOUTUBE)
                            @slot('id', 'youtube')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_YOUTUBE])
                            @endcomponent
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.phone'))
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_PHONE)
                            @slot('id', 'phone')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_PHONE])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.phone'). ' 2')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SECOND_PHONE)
                            @slot('id', 'phone2')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SECOND_PHONE])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.phone'). ' 3')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_THIRD_PHONE)
                            @slot('id', 'phone3')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_THIRD_PHONE])
                            @endcomponent
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.email'))
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_EMAIL)
                            @slot('id', 'email')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_EMAIL])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.email'). ' 2')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_EMAIL2)
                            @slot('id', 'email2')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_EMAIL2])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.email'). ' 3')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_EMAIL3)
                            @slot('id', 'email3')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_EMAIL3])
                            @endcomponent
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.company'))
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_COMPANY)
                            @slot('id', 'company')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_COMPANY])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.working-time'))
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_WORKING_TIME)
                            @slot('id', 'working-time')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_WORKING_TIME])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.address'). ' 1')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_ADD1)
                            @slot('id', 'address1')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_ADD1])
                            @endcomponent
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.address'). ' 2')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_ADD2)
                            @slot('id', 'address2')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_ADD2])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.address'). ' 3')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_ADD3)
                            @slot('id', 'address3')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_ADD3])
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.address'). ' 4')
                            @slot('name', Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_ADD4)
                            @slot('id', 'address4')
                            @slot('value', $config[Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_ADD4])
                            @endcomponent
                        </div>
                    </div>

                    <div class="form-group row action-group">
                        <div class="col-12 text-right">
                            @component('theme::components.button')
                            @slot('id', 'update')
                            @slot('control', 'submit')
                            @slot('label', trans('theme::theme.action.update'))
                            @endcomponent

                            @component('theme::components.button')
                            @slot('id', 'cancel')
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

@section('scripts')
    <script>
        var api = {
            general: {
                update: '{{ route('frontend.general.update') }}'
            }
        }
    </script>
    <script src="{{ asset('packages/general/assets/js/general.js')}}"></script>
@endsection
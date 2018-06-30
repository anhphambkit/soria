@extends('theme::layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('theme::components.cardbox')
                @slot('title', 'Roles')
                @slot('notForm', true)
                @slot('content')
                <p class="text-muted font-14 m-b-20">Mange user roles.</p>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Role</th>
                        <th>Updated At</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $index => $role)
                        @if($role->getKey()==1)
                            @continue
                        @endif
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td><a href="{{ route('user.role.edit',['id' => $role->getKey()]) }}" class="text-custom">{{ $role->name }}</a></td>
                        <td>{{ $role->updated_at }}</td>
                        <td>{{ $role->created_at }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
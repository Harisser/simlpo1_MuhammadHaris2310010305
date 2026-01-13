@extends('layouts.adminlte')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card card-primary card-outline">
            <div class="card-body box-profile text-center">

                {{-- Foto Profil --}}
                <img class="profile-user-img img-fluid img-circle"
                     src="{{ asset('images/user-default.png') }}"
                     alt="User profile picture"
                     style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;">

                <h3 class="profile-username mt-3">
                    {{ auth()->user()->name }}
                </h3>

                <p class="text-muted">
                    {{ auth()->user()->role }}
                </p>

                <ul class="list-group list-group-unbordered mb-3 text-left">
                    <li class="list-group-item">
                        <b>Email</b>
                        <span class="float-right">
                            {{ auth()->user()->email }}
                        </span>
                    </li>
                    <li class="list-group-item">
                        <b>Status</b>
                        <span class="float-right">
                            {{ auth()->user()->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </li>
                </ul>

            </div>
        </div>

    </div>
</div>
@endsection

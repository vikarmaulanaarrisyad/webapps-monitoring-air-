@extends('layouts.guest')

@section('title', 'login')

@section('content')
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="login-logo">
                    <a href="javascript:void(0)"><b>Aplikasi Monitoring Pintu Air </b>Muara</a>
                </div>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan inputkan email dan password yang benar.</p>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                            placeholder="Email" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror "
                            placeholder="Password" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>

                    </div>
                </form>
                <p class="mb-0 mt-2">
                <p class="text-muted">belum punya akun? silahkan register <a class="text-muted" href="">disini</a>
                </p>
                </p>
            </div>

        </div>
    </div>
@endsection

@extends('layouts.layout')

@section('title')
    Увійти
@endsection


@section('body')

    {{--    @dump(\Illuminate\Support\Facades\Auth::user())--}}
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <form action="/login" class="d-flex justify-content-center align-items-center flex-column m-5" method="post">
        @csrf

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="center mt-2">
            <label class="form-label ">Email</label>
            <input required type="email" class="form-control @error('email')is-invalid @enderror"
                   name="email" placeholder="email" value="{{old('email')}}">
            @error('login')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

        </div>
        <div class="center mt-2 mb-3">
            <label class="form-label ">Пароль</label>
            <input required type="password" class="form-control @error('password')is-invalid @enderror"
                   name="password" placeholder="Password">
            @error('password')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Увійти</button>

        <a class="w-100 btn btn-lg btn-primary m-3" href="/login/google" type="submit">Google</a>


    </form>

@endsection

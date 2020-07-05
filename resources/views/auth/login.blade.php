@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered mt-6">
        <div class="column is-two-fifths box">
            <h1 class="is-size-3 mb-4">Login</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <label for="" class="label">E-mail Address</label>
                    <p class="control has-icons-left">
                    <input type="email" name="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" placeholder="Email" value="{{ old('email') }}">
                    <span class="icon is-small is-left">
                        <i class="fa fa-envelope"></i>
                    </span>

                    @if ($errors->has('email'))
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="" class="label">Password</label>
                    <p class="control has-icons-left">
                    <input type="password" name="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}" placeholder="Password">
                    <span class="icon is-small is-left">
                        <i class="fa fa-lock"></i>
                    </span>
                    @if ($errors->has('password'))

                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="checkbox">
                        <input type="checkbox">
                        Remember me
                    </label>
                </div>

                <div class="field">
                    <button type="submit" class="button is-primary">
                        <span class="icon is-small">
                            <i class="fa fa-paper-plane"></i>
                        </span>
                        <span>Login</span>
                    </button>

                    @if (Route::has('password.request'))
                        <a class="button" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

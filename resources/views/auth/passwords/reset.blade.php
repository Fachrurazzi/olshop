@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered mt-6">
        <div class="column is-two-fifths box">
            <h1 class="is-size-3 mb-4">Reset Password</h1>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

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
                    <label for="" class="label">Confirm Password</label>
                    <p class="control has-icons-left">
                    <input type="password" name="password_confirmation" class="input {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}" placeholder="Confirm Password">
                    <span class="icon is-small is-left">
                        <i class="fa fa-lock"></i>
                    </span>

                    @if ($errors->has('password_confirmation'))
                        <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </div>

                <div class="field">
                    <button type="submit" class="button is-primary">
                        <span class="icon is-small">
                            <i class="fa fa-paper-plane"></i>
                        </span>
                        <span>Reset Password</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

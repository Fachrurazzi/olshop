@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered mt-6">
        <div class="column is-two-fifths box">
            <h1 class="is-size-3 mb-4">Reset Password</h1>

            @if (session('status'))
                <div class="notification is-primary" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
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
                    <button type="submit" class="button is-primary">
                        <span class="icon is-small">
                            <i class="fa fa-paper-plane"></i>
                        </span>
                        <span>Send Password Reset Link</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

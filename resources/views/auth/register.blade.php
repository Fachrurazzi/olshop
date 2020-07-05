@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered mt-6">
        <div class="column is-half box">
            <h1 class="is-size-3 mb-4">Register</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="field">
                    <label for="" class="label">Name</label>
                    <p class="control has-icons-left">
                    <input type="name" name="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" placeholder="Name" value="{{ old('name') }}">
                    <span class="icon is-small is-left">
                        <i class="fa fa-user"></i>
                    </span>

                    @if ($errors->has('name'))
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>

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
                    <label for="" class="label">Address</label>
                    <p class="control has-icons-left">
                    <input type="text" name="address" class="input {{ $errors->has('address') ? 'is-danger' : '' }}" placeholder="Address" value="{{ old('address') }}">
                    <span class="icon is-small is-left">
                        <i class="fa fa-address-book"></i>
                    </span>

                    @if ($errors->has('address'))
                        <p class="help is-danger">{{ $errors->first('address') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="" class="label">Phone</label>
                    <p class="control has-icons-left">
                    <input type="text" name="phone" class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" placeholder="Phone" value="{{ old('phone') }}">
                    <span class="icon is-small is-left">
                        <i class="fa fa-phone"></i>
                    </span>

                    @if ($errors->has('phone'))
                        <p class="help is-danger">{{ $errors->first('phone') }}</p>
                    @endif
                </div>

                <div class="field">
                    <button type="submit" class="button is-primary">
                        <span class="icon is-small">
                            <i class="fa fa-paper-plane"></i>
                        </span>
                        <span>Register</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

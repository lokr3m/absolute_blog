@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-1/2 mx-auto">
        <div class="card-body space-y-4">
            <h2 class="card-title">{{ __('Reset Password') }}</h2>
            <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Email')</legend>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required
                        autocomplete="username" autofocus class="input w-full @error('email') input-error @enderror" />
                    @error('email')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="input w-full @error('password') input-error @enderror" />
                    @error('password')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Confirm Password')</legend>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password"
                        class="input w-full @error('password_confirmation') input-error @enderror" />
                    @error('password_confirmation')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="flex items-center justify-end">
                    <button class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

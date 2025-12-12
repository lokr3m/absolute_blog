<section class="space-y-4">
    <header class="space-y-1">
        <h2 class="card-title text-xl">
            {{ __('Update Password') }}
        </h2>

        <p class="text-sm opacity-80">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Current Password')</legend>
            <input id="update_password_current_password" name="current_password" type="password"
                autocomplete="current-password"
                class="input w-full @if ($errors->updatePassword->get('current_password')) input-error @endif" />
            @if ($errors->updatePassword->get('current_password'))
                <p class="label text-error">{{ $errors->updatePassword->first('current_password') }}</p>
            @endif
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('New Password')</legend>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                class="input w-full @if ($errors->updatePassword->get('password')) input-error @endif" />
            @if ($errors->updatePassword->get('password'))
                <p class="label text-error">{{ $errors->updatePassword->first('password') }}</p>
            @endif
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Confirm Password')</legend>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                autocomplete="new-password"
                class="input w-full @if ($errors->updatePassword->get('password_confirmation')) input-error @endif" />
            @if ($errors->updatePassword->get('password_confirmation'))
                <p class="label text-error">{{ $errors->updatePassword->first('password_confirmation') }}</p>
            @endif
        </fieldset>

        <div class="flex items-center gap-3">
            <button class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <span
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="badge badge-success badge-outline"
                >{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>

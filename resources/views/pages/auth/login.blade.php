<x-layouts::auth.nemt :title="__('Log in')">
    <div class="np-eyebrow" style="color:var(--np-red)">
        <span style="background:var(--np-red)"></span>{{ __('Sign in') }}
    </div>
    <h2>{{ __('Welcome back') }}</h2>
    <p class="np-sub">{{ __('Sign in to your Nemt Power portal account.') }}</p>

    <!-- Session Status -->
    @if (session('status'))
        <div class="np-alert np-alert--ok" style="margin-bottom:20px">{{ session('status') }}</div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="np-alert" style="margin-bottom:20px">{{ $errors->first() }}</div>
    @endif

    <x-passkey-verify />

    <form method="POST" action="{{ route('login.store') }}" x-data="{ show: false, loading: false }" @submit="loading = true">
        @csrf

        <!-- Email Address -->
        <label class="np-label" for="email">{{ __('Email address') }}</label>
        <div class="np-field" style="margin-bottom:18px">
            <svg class="np-icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#9aa6b0" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg>
            <input class="np-input" id="email" type="email" name="email" value="{{ old('email') }}"
                   placeholder="you@company.com" autocomplete="username" required autofocus>
        </div>

        <!-- Password -->
        <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:8px">
            <label class="np-label" style="margin-bottom:0" for="password">{{ __('Password') }}</label>
            @if (Route::has('password.request'))
                <a class="np-forgot" href="{{ route('password.request') }}" wire:navigate>{{ __('Forgot password?') }}</a>
            @endif
        </div>
        <div class="np-field" style="margin-bottom:20px">
            <svg class="np-icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#9aa6b0" stroke-width="1.8"><rect x="4" y="11" width="16" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 018 0v3"></path></svg>
            <input class="np-input has-toggle" id="password" name="password" :type="show ? 'text' : 'password'"
                   placeholder="{{ __('Enter your password') }}" autocomplete="current-password" required>
            <button type="button" class="np-pwtoggle" @click="show = !show" aria-label="{{ __('Toggle password visibility') }}">
                <svg x-show="show" viewBox="0 0 24 24" width="19" height="19" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 3l18 18M10.6 10.6a2 2 0 002.8 2.8M9.4 5.2A9.5 9.5 0 0112 5c6 0 9 7 9 7a15 15 0 01-3.3 4.1M6.3 6.3A15 15 0 003 12s3 7 9 7a9.5 9.5 0 003.9-.8"></path></svg>
                <svg x-show="!show" viewBox="0 0 24 24" width="19" height="19" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            </button>
        </div>

        <!-- Remember Me -->
        <label class="np-remember" style="margin-bottom:24px">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <span>{{ __('Keep me signed in') }}</span>
        </label>

        <button type="submit" class="np-btn" :disabled="loading" data-test="login-button">
            <span x-show="!loading">{{ __('Sign In') }}</span>
            <span x-show="loading" style="display:inline-flex;align-items:center;gap:10px">
                <span class="np-spin"></span>{{ __('Signing in…') }}
            </span>
        </button>
    </form>

    <div class="np-divider">
        <span class="line"></span>
        <span class="txt">{{ __('New here') }}</span>
        <span class="line"></span>
    </div>
    <div class="np-newhere">
        {{ __("Don't have an account?") }}
        <a href="{{ route('register') }}" wire:navigate>{{ __('Sign up') }}</a>
    </div>
</x-layouts::auth.nemt>

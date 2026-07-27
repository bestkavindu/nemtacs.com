<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=IBM+Plex+Sans:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">

        <style>
            :root {
                --np-ink: #14202b;
                --np-muted: #8b98a2;
                --np-red: #e1141c;
                --np-red-dark: #c10e15;
                --np-border: #d5dde3;
            }
            .np-auth * { box-sizing: border-box; }
            .np-auth {
                min-height: 100vh;
                display: flex;
                background: #fff;
                font-family: 'IBM Plex Sans', system-ui, sans-serif;
                color: var(--np-ink);
                -webkit-font-smoothing: antialiased;
            }
            .np-auth a { color: #1b63a8; text-decoration: none; }

            /* Brand panel */
            .np-brand {
                flex: 1.05;
                position: relative;
                overflow: hidden;
                background: #0b141d;
                color: #fff;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                padding: 56px 52px;
            }
            .np-brand__img {
                position: absolute; inset: 0; z-index: 0;
                background-size: cover; background-position: center;
                background-image: url('https://images.unsplash.com/photo-1716191300020-b52dec5b70a8?auto=format&fit=crop&w=1400&q=80');
            }
            .np-brand__scrim {
                position: absolute; inset: 0; z-index: 1; pointer-events: none;
                background: linear-gradient(160deg, rgba(8,14,20,.9) 0%, rgba(8,14,20,.78) 42%, rgba(8,14,20,.9) 100%);
            }
            .np-brand__logo { position: relative; z-index: 2; font: 700 26px/1 'Space Grotesk', sans-serif; letter-spacing: -.01em; }
            .np-brand__body { position: relative; z-index: 2; max-width: 440px; }
            .np-brand__footer { position: relative; z-index: 2; font: 500 11px 'IBM Plex Mono', monospace; letter-spacing: .14em; text-transform: uppercase; color: rgba(255,255,255,.55); }
            .np-eyebrow { font: 600 12px 'IBM Plex Mono', monospace; letter-spacing: .2em; text-transform: uppercase; display: flex; align-items: center; gap: 10px; }
            .np-eyebrow span { width: 26px; height: 2px; }
            .np-brand h1 { font: 600 40px/1.12 'Space Grotesk', sans-serif; letter-spacing: -.02em; color: #fff; margin: 20px 0 30px; text-wrap: balance; }
            .np-feature { display: flex; gap: 13px; align-items: flex-start; }
            .np-feature span { font: 400 15.5px/1.5 'IBM Plex Sans', sans-serif; color: #c6d1da; }

            /* Form column */
            .np-formcol {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: clamp(28px, 5vw, 56px);
                background: #fff;
            }
            .np-card { width: 100%; max-width: 404px; animation: np-up .6s cubic-bezier(.22,.61,.36,1) both; }
            .np-card__logo { height: 46px; width: auto; display: block; margin-bottom: 34px; }
            .np-card h2 { font: 600 30px/1.15 'Space Grotesk', sans-serif; letter-spacing: -.02em; color: var(--np-ink); margin: 16px 0 8px; }
            .np-card p.np-sub { font: 400 15px/1.55 'IBM Plex Sans', sans-serif; color: var(--np-muted); margin: 0 0 30px; }

            .np-label { display: block; font: 600 11px 'IBM Plex Mono', monospace; letter-spacing: .1em; color: var(--np-muted); text-transform: uppercase; margin-bottom: 8px; }
            .np-field { position: relative; }
            .np-field svg.np-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); }
            .np-input {
                width: 100%; border: 1px solid var(--np-border); border-radius: 8px;
                padding: 13px 14px 13px 42px;
                font: 400 15px 'IBM Plex Sans', sans-serif; color: var(--np-ink);
                background: #fff; outline: none;
                transition: border-color .15s, box-shadow .15s;
            }
            .np-input.has-toggle { padding-right: 46px; }
            .np-input::placeholder { color: #9aa6b0; }
            .np-input:focus { border-color: var(--np-red); box-shadow: 0 0 0 3px rgba(225,20,28,.12); }
            .np-pwtoggle {
                position: absolute; right: 8px; top: 50%; transform: translateY(-50%);
                width: 32px; height: 32px; border: none; background: transparent; cursor: pointer;
                display: flex; align-items: center; justify-content: center; color: var(--np-muted);
            }
            .np-pwtoggle:hover { color: var(--np-ink); }

            .np-remember { display: flex; align-items: center; gap: 9px; cursor: pointer; user-select: none; }
            .np-remember input { width: 16px; height: 16px; accent-color: var(--np-red); cursor: pointer; }
            .np-remember span { font: 400 14px 'IBM Plex Sans', sans-serif; color: #4a5661; }

            .np-forgot { font: 500 12.5px 'IBM Plex Sans', sans-serif; color: #1b63a8; }
            .np-forgot:hover { color: var(--np-red); }

            .np-btn {
                width: 100%; background: var(--np-red); color: #fff; border: none;
                padding: 14px; border-radius: 8px;
                font: 600 15px 'IBM Plex Sans', sans-serif; cursor: pointer;
                display: flex; align-items: center; justify-content: center; gap: 10px;
                transition: background .15s;
            }
            .np-btn:hover { background: var(--np-red-dark); }
            .np-spin { width: 17px; height: 17px; border: 2px solid rgba(255,255,255,.4); border-top-color: #fff; border-radius: 50%; display: inline-block; animation: np-spin .7s linear infinite; }

            .np-alert { background: #fdecec; border: 1px solid #f6c9cb; border-radius: 8px; padding: 12px 14px; font: 400 13px/1.5 'IBM Plex Sans', sans-serif; color: #a81720; }
            .np-alert.np-alert--ok { background: #e9f6ee; border-color: #bfe3cc; color: #1c7a44; }

            .np-divider { display: flex; align-items: center; gap: 14px; margin: 28px 0; }
            .np-divider span.line { flex: 1; height: 1px; background: #e6ebef; }
            .np-divider span.txt { font: 500 11px 'IBM Plex Mono', monospace; letter-spacing: .1em; color: #aab4bc; text-transform: uppercase; }
            .np-newhere { text-align: center; font: 400 14px 'IBM Plex Sans', sans-serif; color: #6a7681; }
            .np-newhere a { color: var(--np-red); font-weight: 600; }
            .np-newhere a:hover { color: var(--np-red-dark); }

            .np-footer { display: flex; justify-content: space-between; align-items: center; margin-top: 36px; padding-top: 22px; border-top: 1px solid #eef2f5; }
            .np-footer a { font: 500 13px 'IBM Plex Sans', sans-serif; color: var(--np-muted); display: inline-flex; align-items: center; gap: 6px; }
            .np-footer a:hover { color: var(--np-red); }
            .np-footer span { font: 400 12px 'IBM Plex Mono', monospace; color: #aab4bc; }

            @keyframes np-up { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: none; } }
            @keyframes np-spin { to { transform: rotate(360deg); } }
            @media (max-width: 920px) { .np-brand { display: none !important; } }
            @media (prefers-reduced-motion: reduce) { .np-card { animation: none; } }
        </style>
    </head>
    <body class="antialiased">
        <div class="np-auth">
            <div class="np-brand">
                <div class="np-brand__img"></div>
                <div class="np-brand__scrim"></div>

                <a href="{{ route('home') }}" class="np-brand__logo" wire:navigate>
                    <span style="color:#ff3b43">N</span><span style="color:#fff">emt</span><span style="color:#4d9be0">power</span><span style="color:#ff3b43">.</span>
                </a>

                <div class="np-brand__body">
                    <div class="np-eyebrow" style="color:#ff5b62">
                        <span style="background:#ff5b62"></span>{{ __('Client & partner portal') }}
                    </div>
                    <h1>{{ __('Manage your power projects in one place.') }}</h1>
                    <div style="display:flex;flex-direction:column;gap:16px">
                        @foreach ([
                            __('Track live project & switchboard build status'),
                            __('Access drawings, documents & test certificates'),
                            __('Raise and follow up support tickets'),
                        ] as $feature)
                            <div class="np-feature">
                                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#ff5b62" stroke-width="2.4" style="flex-shrink:0;margin-top:2px"><path d="M20 6L9 17l-5-5"></path></svg>
                                <span>{{ $feature }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="np-brand__footer">{{ __('Since 2013 · Enhanced Power Solutions') }}</div>
            </div>

            <div class="np-formcol">
                <div class="np-card">
                    <a href="{{ route('home') }}" wire:navigate>
                        <img src="/logo.png" alt="{{ config('app.name', 'Nemt Power') }}" class="np-card__logo">
                    </a>

                    {{ $slot }}

                    <div class="np-footer">
                        <a href="{{ route('home') }}" wire:navigate>
                            <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M11 18l-6-6 6-6"></path></svg>{{ __('Back to website') }}
                        </a>
                        <span>&copy; {{ date('Y') }} {{ config('app.name', 'Nemt Power') }}</span>
                    </div>
                </div>
            </div>
        </div>

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>

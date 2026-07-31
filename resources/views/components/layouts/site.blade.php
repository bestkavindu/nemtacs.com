@props(['title' => null, 'description' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? $title.' — Nemt Power (Pvt) Ltd' : 'Nemt Power (Pvt) Ltd — Enhanced Power Solutions' }}</title>
    <meta name="description" content="{{ $description ?? 'Nemt Power designs, assembles and commissions type-tested LV switchboards and industrial automation systems across Sri Lanka. Type-tested up to 4000A.' }}">

    <link rel="icon" href="/favicon.png" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=IBM+Plex+Sans:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        *{box-sizing:border-box}
        body{margin:0;background:#fff;font-family:'IBM Plex Sans',system-ui,sans-serif;color:#14202b;-webkit-font-smoothing:antialiased}
        a{color:#1b63a8;text-decoration:none}

        [data-reveal]{opacity:0;transform:translateY(34px);transition:opacity .8s cubic-bezier(.22,.61,.36,1),transform .8s cubic-bezier(.22,.61,.36,1)}
        [data-reveal][data-shown]{opacity:1;transform:none}

        .ph{background:linear-gradient(135deg,#e9eef2,#f5f7f9);display:flex;align-items:center;justify-content:center;text-align:center}
        .ph span{font:500 11px 'IBM Plex Mono',monospace;letter-spacing:.06em;color:#9aa7b1;padding:0 10px;text-transform:uppercase}
        img.cover{width:100%;height:100%;object-fit:cover;display:block}

        a:hover{color:#e1141c}
        .navlink{color:#3b4750}.navlink:hover{color:#e1141c}
        .btn-red{background:#e1141c;color:#fff}.btn-red:hover{background:#c10e15;color:#fff}
        .btn-outline{border:1.5px solid #cdd6dd;color:#14202b}.btn-outline:hover{border-color:#14202b;color:#14202b}
        .util-social:hover{background:#fff;color:#e1141c}
        .prj-card{transition:border-color .25s,box-shadow .25s,transform .25s}
        .prj-card:hover{box-shadow:0 14px 30px rgba(14,26,36,.12);transform:translateY(-3px)}
        .prj-card:hover img.cover{transform:scale(1.05)}
        .prj-card img.cover{transition:transform .5s cubic-bezier(.22,.61,.36,1)}
        .footer-link:hover{color:#ff5960}
        .footer-social:hover{background:#e1141c;color:#fff}

        /* ---- mobile nav (hidden on desktop) ---- */
        .nav-toggle{display:none;width:44px;height:44px;flex-shrink:0;align-items:center;justify-content:center;border:1px solid #dde4e9;border-radius:7px;background:#fff;cursor:pointer;padding:0}
        .nav-toggle:hover{border-color:#14202b}
        .mobile-menu{position:fixed;inset:0;z-index:100;visibility:hidden;pointer-events:none}
        .mobile-menu[data-open]{visibility:visible;pointer-events:auto}
        .mobile-menu-backdrop{position:absolute;inset:0;background:rgba(8,14,20,.55);opacity:0;transition:opacity .28s}
        .mobile-menu[data-open] .mobile-menu-backdrop{opacity:1}
        .mobile-menu-panel{position:absolute;top:0;right:0;height:100%;width:min(88vw,340px);background:#fff;box-shadow:-14px 0 40px rgba(8,14,20,.28);transform:translateX(100%);transition:transform .3s cubic-bezier(.22,.61,.36,1);display:flex;flex-direction:column;overflow-y:auto;-webkit-overflow-scrolling:touch;padding:14px 22px 28px}
        .mobile-menu[data-open] .mobile-menu-panel{transform:none}
        .mobile-navlink{display:flex;align-items:center;min-height:52px;font:600 17px 'IBM Plex Sans',sans-serif;color:#14202b;border-bottom:1px solid #eef2f5}
        .mobile-navlink:hover{color:#e1141c}
        .mobile-navlink[data-current]{color:#e1141c}
        @media (min-width:961px){.mobile-menu{display:none}}

        @media (prefers-reduced-motion:reduce){
            [data-reveal]{opacity:1 !important;transform:none !important;transition:none !important}
            .mobile-menu-panel,.mobile-menu-backdrop{transition:none}
        }

        /* =====================================================================
           RESPONSIVE
           The site pages are written with inline styles, so these overrides
           need !important. The [style*="…"] selectors retarget the handful of
           padding values that repeat across every section, which keeps the
           rhythm consistent without editing each one by hand.
           ===================================================================== */

        /* ---------- tablet and below ---------- */
        @media (max-width:960px){
            .grid-2,.grid-3,.grid-4,.footer-grid,.featured-svc,.meta-strip{grid-template-columns:1fr !important}
            .grid-2,.grid-3,.grid-4{gap:36px !important}
            .footer-grid{gap:36px !important}
            .svc-grid{grid-template-columns:1fr 1fr !important}

            /* 4-up stat strip becomes 2x2 — dividers rotate with it */
            .stat-strip{grid-template-columns:1fr 1fr !important}
            .stat-strip > div{border-left:0 !important;border-top:1px solid rgba(255,255,255,.12)}
            .stat-strip > div:nth-child(2n){border-left:1px solid rgba(255,255,255,.12) !important}
            .stat-strip > div:nth-child(-n+2){border-top:0}

            .desktop-nav{display:none !important}
            .nav-toggle{display:inline-flex}
            .hdr-right{gap:12px !important}
        }

        /* ---------- phone ---------- */
        @media (max-width:760px){
            /* vertical section rhythm: ~100px -> ~56px
               (bare rules first; the longer strings are also substrings of
               them, so the more specific overrides must come after) */
            [style*="padding:100px 0"]{padding-top:56px !important;padding-bottom:56px !important}
            [style*="padding:88px 0"]{padding-top:52px !important;padding-bottom:52px !important}
            [style*="padding:88px 0 100px"]{padding-bottom:56px !important}
            [style*="padding:80px 0"]{padding-top:48px !important;padding-bottom:48px !important}
            [style*="padding:72px 0"]{padding-top:48px !important;padding-bottom:48px !important}
            [style*="padding:72px 0 100px"]{padding-bottom:56px !important}
            [style*="padding:72px 0 0"]{padding-bottom:0 !important}
            [style*="padding:64px 0 96px"]{padding-top:44px !important;padding-bottom:52px !important}
            [style*="padding:64px 0 100px"]{padding-top:44px !important;padding-bottom:56px !important}

            /* side gutters: 40px -> 20px */
            [style*="padding:0 40px"]{padding-left:20px !important;padding-right:20px !important}
            [style*="padding:0 40px 56px"]{padding-bottom:40px !important}
            [style*="padding:16px 40px"]{padding-left:20px !important;padding-right:20px !important}
            [style*="clamp(40px,6vw,72px)"]{padding-left:20px !important;padding-right:20px !important}
            [style*="padding:88px clamp(40px,6vw,72px)"]{padding-top:52px !important;padding-bottom:52px !important}

            /* page hero overlays are left-to-right gradients — on a narrow
               screen the copy ends up over the bright end of the photo */
            .hero-overlay{background-image:linear-gradient(180deg,rgba(8,14,20,.8) 0%,rgba(8,14,20,.93) 100%) !important}

            /* card / cell padding */
            [style*="padding:34px 40px"]{padding:24px 20px !important}
            [style*="padding:48px 46px"]{padding:32px 22px !important}
            [style*="padding:40px"]{padding:24px 20px !important}
            [style*="padding:56px"]{padding:28px 22px !important}
            [style*="padding:32px 30px"]{padding:26px 22px !important}
            [style*="padding:32px 28px"]{padding:26px 22px !important}

            /* type scale */
            h1{font-size:34px !important;line-height:1.12 !important}
            h2{font-size:26px !important;line-height:1.2 !important}
            h3{font-size:19px !important;line-height:1.3 !important}
            .trix-content h1{font-size:22px !important;line-height:1.3 !important}

            /* single column for anything still two-up */
            .svc-grid,.media-pair,.check-grid{grid-template-columns:1fr !important}
            .check-grid{gap:14px !important}

            /* stacked media panes don't need their desktop height */
            .featured-img{min-height:210px !important}
            .svc-media{height:220px !important;order:0 !important}
            .svc-body{order:0 !important}

            /* heading + "view all" rows stack instead of squeezing */
            .sec-head{flex-direction:column !important;align-items:flex-start !important;gap:20px !important}

            /* tap targets: 44px minimum */
            .btn-red,.btn-outline,.btn-ghost{min-height:48px;display:inline-flex !important;align-items:center;justify-content:center}
            .svc-link,.footer-link,.util-phone,.tap-link{min-height:44px;display:inline-flex !important;align-items:center}
            .footer-links{gap:0 !important}
            .footer-social{width:44px !important;height:44px !important}
            .hdr-inner > a{min-height:44px}

            /* 16px inputs — anything smaller makes iOS Safari zoom on focus */
            input,select,textarea{font-size:16px !important}

            /* utility bar drops to the hotline only */
            .util-inner{padding:9px 20px !important;justify-content:center !important}
            .util-contacts{gap:0 !important;justify-content:center !important}
            .util-email,.util-tel2,.util-socials{display:none !important}

            .hdr-inner{padding:12px 20px !important}
            .footer-bottom{padding:20px !important;flex-direction:column !important;align-items:flex-start !important;gap:10px !important}
        }

        @media (max-width:560px){
            .hdr-cta{display:none !important}
        }

        /* rich-text (Trix) output */
        .trix-content h1{font:600 26px/1.25 'Space Grotesk',sans-serif;color:#14202b;margin:0 0 14px}
        .trix-content p{margin:0 0 16px}
        .trix-content ul,.trix-content ol{margin:0 0 16px;padding-left:22px}
        .trix-content ul{list-style:disc}
        .trix-content ol{list-style:decimal}
        .trix-content li{margin:0 0 6px}
        .trix-content a{color:#1b63a8;text-decoration:underline}
        .trix-content strong{font-weight:600}
        .trix-content blockquote{margin:0 0 16px;padding-left:16px;border-left:3px solid #e1141c;color:#5a6772}
    </style>
    @stack('styles')
</head>
<body>
<div style="width:100%;overflow-x:hidden">

    {{-- ===================== UTILITY BAR ===================== --}}
    <div style="background:#e1141c;color:#fff">
        <div class="util-inner" style="max-width:1600px;margin:0 auto;padding:9px 40px;display:flex;justify-content:space-between;align-items:center;gap:16px;font:500 12.5px/1 'IBM Plex Mono',monospace;letter-spacing:.01em;flex-wrap:wrap">
            <div class="util-contacts" style="display:flex;gap:24px;align-items:center;flex-wrap:wrap">
                <a href="mailto:info@nemtpower.com" class="util-email" style="color:#fff;display:inline-flex;gap:8px;align-items:center"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="#fff" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg>info@nemtpower.com</a>
                <a href="tel:+94777890890" class="util-phone" style="color:#fff;display:inline-flex;gap:8px;align-items:center"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="#fff" stroke-width="2"><path d="M5 4h4l2 5-3 2a12 12 0 006 6l2-3 5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z"></path></svg>+94 777 890 890</a>
                <span class="util-tel2" style="opacity:.85">+94 11 291 3131</span>
            </div>
            <div class="util-socials" style="display:flex;gap:7px">
                @foreach (['X' => '#', 'f' => 'https://www.facebook.com/nemtpower', 'ig' => '#', 'sk' => '#', 'in' => '#'] as $s => $url)
                    <a href="{{ $url }}" @if($url !== '#') target="_blank" rel="noopener noreferrer" @endif class="util-social" style="color:#fff;width:22px;height:22px;border:1px solid rgba(255,255,255,.55);border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font:600 8px 'IBM Plex Mono',monospace;transition:background .2s,color .2s">{{ $s }}</a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===================== HEADER ===================== --}}
    <header style="position:sticky;top:0;z-index:50;background:rgba(255,255,255,.96);backdrop-filter:blur(8px);border-bottom:1px solid #eef2f5">
        <div class="hdr-inner" style="max-width:1600px;margin:0 auto;padding:16px 40px;display:flex;justify-content:space-between;align-items:center;gap:12px">
            <a href="{{ url('/') }}" style="display:flex;align-items:center;gap:9px;line-height:1">
                <span style="display:block">
                    <span style="font:700 27px/1 'Space Grotesk',sans-serif;letter-spacing:-.01em"><span style="color:#e1141c">N</span><span style="color:#14202b">emt</span><span style="color:#1b63a8">power</span><span style="color:#e1141c">.</span></span>
                    <span style="display:block;font:500 8px 'IBM Plex Mono',monospace;letter-spacing:.24em;color:#8b98a2;text-transform:uppercase;margin-top:4px">Enhanced Power Solutions · Since 2013</span>
                </span>
            </a>
            <div class="hdr-right" style="display:flex;align-items:center;gap:32px">
                <nav class="desktop-nav" style="display:flex;gap:26px;font:500 15px 'IBM Plex Sans',sans-serif">
                    <a href="{{ url('/') }}#home" @class(['navlink' => !request()->routeIs('home')]) @style(['color:#e1141c' => request()->routeIs('home')])>Home</a>
                    <a href="{{ route('about') }}" @class(['navlink' => !request()->routeIs('about')]) @style(['color:#e1141c' => request()->routeIs('about')]) wire:navigate>About</a>
                    <a href="{{ route('services') }}" @class(['navlink' => !request()->routeIs('services')]) @style(['color:#e1141c' => request()->routeIs('services')]) wire:navigate>Services</a>
                    <a href="{{ route('projects.index') }}" @class(['navlink' => !request()->routeIs('projects.*')]) @style(['color:#e1141c' => request()->routeIs('projects.*')]) wire:navigate>Projects</a>
                    <a href="{{ url('/') }}#brands" class="navlink">Brands</a>
                </nav>
                <a href="{{ route('contact') }}" class="btn-red hdr-cta" style="padding:11px 22px;border-radius:5px;font:600 14px 'IBM Plex Sans',sans-serif">Contact Us</a>
                <button type="button" class="nav-toggle" data-nav-toggle aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#14202b" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16"></path></svg>
                </button>
            </div>
        </div>
    </header>

    {{-- ===================== MOBILE MENU ===================== --}}
    <div id="mobile-menu" class="mobile-menu" aria-hidden="true">
        <div class="mobile-menu-backdrop" data-nav-close></div>
        <aside class="mobile-menu-panel" role="dialog" aria-modal="true" aria-label="Site menu">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
                <span style="font:700 22px/1 'Space Grotesk',sans-serif;letter-spacing:-.01em"><span style="color:#e1141c">N</span><span style="color:#14202b">emt</span><span style="color:#1b63a8">power</span><span style="color:#e1141c">.</span></span>
                <button type="button" class="nav-toggle" data-nav-close aria-label="Close menu" style="display:inline-flex">
                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#14202b" stroke-width="2"><path d="M6 6l12 12M18 6L6 18"></path></svg>
                </button>
            </div>
            <nav style="display:flex;flex-direction:column">
                <a href="{{ url('/') }}#home" class="mobile-navlink" @if(request()->routeIs('home')) data-current @endif>Home</a>
                <a href="{{ route('about') }}" class="mobile-navlink" @if(request()->routeIs('about')) data-current @endif wire:navigate>About</a>
                <a href="{{ route('services') }}" class="mobile-navlink" @if(request()->routeIs('services')) data-current @endif wire:navigate>Services</a>
                <a href="{{ route('projects.index') }}" class="mobile-navlink" @if(request()->routeIs('projects.*')) data-current @endif wire:navigate>Projects</a>
                <a href="{{ url('/') }}#brands" class="mobile-navlink">Brands</a>
            </nav>
            <a href="{{ route('contact') }}" class="btn-red" style="margin-top:22px;padding:15px 22px;border-radius:6px;font:600 15px 'IBM Plex Sans',sans-serif;display:flex;align-items:center;justify-content:center;gap:9px" wire:navigate>Contact Us <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#fff" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></a>
            <div style="margin-top:24px;padding-top:20px;border-top:1px solid #eef2f5;font:400 14px/1.7 'IBM Plex Sans',sans-serif;color:#5a6772">
                <a href="tel:+94777890890" style="display:flex;align-items:center;min-height:44px;color:#14202b;font-weight:600">+94 777 890 890</a>
                <a href="mailto:info@nemtpower.com" style="display:flex;align-items:center;min-height:44px;color:#14202b;font-weight:600">info@nemtpower.com</a>
                <div style="margin-top:8px;color:#8b98a2">349/1A, Dalupitiya Road,<br>Mahara, Kadawatha, Sri Lanka.</div>
            </div>
        </aside>
    </div>

    {{ $slot }}

    {{-- ===================== FOOTER ===================== --}}
    <footer style="background:#0e1a24;color:#b6c4cf;padding:72px 0 0">
        <div class="footer-grid" style="max-width:1600px;margin:0 auto;padding:0 40px 56px;display:grid;grid-template-columns:1.4fr 1fr 1fr;gap:56px">
            <div>
                <div style="font:700 26px/1 'Space Grotesk',sans-serif;letter-spacing:-.01em;margin-bottom:6px"><span style="color:#ff3b43">N</span><span style="color:#fff">emt</span><span style="color:#4d9be0">power</span><span style="color:#ff3b43">.</span></div>
                <div style="font:500 8px 'IBM Plex Mono',monospace;letter-spacing:.24em;color:#6f8496;text-transform:uppercase;margin-bottom:22px">Enhanced Power Solutions · Since 2013</div>
                <div style="font:400 14px/1.7 'IBM Plex Sans',sans-serif;color:#9fb0bd;margin-bottom:18px">NEMT POWER (PVT) LTD.<br>349/1A, Dalupitiya Road,<br>Mahara, Kadawatha, Sri Lanka.</div>
                <div style="font:400 13.5px/1.8 'IBM Plex Sans',sans-serif;color:#9fb0bd">Hotline: <span style="color:#fff">+94 777 890 890</span><br>Phone: <span style="color:#fff">+94 112 913 131</span><br>Email: <a href="mailto:info@nemtpower.com" class="footer-link" style="color:#4d9be0">info@nemtpower.com</a></div>
                <div style="display:flex;gap:8px;margin-top:22px">
                    @foreach (['X' => '#', 'f' => 'https://www.facebook.com/nemtpower', 'ig' => '#', 'sk' => '#', 'in' => '#'] as $s => $url)
                        <a href="{{ $url }}" @if($url !== '#') target="_blank" rel="noopener noreferrer" @endif class="footer-social" style="width:32px;height:32px;border-radius:6px;background:rgba(255,255,255,.08);color:#c7d4dd;display:inline-flex;align-items:center;justify-content:center;font:600 10px 'IBM Plex Mono',monospace;transition:background .2s,color .2s">{{ $s }}</a>
                    @endforeach
                </div>
            </div>
            <div>
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.16em;color:#fff;text-transform:uppercase;margin-bottom:20px">Useful Links</div>
                <div class="footer-links" style="display:flex;flex-direction:column;gap:12px;font:400 14.5px 'IBM Plex Sans',sans-serif">
                    <a href="{{ url('/') }}#home" class="footer-link" style="color:#9fb0bd">Home</a>
                    <a href="{{ route('about') }}" class="footer-link" style="color:#9fb0bd" wire:navigate>About Us</a>
                    <a href="{{ route('services') }}" class="footer-link" style="color:#9fb0bd" wire:navigate>Services</a>
                    <a href="{{ route('projects.index') }}" class="footer-link" style="color:#9fb0bd">Projects</a>
                    <a href="{{ url('/') }}#brands" class="footer-link" style="color:#9fb0bd">Our Brands</a>
                    <a href="{{ route('contact') }}" class="footer-link" style="color:#9fb0bd">Contact</a>
                </div>
            </div>
            <div>
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.16em;color:#fff;text-transform:uppercase;margin-bottom:20px">Our Services</div>
                <div class="footer-links" style="display:flex;flex-direction:column;gap:12px;font:400 14.5px 'IBM Plex Sans',sans-serif">
                    @foreach ([
                        'Power Switchboards' => null,
                        'Industrial Automation' => 'industrial-automation',
                        'MEP Project Consultations' => 'mep-consultations',
                        'Energy Audits' => 'energy-audits',
                        'Generator Repair & Services' => 'generator-repair',
                        'Industrial Wiring & Drawings' => 'industrial-wiring',
                    ] as $svc => $slug)
                        <a href="{{ route('services') }}{{ $slug ? '#'.$slug : '' }}" class="footer-link" style="color:#9fb0bd" wire:navigate>{{ $svc }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div style="border-top:1px solid rgba(255,255,255,.1)">
            <div class="footer-bottom" style="max-width:1600px;margin:0 auto;padding:24px 40px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;font:400 13px 'IBM Plex Sans',sans-serif;color:#7e8f9c">
                <div>© {{ date('Y') }} <span style="color:#fff">Nemt Power (Pvt) Ltd</span>. All Rights Reserved.</div>
                <div style="font:500 11px 'IBM Plex Mono',monospace;letter-spacing:.08em">ENHANCED POWER SOLUTIONS</div>
            </div>
        </div>
    </footer>

</div>

<script>
// Mobile menu. Bound once on document so it survives wire:navigate body swaps.
(function () {
    if (window.__nemtNav) return;
    window.__nemtNav = true;

    function panel() { return document.getElementById('mobile-menu'); }
    function toggleBtn() { return document.querySelector('[data-nav-toggle]'); }

    function open() {
        var m = panel(); if (!m) return;
        m.setAttribute('data-open', '');
        m.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        var t = toggleBtn(); if (t) t.setAttribute('aria-expanded', 'true');
    }
    function close() {
        var m = panel(); if (!m) return;
        m.removeAttribute('data-open');
        m.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        var t = toggleBtn(); if (t) t.setAttribute('aria-expanded', 'false');
    }

    document.addEventListener('click', function (e) {
        var el = e.target;
        if (!el || typeof el.closest !== 'function') return;
        if (el.closest('[data-nav-toggle]')) {
            e.preventDefault();
            var m = panel();
            if (m && m.hasAttribute('data-open')) close(); else open();
            return;
        }
        if (el.closest('[data-nav-close]') || el.closest('#mobile-menu a')) close();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' || e.keyCode === 27) close();
    });

    document.addEventListener('livewire:navigated', close);
})();

(function () {
    if ('IntersectionObserver' in window) {
        setTimeout(function () {
            var targets = Array.prototype.slice.call(document.querySelectorAll('[data-reveal]'));
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (e) {
                    if (e.isIntersecting) e.target.setAttribute('data-shown', '');
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -7% 0px' });
            targets.forEach(function (el) { io.observe(el); });
        }, 60);
    }
})();
</script>
@stack('scripts')
</body>
</html>

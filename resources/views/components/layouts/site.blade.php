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

        @media (prefers-reduced-motion:reduce){
            [data-reveal]{opacity:1 !important;transform:none !important;transition:none !important}
        }
        @media (max-width:960px){
            .grid-2,.grid-3,.grid-4,.footer-grid{grid-template-columns:1fr !important}
            .desktop-nav{display:none !important}
        }
        @media (max-width:560px){
            .grid-3{grid-template-columns:1fr !important}
            h1{font-size:40px !important}
        }
    </style>
    @stack('styles')
</head>
<body>
<div style="width:100%;overflow-x:hidden">

    {{-- ===================== UTILITY BAR ===================== --}}
    <div style="background:#e1141c;color:#fff">
        <div style="max-width:1600px;margin:0 auto;padding:9px 40px;display:flex;justify-content:space-between;align-items:center;gap:16px;font:500 12.5px/1 'IBM Plex Mono',monospace;letter-spacing:.01em;flex-wrap:wrap">
            <div style="display:flex;gap:24px;align-items:center;flex-wrap:wrap">
                <a href="mailto:info@nemtpower.com" style="color:#fff;display:inline-flex;gap:8px;align-items:center"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="#fff" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg>info@nemtpower.com</a>
                <a href="tel:+94777890890" style="color:#fff;display:inline-flex;gap:8px;align-items:center"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="#fff" stroke-width="2"><path d="M5 4h4l2 5-3 2a12 12 0 006 6l2-3 5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z"></path></svg>+94 777 890 890</a>
                <span style="opacity:.85">+94 11 291 3131</span>
            </div>
            <div style="display:flex;gap:7px">
                @foreach (['X','f','ig','sk','in'] as $s)
                    <a href="#" class="util-social" style="color:#fff;width:22px;height:22px;border:1px solid rgba(255,255,255,.55);border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font:600 8px 'IBM Plex Mono',monospace;transition:background .2s,color .2s">{{ $s }}</a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===================== HEADER ===================== --}}
    <header style="position:sticky;top:0;z-index:50;background:rgba(255,255,255,.96);backdrop-filter:blur(8px);border-bottom:1px solid #eef2f5">
        <div style="max-width:1600px;margin:0 auto;padding:16px 40px;display:flex;justify-content:space-between;align-items:center">
            <a href="{{ url('/') }}" style="display:flex;align-items:center;gap:9px;line-height:1">
                <span style="display:block">
                    <span style="font:700 27px/1 'Space Grotesk',sans-serif;letter-spacing:-.01em"><span style="color:#e1141c">N</span><span style="color:#14202b">emt</span><span style="color:#1b63a8">power</span><span style="color:#e1141c">.</span></span>
                    <span style="display:block;font:500 8px 'IBM Plex Mono',monospace;letter-spacing:.24em;color:#8b98a2;text-transform:uppercase;margin-top:4px">Enhanced Power Solutions · Since 2013</span>
                </span>
            </a>
            <div style="display:flex;align-items:center;gap:32px">
                <nav class="desktop-nav" style="display:flex;gap:26px;font:500 15px 'IBM Plex Sans',sans-serif">
                    <a href="{{ url('/') }}#home" class="navlink">Home</a>
                    <a href="{{ url('/') }}#about" class="navlink">About</a>
                    <a href="{{ url('/') }}#services" class="navlink">Services</a>
                    <a href="{{ route('projects.index') }}" style="color:#e1141c">Projects</a>
                    <a href="{{ url('/') }}#brands" class="navlink">Brands</a>
                </nav>
                <a href="{{ url('/') }}#contact" class="btn-red" style="padding:11px 22px;border-radius:5px;font:600 14px 'IBM Plex Sans',sans-serif">Contact Us</a>
            </div>
        </div>
    </header>

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
                    @foreach (['X','f','ig','sk','in'] as $s)
                        <a href="#" class="footer-social" style="width:32px;height:32px;border-radius:6px;background:rgba(255,255,255,.08);color:#c7d4dd;display:inline-flex;align-items:center;justify-content:center;font:600 10px 'IBM Plex Mono',monospace;transition:background .2s,color .2s">{{ $s }}</a>
                    @endforeach
                </div>
            </div>
            <div>
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.16em;color:#fff;text-transform:uppercase;margin-bottom:20px">Useful Links</div>
                <div style="display:flex;flex-direction:column;gap:12px;font:400 14.5px 'IBM Plex Sans',sans-serif">
                    <a href="{{ url('/') }}#home" class="footer-link" style="color:#9fb0bd">Home</a>
                    <a href="{{ url('/') }}#about" class="footer-link" style="color:#9fb0bd">About Us</a>
                    <a href="{{ url('/') }}#services" class="footer-link" style="color:#9fb0bd">Services</a>
                    <a href="{{ route('projects.index') }}" class="footer-link" style="color:#9fb0bd">Projects</a>
                    <a href="{{ url('/') }}#brands" class="footer-link" style="color:#9fb0bd">Our Brands</a>
                    <a href="{{ url('/') }}#contact" class="footer-link" style="color:#9fb0bd">Contact</a>
                </div>
            </div>
            <div>
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.16em;color:#fff;text-transform:uppercase;margin-bottom:20px">Our Services</div>
                <div style="display:flex;flex-direction:column;gap:12px;font:400 14.5px 'IBM Plex Sans',sans-serif">
                    @foreach (['Power Switchboards','Industrial Automation','MEP Project Consultations','Energy Audits','Generator Repair & Services','Industrial Wiring & Drawings'] as $svc)
                        <a href="{{ url('/') }}#services" class="footer-link" style="color:#9fb0bd">{{ $svc }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div style="border-top:1px solid rgba(255,255,255,.1)">
            <div style="max-width:1600px;margin:0 auto;padding:24px 40px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;font:400 13px 'IBM Plex Sans',sans-serif;color:#7e8f9c">
                <div>© {{ date('Y') }} <span style="color:#fff">Nemt Power (Pvt) Ltd</span>. All Rights Reserved.</div>
                <div style="font:500 11px 'IBM Plex Mono',monospace;letter-spacing:.08em">ENHANCED POWER SOLUTIONS</div>
            </div>
        </div>
    </footer>

</div>

<script>
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

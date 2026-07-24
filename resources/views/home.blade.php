<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nemt Power (Pvt) Ltd — Enhanced Power Solutions</title>
    <meta name="description" content="Nemt Power designs, assembles and commissions type-tested LV switchboards and industrial automation systems across Sri Lanka. Type-tested up to 4000A.">

    <link rel="icon" href="/favicon.png" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=IBM+Plex+Sans:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        *{box-sizing:border-box}
        body{margin:0;background:#fff;font-family:'IBM Plex Sans',system-ui,sans-serif;color:#14202b;-webkit-font-smoothing:antialiased}
        a{color:#1b63a8;text-decoration:none}

        /* reveal on scroll */
        [data-reveal]{opacity:0;transform:translateY(34px);transition:opacity .8s cubic-bezier(.22,.61,.36,1),transform .8s cubic-bezier(.22,.61,.36,1)}
        [data-reveal][data-shown]{opacity:1;transform:none}

        /* marquee */
        @keyframes nemt-scroll{from{transform:translateX(0)}to{transform:translateX(-50%)}}
        [data-marquee]{animation:nemt-scroll linear infinite;will-change:transform}
        [data-marquee]:hover{animation-play-state:paused}

        /* placeholder image tiles */
        .ph{background:linear-gradient(135deg,#e9eef2,#f5f7f9);display:flex;align-items:center;justify-content:center;text-align:center}
        .ph span{font:500 11px 'IBM Plex Mono',monospace;letter-spacing:.06em;color:#9aa7b1;padding:0 10px;text-transform:uppercase}
        img.cover{width:100%;height:100%;object-fit:cover;display:block}

        /* hover states (converted from design style-hover) */
        a:hover{color:#e1141c}
        .navlink{color:#3b4750}.navlink:hover{color:#e1141c}
        .btn-red{background:#e1141c;color:#fff}.btn-red:hover{background:#c10e15;color:#fff}
        .btn-ghost{border:1.5px solid rgba(255,255,255,.45);color:#fff}.btn-ghost:hover{border-color:#fff;color:#fff}
        .btn-outline{border:1.5px solid #cdd6dd;color:#14202b}.btn-outline:hover{border-color:#14202b;color:#14202b}
        .util-social:hover{background:#fff;color:#e1141c}
        .svc-card{transition:border-color .25s,box-shadow .25s,transform .25s}
        .svc-card:hover{border-color:#cdd6dd;box-shadow:0 14px 30px rgba(14,26,36,.10);transform:translateY(-3px)}
        .prj-card{color:inherit;transition:transform .25s}
        .prj-card:hover{transform:translateY(-4px)}
        .prj-card:hover h3{color:#e1141c}
        .prj-card .imgwrap{transition:box-shadow .3s}
        .prj-card:hover .imgwrap{box-shadow:0 16px 34px rgba(14,26,36,.16)}
        .prj-card img.cover{transition:transform .55s cubic-bezier(.22,.61,.36,1)}
        .prj-card:hover img.cover{transform:scale(1.06)}
        .svc-link{transition:gap .2s,color .2s}.svc-link:hover{gap:10px;color:#c10e15}
        .hero-ctrl{transition:background .2s}.hero-ctrl:hover{background:rgba(255,255,255,.22)}
        .footer-link:hover{color:#ff5960}
        .footer-social:hover{background:#e1141c;color:#fff}
        .field:focus{border-color:#e1141c}

        @media (prefers-reduced-motion:reduce){
            [data-reveal]{opacity:1 !important;transform:none !important;transition:none !important}
            [data-marquee]{animation:none}
        }
        @media (max-width:960px){
            .grid-2,.grid-3,.grid-4,.stat-strip,.footer-grid{grid-template-columns:1fr !important}
            .svc-grid{grid-template-columns:1fr 1fr !important}
            .featured-svc{grid-template-columns:1fr !important}
            .desktop-nav{display:none !important}
        }
        @media (max-width:560px){
            .svc-grid{grid-template-columns:1fr !important}
            h1{font-size:40px !important}
        }
    </style>
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
            <a href="#home" style="display:flex;align-items:center;gap:9px;line-height:1">
                <span style="display:block">
                    <span style="font:700 27px/1 'Space Grotesk',sans-serif;letter-spacing:-.01em"><span style="color:#e1141c">N</span><span style="color:#14202b">emt</span><span style="color:#1b63a8">power</span><span style="color:#e1141c">.</span></span>
                    <span style="display:block;font:500 8px 'IBM Plex Mono',monospace;letter-spacing:.24em;color:#8b98a2;text-transform:uppercase;margin-top:4px">Enhanced Power Solutions · Since 2013</span>
                </span>
            </a>
            <div style="display:flex;align-items:center;gap:32px">
                <nav class="desktop-nav" style="display:flex;gap:26px;font:500 15px 'IBM Plex Sans',sans-serif">
                    <a href="#home" style="color:#e1141c">Home</a>
                    <a href="#about" class="navlink" wire:navigate>About</a>
                    <a href="#services" wire:navigate class="navlink">Services</a>
                    <a href="/projects" wire:navigate class="navlink">Projects</a>
                    <a href="#brands" wire:navigate class="navlink">Brands</a>
                </nav>
                <a href="#contact" class="btn-red" style="padding:11px 22px;border-radius:5px;font:600 14px 'IBM Plex Sans',sans-serif">Contact Us</a>
            </div>
        </div>
    </header>

    {{-- ===================== HERO ===================== --}}
    <section id="home" style="background:#0b141d">
        <div style="position:relative;width:100%;min-height:calc(100vh - 128px);overflow:hidden">
            <div id="hero-track" style="position:absolute;inset:0;z-index:0;display:flex;transition:transform .7s cubic-bezier(.4,0,.2,1)">
                @php
                    $heroImgs = [
                        'https://images.unsplash.com/photo-1716191300020-b52dec5b70a8?auto=format&fit=crop&w=1900&q=80',
                        'https://images.unsplash.com/photo-1566417110104-cd4f94af0fb3?auto=format&fit=crop&w=1900&q=80',
                        'https://images.unsplash.com/photo-1607631697491-61972eecf928?auto=format&fit=crop&w=1900&q=80',
                        'https://images.unsplash.com/photo-1601462904263-f2fa0c851cb9?auto=format&fit=crop&w=1900&q=80',
                    ];
                @endphp
                @foreach ($heroImgs as $img)
                    <div style="flex:0 0 100%;position:relative"><img class="cover" style="position:absolute;inset:0" src="{{ $img }}" alt="Power engineering" loading="lazy"></div>
                @endforeach
            </div>
            <div style="position:absolute;inset:0;z-index:1;pointer-events:none;background:linear-gradient(90deg,rgba(8,14,20,.94) 0%,rgba(8,14,20,.82) 32%,rgba(8,14,20,.5) 62%,rgba(8,14,20,.2) 100%)"></div>
            <div style="position:relative;z-index:2;pointer-events:none;max-width:1600px;margin:0 auto;min-height:calc(100vh - 128px);display:flex;flex-direction:column;justify-content:center;padding:64px clamp(40px,6vw,72px)">
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#ff5b62;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#ff5b62"></span>Switchboards · Automation · Since 2013</div>
                <h1 style="font:600 60px/1.03 'Space Grotesk',sans-serif;letter-spacing:-.025em;color:#fff;margin:24px 0 20px;text-wrap:balance">Power systems,<br>engineered to spec.</h1>
                <p style="font:400 18px/1.6 'IBM Plex Sans',sans-serif;color:#c6d1da;max-width:520px;margin:0 0 34px">We design, assemble and commission type-tested LV switchboards and industrial automation systems for factories and commercial buildings across Sri Lanka.</p>
                <div style="display:flex;gap:14px;align-items:center;margin-bottom:36px;flex-wrap:wrap">
                    <a href="#contact" class="btn-red" style="pointer-events:auto;padding:15px 26px;border-radius:5px;font:600 15px 'IBM Plex Sans',sans-serif;display:inline-flex;align-items:center;gap:9px">Contact Us <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#fff" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></a>
                    <a href="#services" class="btn-ghost" style="pointer-events:auto;padding:14px 24px;border-radius:5px;font:600 15px 'IBM Plex Sans',sans-serif">Our Services</a>
                </div>
                <div style="font:500 13px 'IBM Plex Mono',monospace;letter-spacing:.04em;color:rgba(255,255,255,.66)">12+ YEARS · 250+ PROJECTS · TYPE-TESTED TO 4000A</div>
            </div>
            <div style="position:absolute;right:clamp(24px,4vw,64px);bottom:40px;z-index:3;pointer-events:none;background:#fff;border-top:3px solid #e1141c;border-radius:6px;box-shadow:0 16px 34px rgba(8,14,20,.4);padding:16px 22px">
                <div style="font:600 10px 'IBM Plex Mono',monospace;letter-spacing:.16em;color:#e1141c;text-transform:uppercase">Capability</div>
                <div style="font:600 32px/1 'Space Grotesk',sans-serif;color:#14202b;margin:6px 0 4px">4000A</div>
                <div style="font:400 12px 'IBM Plex Sans',sans-serif;color:#6a7681">Type-tested LV switchboards</div>
            </div>
            <div style="position:absolute;left:clamp(40px,6vw,72px);bottom:40px;z-index:3;display:flex;align-items:center;gap:16px">
                <button id="hero-prev" aria-label="Previous slide" class="hero-ctrl" style="width:42px;height:42px;border-radius:50%;border:1px solid rgba(255,255,255,.28);background:rgba(255,255,255,.1);backdrop-filter:blur(6px);cursor:pointer;display:flex;align-items:center;justify-content:center">
                    <svg viewBox="0 0 24 24" width="19" height="19" fill="none" stroke="#fff" stroke-width="2.4"><path d="M15 6l-6 6 6 6"></path></svg>
                </button>
                <div id="hero-dots" style="display:flex;gap:9px;align-items:center">
                    @foreach ($heroImgs as $i => $img)
                        <button data-dot="{{ $i }}" aria-label="Go to slide {{ $i + 1 }}" style="height:8px;border:none;border-radius:99px;padding:0;cursor:pointer;transition:width .3s,background .3s;width:{{ $i === 0 ? '26px' : '8px' }};background:{{ $i === 0 ? '#e1141c' : 'rgba(255,255,255,.5)' }}"></button>
                    @endforeach
                </div>
                <button id="hero-next" aria-label="Next slide" class="hero-ctrl" style="width:42px;height:42px;border-radius:50%;border:1px solid rgba(255,255,255,.28);background:rgba(255,255,255,.1);backdrop-filter:blur(6px);cursor:pointer;display:flex;align-items:center;justify-content:center">
                    <svg viewBox="0 0 24 24" width="19" height="19" fill="none" stroke="#fff" stroke-width="2.4"><path d="M9 6l6 6-6 6"></path></svg>
                </button>
            </div>
        </div>
    </section>

    {{-- ===================== STAT STRIP ===================== --}}
    <section style="background:#14202b;color:#fff">
        <div class="stat-strip" style="max-width:1600px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr)">
            @php
                $stats = [['12','+','Years of experience'],['250','+','Projects delivered'],['180','+','Satisfied clients'],['4000A','','Type-tested rating']];
            @endphp
            @foreach ($stats as $i => $stat)
                <div style="padding:34px 40px;{{ $i > 0 ? 'border-left:1px solid rgba(255,255,255,.12)' : '' }}">
                    <div style="font:600 34px/1 'Space Grotesk',sans-serif">{{ $stat[0] }}<span style="color:#e1141c">{{ $stat[1] }}</span></div>
                    <div style="font:500 11px 'IBM Plex Mono',monospace;letter-spacing:.12em;color:#8fa0ad;margin-top:9px;text-transform:uppercase">{{ $stat[2] }}</div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ===================== ABOUT ===================== --}}
    <section id="about" style="background:#fff;padding:100px 0">
        <div class="grid-2" style="max-width:1600px;margin:0 auto;padding:0 40px;display:grid;grid-template-columns:.95fr 1.05fr;gap:72px;align-items:center">
            <div style="display:flex;flex-direction:column;gap:22px">
                <div style="position:relative;height:300px;border-radius:10px;overflow:hidden;box-shadow:0 12px 30px rgba(14,26,36,.12)">
                    <img class="cover" style="position:absolute;inset:0" src="https://images.unsplash.com/photo-1775989233801-012eca66ab26?auto=format&fit=crop&w=1200&q=80" alt="Control systems / automation" loading="lazy">
                </div>
                <div style="display:grid;grid-template-columns:1.4fr .9fr;gap:22px;align-items:stretch">
                    <div style="position:relative;height:220px;border-radius:10px;overflow:hidden;box-shadow:0 12px 30px rgba(14,26,36,.12)">
                        <img class="cover" style="position:absolute;inset:0" src="https://images.unsplash.com/photo-1645639417590-32e8778b2141?auto=format&fit=crop&w=1000&q=80" alt="Switchboard floor" loading="lazy">
                    </div>
                    <div style="background:#14202b;color:#fff;border-radius:10px;padding:24px;display:flex;flex-direction:column;justify-content:center">
                        <div style="font:600 40px/1 'Space Grotesk',sans-serif;color:#fff">2013</div>
                        <div style="font:500 11px 'IBM Plex Mono',monospace;letter-spacing:.12em;color:#8fa0ad;margin-top:8px;text-transform:uppercase">Established</div>
                        <div style="font:500 11px 'IBM Plex Mono',monospace;letter-spacing:.08em;color:#e1141c;margin-top:18px">REG. WN 6780</div>
                    </div>
                </div>
            </div>
            <div>
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#e1141c"></span>Who we are</div>
                <h2 style="font:600 40px/1.1 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#14202b;margin:18px 0 22px;text-wrap:balance">State-of-the-art engineering solutions.</h2>
                <p style="font:400 16.5px/1.7 'IBM Plex Sans',sans-serif;color:#4a5661;margin:0 0 18px">Nemt Power (Pvt) Ltd is a well-established engineering solutions company in Sri Lanka. Founded in 2013 to close the market gap for reliable, quality industrial automation systems and electrical power switchboards, we were incorporated as a private limited company in 2021.</p>
                <p style="font:400 16.5px/1.7 'IBM Plex Sans',sans-serif;color:#4a5661;margin:0 0 28px">Today we are a leading assembler of power switchboards and provider of industrial automation systems, delivering high-quality, reliable power systems type-tested up to 4000A — backed by a rigorous quality management system on the assembly floor.</p>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px 26px">
                    @foreach (['World-reputed switchgear brands','Type-tested to 4000A','24/7 breakdown response','In-house engineering & drawings'] as $point)
                        <div style="display:flex;gap:11px;align-items:flex-start"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#e1141c" stroke-width="2.4" style="flex-shrink:0;margin-top:1px"><path d="M20 6L9 17l-5-5"></path></svg><span style="font:500 15px/1.4 'IBM Plex Sans',sans-serif;color:#2d3842">{{ $point }}</span></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== SERVICES ===================== --}}
    <section id="services" style="background:#f5f7f9;padding:100px 0;border-top:1px solid #eaeef1">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px">
            <div style="max-width:640px;margin-bottom:48px">
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#e1141c"></span>What we do</div>
                <h2 style="font:600 40px/1.1 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#14202b;margin:18px 0 14px;text-wrap:balance">Engineered power services, end to end.</h2>
                <p style="font:400 17px/1.65 'IBM Plex Sans',sans-serif;color:#4a5661;margin:0">From design and drawings to assembly, installation and lifetime support — one engineering team across the whole project.</p>
            </div>

            {{-- featured core service --}}
            <div class="featured-svc" style="background:#14202b;border-radius:12px;overflow:hidden;display:grid;grid-template-columns:1fr 1fr;margin-bottom:26px">
                <div style="padding:48px 46px;color:#fff;display:flex;flex-direction:column;justify-content:center">
                    <div style="font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.16em;text-transform:uppercase;color:#ff5960">Core capability</div>
                    <h3 style="font:600 30px/1.15 'Space Grotesk',sans-serif;color:#fff;margin:16px 0 14px">Power Switchboards</h3>
                    <p style="font:400 16px/1.65 'IBM Plex Sans',sans-serif;color:#b6c4cf;margin:0 0 26px;max-width:400px">Type-tested LV switchboards assembled to order — from distribution boards to main panels rated up to 4000A, built with world-reputed switchgear on a quality-controlled floor.</p>
                    <div style="display:flex;gap:26px;flex-wrap:wrap">
                        @foreach ([['4000A','Rated to'],['Type-tested','Assemblies'],['QMS','Controlled floor']] as $cap)
                            <div><div style="font:600 24px 'Space Grotesk',sans-serif;color:#fff">{{ $cap[0] }}</div><div style="font:500 10px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8fa0ad;margin-top:4px;text-transform:uppercase">{{ $cap[1] }}</div></div>
                        @endforeach
                    </div>
                </div>
                <div style="position:relative;min-height:320px">
                    <img class="cover" style="position:absolute;inset:0" src="https://images.unsplash.com/photo-1566417110090-6b15a06ec800?auto=format&fit=crop&w=1400&q=80" alt="Switchboard / panel" loading="lazy">
                </div>
            </div>

            {{-- service grid --}}
            @php
                $services = [
                    ['Industrial Automation','PLC & control systems for reliable, efficient and safe plant operation.','<rect x="4" y="4" width="16" height="16" rx="2"></rect><path d="M9 9h6M9 12h6M9 15h3"></path><circle cx="7" cy="9" r=".6" fill="#e1141c"></circle>'],
                    ['MEP Project Consultations','Mechanical, electrical &amp; plumbing consultation for new builds and upgrades.','<path d="M3 21h18"></path><path d="M5 21V8l7-4 7 4v13"></path><path d="M9 21v-6h6v6"></path>'],
                    ['Energy Audits','Identify losses and cut consumption with a measured, data-led audit.','<path d="M4 15a8 8 0 0116 0"></path><path d="M12 15l4-4"></path><circle cx="12" cy="15" r="1.4" fill="#e1141c" stroke="none"></circle>'],
                    ['Generator Repair &amp; Services','Installation, servicing and breakdown support for standby generators.','<rect x="3" y="6" width="18" height="12" rx="2"></rect><path d="M13 9l-3 4h3l-1 3"></path>'],
                    ['Industrial Wiring','All kinds of industrial wiring, executed safely and to standard.','<path d="M9 3v6M15 3v6M8 9h8v3a4 4 0 01-8 0z"></path><path d="M12 16v5"></path>'],
                    ['Engineering Drawings','Accurate schematics and layout drawings, produced in-house.','<path d="M12 3l9 5-9 5-9-5z"></path><path d="M3 8v8l9 5 9-5V8"></path>'],
                ];
            @endphp
            <div class="svc-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:22px">
                @foreach ($services as $i => $svc)
                    <div class="svc-card" style="background:#fff;border:1px solid #e6ebef;border-radius:11px;padding:32px 30px">
                        <div style="display:flex;justify-content:space-between;align-items:flex-start"><div style="width:52px;height:52px;border-radius:11px;background:#fdecec;color:#e1141c;display:flex;align-items:center;justify-content:center"><svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="#e1141c" stroke-width="1.7">{!! $svc[2] !!}</svg></div><span style="font:600 12px 'IBM Plex Mono',monospace;color:#c3ccd3">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span></div>
                        <h3 style="font:600 20px 'Space Grotesk',sans-serif;color:#14202b;margin:22px 0 10px">{!! $svc[0] !!}</h3>
                        <p style="font:400 15px/1.6 'IBM Plex Sans',sans-serif;color:#5a6772;margin:0 0 18px">{!! $svc[1] !!}</p>
                        <a href="#contact" class="svc-link" style="font:600 13px 'IBM Plex Sans',sans-serif;color:#e1141c;display:inline-flex;align-items:center;gap:6px">Learn more →</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== PROJECTS ===================== --}}
    <section id="projects" style="background:#fff;padding:100px 0">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px">
            <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:44px;gap:24px;flex-wrap:wrap">
                <div style="max-width:600px">
                    <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#e1141c"></span>Selected work</div>
                    <h2 style="font:600 40px/1.1 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#14202b;margin:18px 0 0;text-wrap:balance">Projects delivered across Sri Lanka.</h2>
                </div>
                <a href="{{ route('projects.index') }}" class="btn-outline" style="font:600 14px 'IBM Plex Sans',sans-serif;padding:12px 22px;border-radius:5px;white-space:nowrap">View all projects →</a>
            </div>
            @php
                $projects = \App\Models\Project::query()
                    ->where('active', true)
                    ->where('is_featured', true)
                    ->latest()
                    ->take(3)
                    ->get();
            @endphp
            @if ($projects->isNotEmpty())
                <div class="grid-3" style="display:grid;grid-template-columns:repeat(3,1fr);gap:26px">
                    @foreach ($projects as $p)
                        <a href="{{ route('projects.show', $p) }}" class="prj-card" style="display:block;color:inherit">
                            <div class="imgwrap" style="position:relative;height:250px;border-radius:11px;overflow:hidden;margin-bottom:18px;background:#f5f7f9">
                                @if ($p->image)
                                    <img class="cover" style="position:absolute;inset:0" src="{{ \Storage::disk('public')->url($p->image) }}" alt="{{ $p->title }}" loading="lazy">
                                @else
                                    <div class="ph" style="position:absolute;inset:0"><span>Nemt Power project</span></div>
                                @endif
                                @if ($p->category)
                                    <span style="position:absolute;top:14px;left:14px;background:rgba(20,32,43,.85);color:#fff;font:600 10px 'IBM Plex Mono',monospace;letter-spacing:.1em;padding:6px 10px;border-radius:4px;text-transform:uppercase">{{ $p->category }}</span>
                                @endif
                            </div>
                            @if ($p->location)
                                <div style="font:500 12px 'IBM Plex Mono',monospace;letter-spacing:.08em;color:#8b98a2;text-transform:uppercase;margin-bottom:8px"> {{$p->category ?  $p->category : '' }} | {{ $p->location }}</div>
                            @endif
                            <h3 style="font:600 21px/1.25 'Space Grotesk',sans-serif;color:#14202b;margin:0">{{ $p->title }}</h3>
                            @if ($p->description)
                                <p style="font:400 15px/1.6 'IBM Plex Sans',sans-serif;color:#5a6772;margin:10px 0 0">{{ \Illuminate\Support\Str::limit(strip_tags($p->description), 120) }}</p>
                            @endif
                        </a>
                    @endforeach
                </div>
            @else
                <div style="text-align:center;padding:60px 20px;border:1px dashed #d5dde3;border-radius:12px">
                    <div style="font:500 13px 'IBM Plex Mono',monospace;letter-spacing:.06em;color:#8b98a2;text-transform:uppercase">Featured projects coming soon.</div>
                </div>
            @endif
        </div>
    </section>

    {{-- ===================== TESTIMONIALS + CLIENTS ===================== --}}
    <section style="background:#f5f7f9;padding:100px 0;border-top:1px solid #eaeef1">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px">
            <div style="max-width:600px;margin-bottom:46px">
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#e1141c"></span>Client trust</div>
                <h2 style="font:600 40px/1.1 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#14202b;margin:18px 0 0;text-wrap:balance">Trusted by industry.</h2>
            </div>
            @php
                $testimonials = [
                    'Nemt Power delivered our main distribution board on time and exactly to specification. Their engineers were responsive throughout commissioning.',
                    'The automation upgrade improved our line uptime noticeably. A professional team that understands industrial power.',
                    'Reliable 24/7 breakdown support gives us real peace of mind. We keep coming back to Nemt Power for our switchboards.',
                ];
            @endphp
            <div class="grid-3" style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin-bottom:56px">
                @foreach ($testimonials as $t)
                    <div style="background:#fff;border:1px solid #e6ebef;border-top:3px solid #e1141c;border-radius:11px;padding:32px 30px">
                        <div style="font:700 40px/1 'Space Grotesk',sans-serif;color:#e1141c;height:24px">“</div>
                        <p style="font:400 16.5px/1.65 'IBM Plex Sans',sans-serif;color:#2d3842;margin:14px 0 24px">{{ $t }}</p>
                        <div style="display:flex;align-items:center;gap:12px">
                            <div class="ph" style="width:44px;height:44px;border-radius:50%;overflow:hidden;flex-shrink:0"><span>Photo</span></div>
                            <div><div style="font:600 14px 'IBM Plex Sans',sans-serif;color:#14202b">Client Name</div><div style="font:400 12px 'IBM Plex Mono',monospace;color:#8b98a2">Role · Company</div></div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="border-top:1px solid #e2e8ec;padding-top:36px">
                <div style="font:500 12px 'IBM Plex Mono',monospace;letter-spacing:.12em;color:#8b98a2;text-transform:uppercase;text-align:center;margin-bottom:26px">Trusted by clients across sectors</div>
                <div style="overflow:hidden;-webkit-mask:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent);mask:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent)">
                    <div data-marquee style="display:flex;width:max-content;animation-duration:36s">
                        @foreach (array_merge(range(1,5), range(1,5)) as $c)
                            <div class="ph" style="flex:0 0 220px;height:64px;border:1px solid #e6ebef;border-radius:8px;overflow:hidden;margin-right:20px"><span>Client logo</span></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== OUR BRANDS ===================== --}}
    <section id="brands" style="background:#fff;padding:100px 0">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px;text-align:center">
            <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c;display:inline-flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#e1141c"></span>Switchgear partners</div>
            <h2 style="font:600 40px/1.1 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#14202b;margin:18px 0 12px;text-wrap:balance">We build with world-reputed brands.</h2>
            <p style="font:400 17px/1.65 'IBM Plex Sans',sans-serif;color:#4a5661;margin:0 auto 48px;max-width:560px">We use world-reputed brands &amp; accessories for our switchboards — for performance you can rely on.</p>
            @php $brands = ['Schneider Electric','Siemens','Phoenix Contact','Grässlin','Socomec','Your brand']; @endphp
            <div style="overflow:hidden;-webkit-mask:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent);mask:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent)">
                <div data-marquee style="display:flex;width:max-content;animation-duration:40s">
                    @foreach (array_merge($brands, $brands) as $b)
                        <div class="ph" style="flex:0 0 240px;height:96px;background:#f5f7f9;border:1px solid #eaeef1;border-radius:10px;overflow:hidden;margin-right:20px"><span>{{ $b }}</span></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== CONTACT ===================== --}}
    <section id="contact" style="background:#f5f7f9;padding:100px 0;border-top:1px solid #eaeef1">
        <div class="grid-2" style="max-width:1600px;margin:0 auto;padding:0 40px;display:grid;grid-template-columns:.9fr 1.1fr;gap:64px;align-items:start">
            <div>
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#e1141c"></span>Get in touch</div>
                <h2 style="font:600 40px/1.1 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#14202b;margin:18px 0 16px;text-wrap:balance">Let's discuss your power project.</h2>
                <p style="font:400 17px/1.65 'IBM Plex Sans',sans-serif;color:#4a5661;margin:0 0 34px">Tell us what you need and our engineers will get back to you with a scoped response.</p>
                <div style="display:flex;flex-direction:column;gap:14px">
                    <div style="background:#fff;border:1px solid #e6ebef;border-radius:10px;padding:20px 22px;display:flex;gap:16px;align-items:flex-start">
                        <div style="width:44px;height:44px;border-radius:10px;background:#fdecec;color:#e1141c;display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#e1141c" stroke-width="1.8"><path d="M12 21s-7-6.2-7-11a7 7 0 0114 0c0 4.8-7 11-7 11z"></path><circle cx="12" cy="10" r="2.5"></circle></svg></div>
                        <div><div style="font:600 14px 'IBM Plex Sans',sans-serif;color:#14202b;margin-bottom:4px">Our Address</div><div style="font:400 14px/1.55 'IBM Plex Sans',sans-serif;color:#5a6772">349/1A, Dalupitiya Road,<br>Mahara, Kadawatha, Sri Lanka</div></div>
                    </div>
                    <div style="background:#fff;border:1px solid #e6ebef;border-radius:10px;padding:20px 22px;display:flex;gap:16px;align-items:flex-start">
                        <div style="width:44px;height:44px;border-radius:10px;background:#fdecec;color:#e1141c;display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#e1141c" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg></div>
                        <div><div style="font:600 14px 'IBM Plex Sans',sans-serif;color:#14202b;margin-bottom:4px">Email Us</div><a href="mailto:info@nemtpower.com" style="font:400 14px 'IBM Plex Sans',sans-serif;color:#5a6772">info@nemtpower.com</a></div>
                    </div>
                    <div style="background:#fff;border:1px solid #e6ebef;border-radius:10px;padding:20px 22px;display:flex;gap:16px;align-items:flex-start">
                        <div style="width:44px;height:44px;border-radius:10px;background:#fdecec;color:#e1141c;display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#e1141c" stroke-width="1.8"><path d="M5 4h4l2 5-3 2a12 12 0 006 6l2-3 5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z"></path></svg></div>
                        <div><div style="font:600 14px 'IBM Plex Sans',sans-serif;color:#14202b;margin-bottom:4px">Call Us</div><div style="font:400 14px/1.55 'IBM Plex Sans',sans-serif;color:#5a6772">Hotline: +94 777 890 890<br>Hotline: +94 114 836 836 · Tel: +94 112 913 131</div></div>
                    </div>
                </div>
            </div>
            <div style="background:#fff;border:1px solid #e6ebef;border-radius:14px;padding:40px;box-shadow:0 20px 44px rgba(14,26,36,.10)">
                <form id="enquiry-form">
                    <div id="enquiry-fields">
                        <h3 style="font:600 22px 'Space Grotesk',sans-serif;color:#14202b;margin:0 0 6px">Request a quote</h3>
                        <p style="font:400 14px 'IBM Plex Sans',sans-serif;color:#8b98a2;margin:0 0 26px">We usually respond within one business day.</p>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px">
                            <div><label style="display:block;font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:7px">Name</label><input type="text" name="name" placeholder="Your name" class="field" style="width:100%;border:1px solid #d5dde3;border-radius:7px;padding:12px 14px;font:400 15px 'IBM Plex Sans',sans-serif;color:#14202b;background:#fff;outline:none"></div>
                            <div><label style="display:block;font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:7px">Company</label><input type="text" name="company" placeholder="Company" class="field" style="width:100%;border:1px solid #d5dde3;border-radius:7px;padding:12px 14px;font:400 15px 'IBM Plex Sans',sans-serif;color:#14202b;background:#fff;outline:none"></div>
                        </div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px">
                            <div><label style="display:block;font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:7px">Email</label><input type="email" name="email" placeholder="you@company.com" class="field" style="width:100%;border:1px solid #d5dde3;border-radius:7px;padding:12px 14px;font:400 15px 'IBM Plex Sans',sans-serif;color:#14202b;background:#fff;outline:none"></div>
                            <div><label style="display:block;font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:7px">Phone</label><input type="tel" name="phone" placeholder="+94 ..." class="field" style="width:100%;border:1px solid #d5dde3;border-radius:7px;padding:12px 14px;font:400 15px 'IBM Plex Sans',sans-serif;color:#14202b;background:#fff;outline:none"></div>
                        </div>
                        <div style="margin-bottom:22px"><label style="display:block;font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:7px">How can we help?</label><textarea name="message" rows="4" placeholder="Tell us about your project, capacity, timeline…" class="field" style="width:100%;border:1px solid #d5dde3;border-radius:7px;padding:12px 14px;font:400 15px/1.5 'IBM Plex Sans',sans-serif;color:#14202b;background:#fff;outline:none;resize:vertical"></textarea></div>
                        <button type="submit" class="btn-red" style="width:100%;border:none;padding:16px;border-radius:8px;font:600 15px 'IBM Plex Sans',sans-serif;cursor:pointer;display:inline-flex;align-items:center;justify-content:center;gap:9px">Send Enquiry <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#fff" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></button>
                    </div>
                    <div id="enquiry-sent" style="display:none;text-align:center;padding:48px 20px">
                        <div style="width:64px;height:64px;border-radius:50%;background:#e9f7ef;display:inline-flex;align-items:center;justify-content:center;margin-bottom:22px"><svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="#1a9e5f" stroke-width="2.4"><path d="M20 6L9 17l-5-5"></path></svg></div>
                        <h3 style="font:600 24px 'Space Grotesk',sans-serif;color:#14202b;margin:0 0 10px">Thank you — enquiry received.</h3>
                        <p style="font:400 16px/1.6 'IBM Plex Sans',sans-serif;color:#5a6772;margin:0">Our engineers will get back to you within one business day.</p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- ===================== MAP BAND ===================== --}}
    <section style="position:relative;height:380px;background:#e5eaee;background-image:linear-gradient(#d7dee4 1px,transparent 1px),linear-gradient(90deg,#d7dee4 1px,transparent 1px);background-size:44px 44px;display:flex;align-items:center;justify-content:center">
        <div style="text-align:center">
            <div style="display:inline-flex;flex-direction:column;align-items:center;gap:12px">
                <svg viewBox="0 0 24 24" width="40" height="40" fill="#e1141c" stroke="none"><path d="M12 2a7 7 0 00-7 7c0 5 7 13 7 13s7-8 7-13a7 7 0 00-7-7zm0 9.5A2.5 2.5 0 1112 6.5a2.5 2.5 0 010 5z"></path></svg>
                <div style="font:600 15px 'IBM Plex Sans',sans-serif;color:#14202b">NEMT Group of Companies</div>
                <div style="font:500 12px 'IBM Plex Mono',monospace;letter-spacing:.06em;color:#8b98a2">◳ MAP · embed Google Maps here · Mahara, Kadawatha</div>
            </div>
        </div>
    </section>

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
                    @foreach (['Home' => '#home','About Us' => '#about','Services' => '#services','Projects' => '#projects','Our Brands' => '#brands','Contact' => '#contact'] as $label => $href)
                        <a href="{{ $href }}" class="footer-link" style="color:#9fb0bd">{{ $label }}</a>
                    @endforeach
                </div>
            </div>
            <div>
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.16em;color:#fff;text-transform:uppercase;margin-bottom:20px">Our Services</div>
                <div style="display:flex;flex-direction:column;gap:12px;font:400 14.5px 'IBM Plex Sans',sans-serif">
                    @foreach (['Power Switchboards','Industrial Automation','MEP Project Consultations','Energy Audits','Generator Repair & Services','Industrial Wiring & Drawings'] as $svc)
                        <a href="#services" class="footer-link" style="color:#9fb0bd">{{ $svc }}</a>
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
    // ---- Hero carousel ----
    var track = document.getElementById('hero-track');
    var dots = Array.prototype.slice.call(document.querySelectorAll('#hero-dots [data-dot]'));
    var COUNT = dots.length;
    var idx = 0, timer;

    function render() {
        track.style.transform = 'translateX(-' + (idx * 100) + '%)';
        dots.forEach(function (d, i) {
            d.style.width = i === idx ? '26px' : '8px';
            d.style.background = i === idx ? '#e1141c' : 'rgba(255,255,255,.5)';
        });
    }
    function go(i) { idx = (i % COUNT + COUNT) % COUNT; render(); start(); }
    function start() { clearInterval(timer); timer = setInterval(function () { go(idx + 1); }, 5500); }

    dots.forEach(function (d, i) { d.addEventListener('click', function () { go(i); }); });
    var prev = document.getElementById('hero-prev'), next = document.getElementById('hero-next');
    if (prev) prev.addEventListener('click', function () { go(idx - 1); });
    if (next) next.addEventListener('click', function () { go(idx + 1); });
    render(); start();

    // ---- Reveal on scroll ----
    if ('IntersectionObserver' in window) {
        setTimeout(function () {
            var secs = Array.prototype.slice.call(document.querySelectorAll('section')).filter(function (s) { return s.id !== 'home'; });
            var targets = [];
            secs.forEach(function (sec) {
                var inner = sec.querySelector(':scope > div');
                if (!inner) return;
                var kids = Array.prototype.slice.call(inner.children).filter(function (c) { return c.nodeType === 1; });
                var group = kids.length >= 2 ? kids : [inner];
                group.forEach(function (el, i) {
                    el.setAttribute('data-reveal', '');
                    el.style.transitionDelay = (i * 90) + 'ms';
                    targets.push(el);
                });
            });
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (e) {
                    if (e.isIntersecting) e.target.setAttribute('data-shown', '');
                    else e.target.removeAttribute('data-shown');
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -7% 0px' });
            targets.forEach(function (el) { io.observe(el); });
        }, 60);
    }

    // ---- Enquiry form (front-end only, mirrors design behaviour) ----
    var form = document.getElementById('enquiry-form');
    if (form) form.addEventListener('submit', function (e) {
        e.preventDefault();
        document.getElementById('enquiry-fields').style.display = 'none';
        document.getElementById('enquiry-sent').style.display = 'block';
    });
})();
</script>
</body>
</html>

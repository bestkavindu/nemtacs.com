<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('components.layouts.site')] #[Title('Services')] class extends Component {
    //
}; ?>

<div>
    {{-- ===================== BREADCRUMB ===================== --}}
    <div style="background:#0b141d;border-bottom:1px solid rgba(255,255,255,.08)">
        <div style="max-width:1600px;margin:0 auto;padding:16px 40px;font:500 13px 'IBM Plex Sans',sans-serif;color:#7e8f9c">
            <a href="{{ url('/') }}" style="color:#7e8f9c">Home</a>
            <span style="margin:0 8px;opacity:.5">/</span>
            <span style="color:#fff">Services</span>
        </div>
    </div>

    {{-- ===================== HERO ===================== --}}
    <section style="background:#0b141d;position:relative;overflow:hidden;padding:64px 0 96px">
        <div style="position:absolute;inset:0;z-index:0">
            <img class="cover" style="position:absolute;inset:0;opacity:.16;filter:grayscale(.3)" src="https://images.unsplash.com/photo-1566417110090-6b15a06ec800?auto=format&fit=crop&w=1900&q=80" alt="" aria-hidden="true">
        </div>
        <div style="position:absolute;inset:0;z-index:1;background:linear-gradient(90deg,rgba(8,14,20,.97),rgba(8,14,20,.82))"></div>
        <div style="position:relative;z-index:2;max-width:1600px;margin:0 auto;padding:0 40px">
            <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#ff5b62;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#ff5b62"></span>What we do</div>
            <h1 style="font:600 clamp(38px,4.6vw,52px)/1.06 'Space Grotesk',sans-serif;letter-spacing:-.025em;color:#fff;margin:20px 0 20px;max-width:760px;text-wrap:balance">Power, automation &amp; engineering services, end to end.</h1>
            <p style="font:400 17px/1.7 'IBM Plex Sans',sans-serif;color:#c6d1da;max-width:620px;margin:0 0 34px">From the first consultation to a type-tested switchboard on your site, Nemt Power delivers the full scope of industrial electrical work &mdash; consulting, assembly, wiring, drawings and ongoing support.</p>
            <a href="{{ route('contact') }}" class="btn-red" style="padding:14px 24px;border-radius:5px;font:600 15px 'IBM Plex Sans',sans-serif;display:inline-flex;align-items:center;gap:9px">Talk to our engineers <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#fff" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></a>
        </div>
    </section>

    {{-- ===================== SERVICE LIST ===================== --}}
    @php
        $serviceDetails = [
            [
                'slug' => 'industrial-automation',
                'title' => 'Industrial Automation',
                'summary' => 'PLC &amp; control systems for reliable, efficient and safe plant operation.',
                'body' => 'We design and build PLC-based control systems that keep production lines running safely and efficiently. Every panel is engineered to your process, tested on our floor, and commissioned on site by our own engineers.',
                'points' => ['PLC & SCADA control panels', 'Process automation upgrades', 'On-site commissioning & testing'],
                'img' => 'https://images.unsplash.com/photo-1775989233801-012eca66ab26?auto=format&fit=crop&w=1200&q=80',
                'alt' => 'Industrial automation control panel',
            ],
            [
                'slug' => 'mep-consultations',
                'title' => 'MEP Project Consultations',
                'summary' => 'Mechanical, electrical &amp; plumbing consultation for new builds and upgrades.',
                'body' => 'Our engineers advise on mechanical, electrical and plumbing scope from the earliest design stage, helping architects, contractors and building owners avoid costly rework and meet code from day one.',
                'points' => ['Load calculations & system sizing', 'Design review & coordination', 'New build & retrofit projects'],
                'img' => 'https://images.unsplash.com/photo-1607631697491-61972eecf928?auto=format&fit=crop&w=1200&q=80',
                'alt' => 'MEP project consultation on site',
            ],
            [
                'slug' => 'energy-audits',
                'title' => 'Energy Audits',
                'summary' => 'Identify losses and cut consumption with a measured, data-led audit.',
                'body' => 'We measure real consumption across your facility, identify where power is being lost, and hand over a practical, prioritised plan to cut costs &mdash; backed by data, not guesswork.',
                'points' => ['Load & consumption profiling', 'Loss & inefficiency reporting', 'Prioritised savings roadmap'],
                'img' => 'https://images.unsplash.com/photo-1601462904263-f2fa0c851cb9?auto=format&fit=crop&w=1200&q=80',
                'alt' => 'Energy audit inspection',
            ],
            [
                'slug' => 'generator-repair',
                'title' => 'Generator Repair &amp; Services',
                'summary' => 'Installation, servicing and breakdown support for standby generators.',
                'body' => 'From installation to routine servicing and 24-hour breakdown callouts, our technicians keep your standby power ready to run the moment the grid fails.',
                'points' => ['Installation & commissioning', 'Scheduled preventive servicing', '24-hour breakdown response'],
                'img' => 'https://images.unsplash.com/photo-1566417110104-cd4f94af0fb3?auto=format&fit=crop&w=1200&q=80',
                'alt' => 'Generator repair and servicing',
            ],
            [
                'slug' => 'industrial-wiring',
                'title' => 'Industrial Wiring',
                'summary' => 'All kinds of industrial wiring, executed safely and to standard.',
                'body' => 'Our licensed electricians carry out all classes of industrial wiring &mdash; from distribution boards to final circuits &mdash; executed to code and signed off with proper documentation.',
                'points' => ['Distribution board wiring', 'Cable containment & termination', 'Testing, tagging & sign-off'],
                'img' => 'https://images.unsplash.com/photo-1645639417590-32e8778b2141?auto=format&fit=crop&w=1200&q=80',
                'alt' => 'Industrial wiring installation',
            ],
            [
                'slug' => 'engineering-drawings',
                'title' => 'Engineering Drawings',
                'summary' => 'Accurate schematics and layout drawings, produced in-house.',
                'body' => 'Our in-house drafting team produces single-line diagrams, panel layouts and as-built drawings that match exactly what leaves our assembly floor &mdash; no third-party delays.',
                'points' => ['Single-line & schematic diagrams', 'Panel & layout drawings', 'As-built documentation'],
                'img' => 'https://images.unsplash.com/photo-1553406830-ef2513450d76?auto=format&fit=crop&w=1200&q=80',
                'alt' => 'Engineering schematic drawings',
            ],
        ];
    @endphp

    @foreach ($serviceDetails as $i => $svc)
        <section id="{{ $svc['slug'] }}" style="background:{{ $i % 2 === 0 ? '#fff' : '#f5f7f9' }};padding:88px 0;{{ $i % 2 !== 0 ? 'border-top:1px solid #eaeef1;border-bottom:1px solid #eaeef1' : '' }}">
            <div class="grid-2" style="max-width:1600px;margin:0 auto;padding:0 40px;display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center">
                <div style="{{ $i % 2 !== 0 ? 'order:2' : '' }};position:relative;height:340px;border-radius:12px;overflow:hidden;box-shadow:0 14px 32px rgba(14,26,36,.12)">
                    <img class="cover" style="position:absolute;inset:0" src="{{ $svc['img'] }}" alt="{{ $svc['alt'] }}" loading="lazy">
                </div>
                <div style="{{ $i % 2 !== 0 ? 'order:1' : '' }}">
                    <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} &mdash; Service</div>
                    <h2 style="font:600 34px/1.15 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#14202b;margin:16px 0 14px;text-wrap:balance">{!! $svc['title'] !!}</h2>
                    <p style="font:500 16px/1.6 'IBM Plex Sans',sans-serif;color:#e1141c;margin:0 0 16px">{!! $svc['summary'] !!}</p>
                    <p style="font:400 16px/1.7 'IBM Plex Sans',sans-serif;color:#4a5661;margin:0 0 24px">{!! $svc['body'] !!}</p>
                    <div style="display:flex;flex-direction:column;gap:12px;margin-bottom:28px">
                        @foreach ($svc['points'] as $point)
                            <div style="display:flex;align-items:center;gap:10px;font:500 14.5px 'IBM Plex Sans',sans-serif;color:#14202b">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#e1141c" stroke-width="2.4" style="flex-shrink:0"><path d="M20 6L9 17l-5-5"></path></svg>
                                {{ $point }}
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('contact') }}" class="btn-outline" style="padding:13px 22px;border-radius:5px;font:600 14px 'IBM Plex Sans',sans-serif;display:inline-flex;align-items:center;gap:8px">Enquire about this service →</a>
                </div>
            </div>
        </section>
    @endforeach

    {{-- ===================== APPROACH ===================== --}}
    <section style="background:#fff;padding:100px 0">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px">
            <div style="max-width:640px;margin-bottom:48px">
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#e1141c"></span>How we work</div>
                <h2 style="font:600 40px/1.1 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#14202b;margin:18px 0 14px;text-wrap:balance">A straightforward process, start to finish.</h2>
                <p style="font:400 17px/1.65 'IBM Plex Sans',sans-serif;color:#4a5661;margin:0">The same four steps behind every service we deliver, regardless of scope.</p>
            </div>
            @php
                $steps = [
                    ['01', 'Consult', 'We assess your requirement on site or on paper and scope the right solution.'],
                    ['02', 'Design', 'Our engineers size the system and produce drawings and specifications in-house.'],
                    ['03', 'Assemble & Install', 'Panels are built or wiring executed on our controlled floor and on your site.'],
                    ['04', 'Support', 'Testing, sign-off and 24-hour breakdown support after handover.'],
                ];
            @endphp
            <div class="grid-4" style="display:grid;grid-template-columns:repeat(4,1fr);gap:24px">
                @foreach ($steps as $step)
                    <div style="border-top:3px solid #e1141c;padding-top:18px">
                        <div style="font:600 13px 'IBM Plex Mono',monospace;color:#c3ccd3;margin-bottom:12px">{{ $step[0] }}</div>
                        <h3 style="font:600 20px 'Space Grotesk',sans-serif;color:#14202b;margin:0 0 10px">{{ $step[1] }}</h3>
                        <p style="font:400 15px/1.6 'IBM Plex Sans',sans-serif;color:#5a6772;margin:0">{{ $step[2] }}</p>
                    </div>
                @endforeach
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

    {{-- ===================== CTA ===================== --}}
    <section style="background:#f5f7f9;padding:80px 0;border-top:1px solid #eaeef1">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px">
            <div style="background:#14202b;border-radius:14px;padding:56px;display:flex;justify-content:space-between;align-items:center;gap:32px;flex-wrap:wrap">
                <div style="max-width:560px">
                    <h2 style="font:600 30px/1.2 'Space Grotesk',sans-serif;color:#fff;margin:0 0 10px;text-wrap:balance">Not sure which service you need?</h2>
                    <p style="font:400 16px/1.6 'IBM Plex Sans',sans-serif;color:#b6c4cf;margin:0">Tell us about your project and our engineers will recommend the right scope.</p>
                </div>
                <a href="{{ route('contact') }}" class="btn-red" style="padding:16px 28px;border-radius:6px;font:600 15px 'IBM Plex Sans',sans-serif;display:inline-flex;align-items:center;gap:9px;white-space:nowrap">Get in touch <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#fff" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></a>
            </div>
        </div>
    </section>
</div>

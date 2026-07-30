<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('components.layouts.site')] #[Title('About Us')] class extends Component {
    //
}; ?>

<div>
    {{-- ===================== BREADCRUMB ===================== --}}
    <div style="background:#0b141d;border-bottom:1px solid rgba(255,255,255,.08)">
        <div style="max-width:1600px;margin:0 auto;padding:16px 40px;font:500 13px 'IBM Plex Sans',sans-serif;color:#7e8f9c">
            <a href="{{ url('/') }}" style="color:#7e8f9c">Home</a>
            <span style="margin:0 8px;opacity:.5">/</span>
            <span style="color:#fff">About Us</span>
        </div>
    </div>

    {{-- ===================== HERO ===================== --}}
    <section style="background:#0b141d;position:relative;overflow:hidden;padding:64px 0 96px">
        <div style="position:absolute;inset:0;z-index:0">
            <img class="cover" style="position:absolute;inset:0;opacity:.16;filter:grayscale(.3)" src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1900&q=80" alt="" aria-hidden="true">
        </div>
        <div style="position:absolute;inset:0;z-index:1;background:linear-gradient(90deg,rgba(8,14,20,.97),rgba(8,14,20,.82))"></div>
        <div style="position:relative;z-index:2;max-width:1600px;margin:0 auto;padding:0 40px">
            <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#ff5b62;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#ff5b62"></span>Who we are</div>
            <h1 style="font:600 clamp(38px,4.6vw,52px)/1.06 'Space Grotesk',sans-serif;letter-spacing:-.025em;color:#fff;margin:20px 0 20px;max-width:720px;text-wrap:balance">Engineering reliable power, since 2013.</h1>
            <p style="font:400 17px/1.7 'IBM Plex Sans',sans-serif;color:#c6d1da;max-width:600px;margin:0 0 34px">Nemt Power (Pvt) Ltd is a well-established, state-of-the-art engineering solutions company in Sri Lanka, serving industrial automation and power switchboard needs nationwide.</p>
            <a href="{{ route('contact') }}" class="btn-red" style="padding:14px 24px;border-radius:5px;font:600 15px 'IBM Plex Sans',sans-serif;display:inline-flex;align-items:center;gap:9px">Talk to our engineers <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#fff" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></a>
        </div>
    </section>

    {{-- ===================== COMPANY OVERVIEW ===================== --}}
    <section style="background:#fff;padding:100px 0">
        <div class="grid-2" style="max-width:1600px;margin:0 auto;padding:0 40px;display:grid;grid-template-columns:.95fr 1.05fr;gap:72px;align-items:center">
            <div style="display:flex;flex-direction:column;gap:22px">
                <div style="position:relative;height:300px;border-radius:10px;overflow:hidden;box-shadow:0 12px 30px rgba(14,26,36,.12)">
                    <img class="cover" style="position:absolute;inset:0" src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80" alt="Industrial control panel" loading="lazy">
                </div>
                <div style="display:grid;grid-template-columns:1.4fr .9fr;gap:22px;align-items:stretch">
                    <div style="position:relative;height:220px;border-radius:10px;overflow:hidden;box-shadow:0 12px 30px rgba(14,26,36,.12)">
                        <img class="cover" style="position:absolute;inset:0" src="https://images.unsplash.com/photo-1553406830-ef2513450d76?auto=format&fit=crop&w=1000&q=80" alt="Switchboard assembly floor" loading="lazy">
                    </div>
                    <div style="background:#14202b;color:#fff;border-radius:10px;padding:24px;display:flex;flex-direction:column;justify-content:center">
                        <div style="font:600 40px/1 'Space Grotesk',sans-serif;color:#fff">2013</div>
                        <div style="font:500 11px 'IBM Plex Mono',monospace;letter-spacing:.12em;color:#8fa0ad;margin-top:8px;text-transform:uppercase">Founded</div>
                        <div style="font:500 11px 'IBM Plex Mono',monospace;letter-spacing:.08em;color:#e1141c;margin-top:18px">REG. WN 6780</div>
                    </div>
                </div>
            </div>
            <div>
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#e1141c"></span>Our story</div>
                <h2 style="font:600 40px/1.1 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#14202b;margin:18px 0 22px;text-wrap:balance">From a market gap to a leading switchboard assembler.</h2>
                <p style="font:400 16.5px/1.7 'IBM Plex Sans',sans-serif;color:#4a5661;margin:0 0 18px">Nemt Power (Pvt) Ltd is a well-established, state-of-the-art engineering solutions company in Sri Lanka. In 2013, it was founded by our chairman to fulfil the market gap for reliable, quality industrial automation systems and electrical power switchboards, under the name "Nemt Power" and registration number WN 6780.</p>
                <p style="font:400 16.5px/1.7 'IBM Plex Sans',sans-serif;color:#4a5661;margin:0 0 18px">Several power distribution and industrial automation projects have since been completed successfully under the Nemt Power name, and the business was incorporated in 2021 as a private limited company. Today, Nemt Power (Pvt) Ltd is a leading power switchboard assembler and industrial automation system provider in Sri Lanka, serving high-quality, reliable power systems type-tested up to 4000A.</p>
                <p style="font:400 16.5px/1.7 'IBM Plex Sans',sans-serif;color:#4a5661;margin:0 0 18px">We have well-qualified engineers and technical teams who attend a 24-hour breakdown service, assuring an uninterrupted power system for our valued customers. We use world-reputed switchgear brands and accessories in our switchboards, and maintain a quality management system on the assembly work floor.</p>
                <p style="font:400 16.5px/1.7 'IBM Plex Sans',sans-serif;color:#4a5661;margin:0">At all times, we assure our clients of new, technologically innovative power solutions that deliver enhanced reliability, safety and performance.</p>
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

    {{-- ===================== WHAT SETS US APART ===================== --}}
    <section style="background:#f5f7f9;padding:100px 0;border-top:1px solid #eaeef1">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px">
            <div style="max-width:640px;margin-bottom:48px">
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#e1141c"></span>Why Nemt Power</div>
                <h2 style="font:600 40px/1.1 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#14202b;margin:18px 0 14px;text-wrap:balance">What sets us apart.</h2>
                <p style="font:400 17px/1.65 'IBM Plex Sans',sans-serif;color:#4a5661;margin:0">The commitments that back every switchboard we assemble and every system we automate.</p>
            </div>
            @php
                $values = [
                    ['Quality Management System', 'A controlled, documented assembly floor so every panel meets the same rigorous standard.', '<path d="M9 12l2 2 4-4"></path><circle cx="12" cy="12" r="9"></circle>'],
                    ['24/7 Breakdown Response', 'Qualified engineers and technical teams on call around the clock for uninterrupted power.', '<circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 3"></path>'],
                    ['World-Reputed Brands', 'We fit our switchboards with globally trusted switchgear and accessories only.', '<path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7z"></path>'],
                    ['Innovation-Led', 'Continuously adopting new technology to improve reliability, safety and performance.', '<path d="M12 2v4M12 18v4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M2 12h4M18 12h4M4.9 19.1l2.8-2.8M16.3 7.7l2.8-2.8"></path><circle cx="12" cy="12" r="3"></circle>'],
                ];
            @endphp
            <div class="svc-grid" style="display:grid;grid-template-columns:repeat(4,1fr);gap:22px">
                @foreach ($values as $v)
                    <div class="svc-card" style="background:#fff;border:1px solid #e6ebef;border-radius:11px;padding:32px 28px">
                        <div style="width:52px;height:52px;border-radius:11px;background:#fdecec;color:#e1141c;display:flex;align-items:center;justify-content:center"><svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="#e1141c" stroke-width="1.7">{!! $v[2] !!}</svg></div>
                        <h3 style="font:600 19px 'Space Grotesk',sans-serif;color:#14202b;margin:22px 0 10px">{{ $v[0] }}</h3>
                        <p style="font:400 15px/1.6 'IBM Plex Sans',sans-serif;color:#5a6772;margin:0">{{ $v[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== MILESTONES ===================== --}}
    <section style="background:#fff;padding:100px 0">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px">
            <div style="max-width:640px;margin-bottom:48px">
                <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#e1141c"></span>Our journey</div>
                <h2 style="font:600 40px/1.1 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#14202b;margin:18px 0 0;text-wrap:balance">Milestones along the way.</h2>
            </div>
            @php
                $milestones = [
                    ['2013', 'Nemt Power founded by our chairman to close the market gap for reliable industrial automation and power switchboards.'],
                    ['2013–2021', 'Multiple power distribution and industrial automation projects completed successfully under the Nemt Power name.'],
                    ['2021', 'Incorporated as Nemt Power (Pvt) Ltd, a private limited company, registration no. WN 6780.'],
                    ['Today', 'A leading assembler of type-tested LV switchboards up to 4000A and provider of industrial automation systems across Sri Lanka.'],
                ];
            @endphp
            <div class="grid-4" style="display:grid;grid-template-columns:repeat(4,1fr);gap:24px">
                @foreach ($milestones as $m)
                    <div style="border-top:3px solid #e1141c;padding-top:18px">
                        <div style="font:600 22px 'Space Grotesk',sans-serif;color:#14202b;margin-bottom:10px">{{ $m[0] }}</div>
                        <p style="font:400 15px/1.6 'IBM Plex Sans',sans-serif;color:#5a6772;margin:0">{{ $m[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== CTA ===================== --}}
    <section style="background:#f5f7f9;padding:80px 0;border-top:1px solid #eaeef1">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px">
            <div style="background:#14202b;border-radius:14px;padding:56px;display:flex;justify-content:space-between;align-items:center;gap:32px;flex-wrap:wrap">
                <div style="max-width:560px">
                    <h2 style="font:600 30px/1.2 'Space Grotesk',sans-serif;color:#fff;margin:0 0 10px;text-wrap:balance">Ready to discuss your power project?</h2>
                    <p style="font:400 16px/1.6 'IBM Plex Sans',sans-serif;color:#b6c4cf;margin:0">Tell us your requirement and our engineers will come back with a scoped response.</p>
                </div>
                <a href="{{ route('contact') }}" class="btn-red" style="padding:16px 28px;border-radius:6px;font:600 15px 'IBM Plex Sans',sans-serif;display:inline-flex;align-items:center;gap:9px;white-space:nowrap">Get in touch <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#fff" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></a>
            </div>
        </div>
    </section>
</div>

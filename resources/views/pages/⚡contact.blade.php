<?php

use App\Mail\EnquiryReceived;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('components.layouts.site')] #[Title('Contact Us')] class extends Component {
    public string $name = '';
    public string $company = '';
    public string $email = '';
    public string $phone = '';
    public string $subject = '';
    public string $message = '';

    /** Honeypot — real visitors never see it, bots fill it in. */
    public string $website = '';

    public bool $sent = false;

    /**
     * @return array<string, mixed>
     */
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email:filter', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'website' => ['prohibited'],
        ];
    }

    /**
     * @return array<string, string>
     */
    protected function messages(): array
    {
        return [
            'message.min' => 'Please give us a little more detail so we can scope a response.',
        ];
    }

    public function submit(): void
    {
        $key = 'enquiry:'.request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $this->addError('message', 'Too many enquiries from this connection. Please try again later or call us directly.');

            return;
        }

        $validated = $this->validate();
        unset($validated['website']);

        RateLimiter::hit($key, 3600);

        $enquiry = Enquiry::create($validated + ['ip_address' => request()->ip()]);

        // The enquiry is already persisted, so a mail transport failure must not
        // lose it or show the visitor an error.
        try {
            Mail::to(config('mail.enquiries_to'))->send(new EnquiryReceived($enquiry));
        } catch (\Throwable $e) {
            Log::error('Enquiry mail failed', ['enquiry_id' => $enquiry->id, 'error' => $e->getMessage()]);
        }

        $this->reset(['name', 'company', 'email', 'phone', 'subject', 'message']);
        $this->sent = true;
    }
}; ?>

<div>
    @push('styles')
        <style>
            .field:focus{border-color:#e1141c;box-shadow:0 0 0 3px rgba(225,20,28,.12)}
            .field-error{border-color:#e1141c !important}
            .err{font:400 12.5px 'IBM Plex Sans',sans-serif;color:#e1141c;margin-top:6px}
            @media (max-width:760px){
                .contact-grid{grid-template-columns:1fr !important;gap:36px !important}
                .field-row{grid-template-columns:1fr !important;gap:14px !important}
                .contact-hero h1{font-size:34px !important;line-height:1.12 !important}
                /* horizontal overlay leaves mobile copy over the bright side */
                .contact-hero .hero-overlay{background:linear-gradient(180deg,rgba(8,14,20,.82),rgba(8,14,20,.96)) !important}
                .field{min-height:48px}
                textarea.field{min-height:132px}
            }
        </style>
    @endpush

    {{-- ===================== PAGE HERO ===================== --}}
    <section class="contact-hero" style="background:#0b141d;position:relative;overflow:hidden">
        <div class="hero-overlay" style="position:absolute;inset:0;z-index:1;background:linear-gradient(90deg,rgba(8,14,20,.96),rgba(8,14,20,.72))"></div>
        <div style="position:relative;z-index:2;max-width:1600px;margin:0 auto;padding:88px clamp(40px,6vw,72px)">
            <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#ff5b62;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#ff5b62"></span>Get in touch</div>
            <h1 style="font:600 54px/1.05 'Space Grotesk',sans-serif;letter-spacing:-.025em;color:#fff;margin:22px 0 16px;text-wrap:balance">Let's discuss your power project.</h1>
            <p style="font:400 18px/1.6 'IBM Plex Sans',sans-serif;color:#c6d1da;max-width:600px;margin:0">Tell us what you need — capacity, timeline, site conditions — and our engineers will come back to you with a scoped response.</p>
        </div>
    </section>

    {{-- ===================== CONTACT ===================== --}}
    <section style="background:#f5f7f9;padding:88px 0 100px;border-top:1px solid #eaeef1">
        <div class="contact-grid" style="max-width:1600px;margin:0 auto;padding:0 40px;display:grid;grid-template-columns:.9fr 1.1fr;gap:64px;align-items:start">

            {{-- details --}}
            <div>
                <h2 style="font:600 30px/1.15 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#14202b;margin:0 0 26px">Reach us directly</h2>
                <div style="display:flex;flex-direction:column;gap:14px">
                    <div style="background:#fff;border:1px solid #e6ebef;border-radius:10px;padding:20px 22px;display:flex;gap:16px;align-items:flex-start">
                        <div style="width:44px;height:44px;border-radius:10px;background:#fdecec;display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#e1141c" stroke-width="1.8"><path d="M12 21s-7-6.2-7-11a7 7 0 0114 0c0 4.8-7 11-7 11z"></path><circle cx="12" cy="10" r="2.5"></circle></svg></div>
                        <div><div style="font:600 14px 'IBM Plex Sans',sans-serif;color:#14202b;margin-bottom:4px">Our Address</div><div style="font:400 14px/1.55 'IBM Plex Sans',sans-serif;color:#5a6772">349/1A, Dalupitiya Road,<br>Mahara, Kadawatha, Sri Lanka</div></div>
                    </div>
                    <div style="background:#fff;border:1px solid #e6ebef;border-radius:10px;padding:20px 22px;display:flex;gap:16px;align-items:flex-start">
                        <div style="width:44px;height:44px;border-radius:10px;background:#fdecec;display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#e1141c" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg></div>
                        <div><div style="font:600 14px 'IBM Plex Sans',sans-serif;color:#14202b;margin-bottom:4px">Email Us</div><a href="mailto:info@nemtpower.com" class="tap-link" style="font:400 14px 'IBM Plex Sans',sans-serif;color:#5a6772">info@nemtpower.com</a></div>
                    </div>
                    <div style="background:#fff;border:1px solid #e6ebef;border-radius:10px;padding:20px 22px;display:flex;gap:16px;align-items:flex-start">
                        <div style="width:44px;height:44px;border-radius:10px;background:#fdecec;display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#e1141c" stroke-width="1.8"><path d="M5 4h4l2 5-3 2a12 12 0 006 6l2-3 5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z"></path></svg></div>
                        <div><div style="font:600 14px 'IBM Plex Sans',sans-serif;color:#14202b;margin-bottom:4px">Call Us</div><div style="font:400 14px/1.55 'IBM Plex Sans',sans-serif;color:#5a6772">Hotline: <a href="tel:+94777890890" class="tap-link" style="color:#5a6772">+94 777 890 890</a><br>Hotline: +94 114 836 836 · Tel: +94 112 913 131</div></div>
                    </div>
                    <div style="background:#fff;border:1px solid #e6ebef;border-radius:10px;padding:20px 22px;display:flex;gap:16px;align-items:flex-start">
                        <div style="width:44px;height:44px;border-radius:10px;background:#fdecec;display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#e1141c" stroke-width="1.8"><circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3.5 2"></path></svg></div>
                        <div><div style="font:600 14px 'IBM Plex Sans',sans-serif;color:#14202b;margin-bottom:4px">Working Hours</div><div style="font:400 14px/1.55 'IBM Plex Sans',sans-serif;color:#5a6772">Monday – Friday: 8.30am – 5.30pm<br>Saturday: 8.30am – 1.00pm</div></div>
                    </div>
                </div>
            </div>

            {{-- form --}}
            <div style="background:#fff;border:1px solid #e6ebef;border-radius:14px;padding:40px;box-shadow:0 20px 44px rgba(14,26,36,.10)">
                @if ($sent)
                    <div style="text-align:center;padding:48px 20px">
                        <div style="width:64px;height:64px;border-radius:50%;background:#e9f7ef;display:inline-flex;align-items:center;justify-content:center;margin-bottom:22px"><svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="#1a9e5f" stroke-width="2.4"><path d="M20 6L9 17l-5-5"></path></svg></div>
                        <h3 style="font:600 24px 'Space Grotesk',sans-serif;color:#14202b;margin:0 0 10px">Thank you — enquiry received.</h3>
                        <p style="font:400 16px/1.6 'IBM Plex Sans',sans-serif;color:#5a6772;margin:0 0 26px">Our engineers will get back to you within one business day.</p>
                        <button type="button" wire:click="$set('sent', false)" class="btn-outline" style="background:none;padding:12px 22px;border-radius:7px;font:600 14px 'IBM Plex Sans',sans-serif;cursor:pointer">Send another enquiry</button>
                    </div>
                @else
                    <form wire:submit="submit">
                        <h3 style="font:600 22px 'Space Grotesk',sans-serif;color:#14202b;margin:0 0 6px">Request a quote</h3>
                        <p style="font:400 14px 'IBM Plex Sans',sans-serif;color:#8b98a2;margin:0 0 26px">We usually respond within one business day.</p>

                        {{-- honeypot --}}
                        <div style="position:absolute;left:-9999px" aria-hidden="true">
                            <label>Website<input type="text" wire:model="website" tabindex="-1" autocomplete="off"></label>
                        </div>

                        <div class="field-row" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px">
                            <div>
                                <label for="c-name" style="display:block;font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:7px">Name</label>
                                <input id="c-name" type="text" wire:model="name" placeholder="Your name" class="field @error('name') field-error @enderror" style="width:100%;border:1px solid #d5dde3;border-radius:7px;padding:12px 14px;font:400 15px 'IBM Plex Sans',sans-serif;color:#14202b;background:#fff;outline:none">
                                @error('name') <div class="err">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <label for="c-company" style="display:block;font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:7px">Company</label>
                                <input id="c-company" type="text" wire:model="company" placeholder="Company" class="field @error('company') field-error @enderror" style="width:100%;border:1px solid #d5dde3;border-radius:7px;padding:12px 14px;font:400 15px 'IBM Plex Sans',sans-serif;color:#14202b;background:#fff;outline:none">
                                @error('company') <div class="err">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="field-row" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px">
                            <div>
                                <label for="c-email" style="display:block;font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:7px">Email</label>
                                <input id="c-email" type="email" wire:model="email" placeholder="you@company.com" class="field @error('email') field-error @enderror" style="width:100%;border:1px solid #d5dde3;border-radius:7px;padding:12px 14px;font:400 15px 'IBM Plex Sans',sans-serif;color:#14202b;background:#fff;outline:none">
                                @error('email') <div class="err">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <label for="c-phone" style="display:block;font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:7px">Phone</label>
                                <input id="c-phone" type="tel" wire:model="phone" placeholder="+94 ..." class="field @error('phone') field-error @enderror" style="width:100%;border:1px solid #d5dde3;border-radius:7px;padding:12px 14px;font:400 15px 'IBM Plex Sans',sans-serif;color:#14202b;background:#fff;outline:none">
                                @error('phone') <div class="err">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div style="margin-bottom:16px">
                            <label for="c-subject" style="display:block;font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:7px">Subject</label>
                            <input id="c-subject" type="text" wire:model="subject" placeholder="e.g. 2500A main distribution board" class="field @error('subject') field-error @enderror" style="width:100%;border:1px solid #d5dde3;border-radius:7px;padding:12px 14px;font:400 15px 'IBM Plex Sans',sans-serif;color:#14202b;background:#fff;outline:none">
                            @error('subject') <div class="err">{{ $message }}</div> @enderror
                        </div>

                        <div style="margin-bottom:22px">
                            <label for="c-message" style="display:block;font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:7px">How can we help?</label>
                            <textarea id="c-message" wire:model="message" rows="5" placeholder="Tell us about your project, capacity, timeline…" class="field @error('message') field-error @enderror" style="width:100%;border:1px solid #d5dde3;border-radius:7px;padding:12px 14px;font:400 15px/1.5 'IBM Plex Sans',sans-serif;color:#14202b;background:#fff;outline:none;resize:vertical"></textarea>
                            @error('message') <div class="err">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn-red" wire:loading.attr="disabled" style="width:100%;border:none;padding:16px;border-radius:8px;font:600 15px 'IBM Plex Sans',sans-serif;cursor:pointer;display:inline-flex;align-items:center;justify-content:center;gap:9px">
                            <span wire:loading.remove wire:target="submit">Send Enquiry</span>
                            <span wire:loading wire:target="submit">Sending…</span>
                            <svg wire:loading.remove wire:target="submit" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#fff" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"></path></svg>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </section>

    {{-- ===================== MAP BAND ===================== --}}
    <section style="position:relative;height:380px">
        <iframe
            src="https://www.google.com/maps?q=NEMT+GROUP+OF+COMPANIES,+6.9924974,79.938935&z=17&output=embed"
            width="100%" height="380" style="border:0;display:block" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade" title="NEMT Group of Companies location"></iframe>
    </section>
</div>

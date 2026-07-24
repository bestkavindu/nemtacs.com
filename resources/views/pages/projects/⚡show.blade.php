<?php

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('components.layouts.site')] class extends Component {
    public Project $project;

    public function mount(Project $project): void
    {
        abort_unless($project->active, 404);

        $this->project = $project;
    }

    public function rendering(View $view): void
    {
        $view->title($this->project->title);
    }

    public function with(): array
    {
        return [
            'related' => Project::query()
                ->where('active', true)
                ->whereKeyNot($this->project->getKey())
                ->when($this->project->category, fn ($q) => $q->where('category', $this->project->category))
                ->latest()
                ->take(3)
                ->get(),
        ];
    }
}; ?>

<div>
    @push('styles')
        <style>
            @media (max-width:720px){
                .meta-strip{grid-template-columns:1fr !important}
                .meta-strip>div{border-left:0 !important;border-top:1px solid #eef2f5}
                .meta-strip>div:first-child{border-top:0}
            }
        </style>
    @endpush

    {{-- ===================== BREADCRUMB ===================== --}}
    <div style="background:#0b141d;border-bottom:1px solid rgba(255,255,255,.08)">
        <div style="max-width:1600px;margin:0 auto;padding:16px 40px;font:500 13px 'IBM Plex Sans',sans-serif;color:#7e8f9c">
            <a href="{{ url('/') }}" style="color:#7e8f9c">Home</a>
            <span style="margin:0 8px;opacity:.5">/</span>
            <a href="{{ route('projects.index') }}" wire:navigate style="color:#7e8f9c">Projects</a>
            <span style="margin:0 8px;opacity:.5">/</span>
            <span style="color:#fff">{{ $project->title }}</span>
        </div>
    </div>

    {{-- ===================== HERO ===================== --}}
    <section style="background:#0b141d;position:relative;overflow:hidden;padding:64px 0 96px">
        @if ($project->image)
            <div style="position:absolute;inset:0;z-index:0"><img class="cover" style="position:absolute;inset:0;opacity:.14;filter:grayscale(.3)" src="{{ Storage::disk('public')->url($project->image) }}" alt="" aria-hidden="true"></div>
            <div style="position:absolute;inset:0;z-index:1;background:linear-gradient(90deg,rgba(8,14,20,.97),rgba(8,14,20,.82))"></div>
        @endif
        <div class="grid-2" style="position:relative;z-index:2;max-width:1600px;margin:0 auto;padding:0 40px;display:grid;grid-template-columns:1.05fr 1fr;gap:56px;align-items:center">
            <div>
                @if ($project->category)
                    <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#ff5b62;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#ff5b62"></span>{{ $project->category }}</div>
                @endif
                <h1 style="font:600 clamp(38px,4.6vw,52px)/1.06 'Space Grotesk',sans-serif;letter-spacing:-.025em;color:#fff;margin:20px 0 22px;text-wrap:balance">{{ $project->title }}</h1>

                <a href="{{ url('/') }}#contact" class="btn-red" style="padding:14px 24px;border-radius:5px;font:600 15px 'IBM Plex Sans',sans-serif;display:inline-flex;align-items:center;gap:9px">Enquire about similar work <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#fff" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></a>
            </div>

            <div style="position:relative">
                <div style="position:relative;aspect-ratio:16/10;border-radius:12px;overflow:hidden;box-shadow:0 22px 50px rgba(0,0,0,.45);background:#111c26">
                    @if ($project->image)
                        <img class="cover" style="position:absolute;inset:0" src="{{ Storage::disk('public')->url($project->image) }}" alt="{{ $project->title }}">
                    @else
                        <div class="ph" style="position:absolute;inset:0"><span>Nemt Power project</span></div>
                    @endif
                    @if ($project->category)
                        <span style="position:absolute;top:16px;left:16px;background:rgba(20,32,43,.85);color:#fff;font:600 10px 'IBM Plex Mono',monospace;letter-spacing:.1em;padding:7px 11px;border-radius:5px;text-transform:uppercase">{{ $project->category }}</span>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== META STRIP ===================== --}}
    <section style="background:#fff">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px">
            <div class="meta-strip" style="position:relative;margin-top:-48px;z-index:5;background:#fff;border:1px solid #e6ebef;border-radius:12px;box-shadow:0 14px 34px rgba(14,26,36,.10);display:grid;grid-template-columns:repeat(3,1fr);overflow:hidden">
                @php
                    $facts = collect([
                        ['Location', $project->location, 'M12 21s-7-6.2-7-11a7 7 0 0114 0c0 4.8-7 11-7 11z'],
                        ['Delivered', $project->created_at?->format('F Y'), 'M16 2v4M8 2v4M3 10h18'],
                        ['Category', $project->category, 'M4 4h6v6H4zM14 4h6v6h-6zM14 14h6v6h-6zM4 14h6v6H4z'],
                    ])->filter(fn ($f) => filled($f[1]))->values();
                @endphp
                @foreach ($facts as $f)
                    <div style="padding:24px 28px;border-left:{{ $loop->first ? '0' : '1px solid #eef2f5' }};display:flex;gap:14px;align-items:center">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#e1141c" stroke-width="1.7" style="flex-shrink:0"><path d="{{ $f[2] }}"></path></svg>
                        <div><div style="font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:4px">{{ $f[0] }}</div><div style="font:600 16px 'IBM Plex Sans',sans-serif;color:#14202b">{{ $f[1] }}</div></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== DESCRIPTION ===================== --}}
    <section style="background:#fff;padding:64px 0 100px">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px">
            @if ($project->description)
                <div style="max-width:820px">
                    <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c;margin-bottom:16px;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#e1141c"></span>Project overview</div>
                    <div class="trix-content" style="font:400 17.5px/1.8 'IBM Plex Sans',sans-serif;color:#3a4650">{!! $project->description !!}</div>
                </div>
            @endif

            <div style="margin-top:{{ $project->description ? '56px' : '0' }};padding-top:40px;border-top:1px solid #eaeef1;display:flex;justify-content:space-between;align-items:center;gap:20px;flex-wrap:wrap">
                <a href="{{ route('projects.index') }}" wire:navigate style="font:600 15px 'IBM Plex Sans',sans-serif;color:#14202b;display:inline-flex;align-items:center;gap:8px">← Back to all projects</a>
                <a href="{{ url('/') }}#contact" class="btn-outline" style="padding:12px 22px;border-radius:5px;font:600 14px 'IBM Plex Sans',sans-serif;display:inline-flex;align-items:center;gap:8px">Start a similar project →</a>
            </div>
        </div>
    </section>

    {{-- ===================== RELATED ===================== --}}
    @if ($related->isNotEmpty())
        <section style="background:#f5f7f9;padding:80px 0;border-top:1px solid #eaeef1">
            <div style="max-width:1600px;margin:0 auto;padding:0 40px">
                <h2 style="font:600 30px/1.1 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#14202b;margin:0 0 36px">More projects</h2>
                <div class="grid-3" style="display:grid;grid-template-columns:repeat(3,1fr);gap:26px">
                    @foreach ($related as $item)
                        <a href="{{ route('projects.show', $item) }}" wire:key="rel-{{ $item->id }}" wire:navigate class="prj-card" style="display:block;border:1px solid #e6ebef;border-radius:12px;overflow:hidden;background:#fff;color:inherit">
                            <div style="position:relative;height:220px;overflow:hidden;background:#f5f7f9">
                                @if ($item->image)
                                    <img class="cover" style="position:absolute;inset:0" src="{{ Storage::disk('public')->url($item->image) }}" alt="{{ $item->title }}" loading="lazy">
                                @else
                                    <div class="ph" style="position:absolute;inset:0"><span>Nemt Power project</span></div>
                                @endif
                            </div>
                            <div style="padding:22px 24px 26px">
                                @if ($item->location)
                                    <div style="font:500 12px 'IBM Plex Mono',monospace;letter-spacing:.08em;color:#8b98a2;text-transform:uppercase;margin-bottom:8px">{{ $item->location }}</div>
                                @endif
                                <h3 style="font:600 19px/1.25 'Space Grotesk',sans-serif;color:#14202b;margin:0">{{ $item->title }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>

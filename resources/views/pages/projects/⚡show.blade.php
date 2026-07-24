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
    {{-- ===================== BREADCRUMB ===================== --}}
    <div style="background:#f5f7f9;border-bottom:1px solid #eaeef1">
        <div style="max-width:1600px;margin:0 auto;padding:16px 40px;font:500 13px 'IBM Plex Sans',sans-serif;color:#8b98a2">
            <a href="{{ url('/') }}" style="color:#8b98a2">Home</a>
            <span style="margin:0 8px">/</span>
            <a href="{{ route('projects.index') }}" wire:navigate style="color:#8b98a2">Projects</a>
            <span style="margin:0 8px">/</span>
            <span style="color:#14202b">{{ $project->title }}</span>
        </div>
    </div>

    {{-- ===================== HEADER + IMAGE ===================== --}}
    <section style="background:#fff;padding:64px 0 0">
        <div class="grid-2" style="max-width:1600px;margin:0 auto;padding:0 40px;display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:start">
            <div>
                @if ($project->category)
                    <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#e1141c"></span>{{ $project->category }}</div>
                @endif
                <h1 style="font:600 46px/1.08 'Space Grotesk',sans-serif;letter-spacing:-.025em;color:#14202b;margin:18px 0 20px;text-wrap:balance">{{ $project->title }}</h1>

                <div style="display:flex;flex-direction:column;gap:14px;margin-bottom:30px">
                    @if ($project->location)
                        <div style="display:flex;gap:12px;align-items:flex-start">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#e1141c" stroke-width="1.8" style="flex-shrink:0;margin-top:2px"><path d="M12 21s-7-6.2-7-11a7 7 0 0114 0c0 4.8-7 11-7 11z"></path><circle cx="12" cy="10" r="2.5"></circle></svg>
                            <div><div style="font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:3px">Location</div><div style="font:500 16px 'IBM Plex Sans',sans-serif;color:#14202b">{{ $project->location }}</div></div>
                        </div>
                    @endif
                    <div style="display:flex;gap:12px;align-items:flex-start">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#e1141c" stroke-width="1.8" style="flex-shrink:0;margin-top:2px"><rect x="3" y="4" width="18" height="18" rx="2"></rect><path d="M16 2v4M8 2v4M3 10h18"></path></svg>
                        <div><div style="font:600 11px 'IBM Plex Mono',monospace;letter-spacing:.1em;color:#8b98a2;text-transform:uppercase;margin-bottom:3px">Delivered</div><div style="font:500 16px 'IBM Plex Sans',sans-serif;color:#14202b">{{ $project->created_at?->format('F Y') }}</div></div>
                    </div>
                </div>

                <a href="{{ url('/') }}#contact" class="btn-red" style="padding:14px 24px;border-radius:5px;font:600 15px 'IBM Plex Sans',sans-serif;display:inline-flex;align-items:center;gap:9px">Enquire about similar work <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#fff" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></a>
            </div>

            <div style="position:relative;height:420px;border-radius:12px;overflow:hidden;box-shadow:0 16px 40px rgba(14,26,36,.14);background:#f5f7f9">
                @if ($project->image)
                    <img class="cover" style="position:absolute;inset:0" src="{{ Storage::disk('public')->url($project->image) }}" alt="{{ $project->title }}">
                @else
                    <div class="ph" style="position:absolute;inset:0"><span>Nemt Power project</span></div>
                @endif
            </div>
        </div>
    </section>

    {{-- ===================== DESCRIPTION ===================== --}}
    <section style="background:#fff;padding:56px 0 100px">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px">
            @if ($project->description)
                <div style="max-width:820px">
                    <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#e1141c;margin-bottom:16px">Project overview</div>
                    <div style="font:400 17.5px/1.8 'IBM Plex Sans',sans-serif;color:#3a4650;white-space:pre-line">{{ $project->description }}</div>
                </div>
            @endif

            <div style="margin-top:{{ $project->description ? '56px' : '0' }};padding-top:40px;border-top:1px solid #eaeef1">
                <a href="{{ route('projects.index') }}" wire:navigate style="font:600 15px 'IBM Plex Sans',sans-serif;color:#14202b;display:inline-flex;align-items:center;gap:8px">← Back to all projects</a>
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

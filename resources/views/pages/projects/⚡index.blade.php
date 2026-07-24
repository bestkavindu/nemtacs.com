<?php

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('components.layouts.site')] #[Title('Projects')] class extends Component {
    use WithPagination;

    #[Url]
    public string $category = '';

    public function filter(string $category): void
    {
        $this->category = $category;
        $this->resetPage();
    }

    public function with(): array
    {
        return [
            'categories' => Project::query()
                ->where('active', true)
                ->whereNotNull('category')
                ->distinct()
                ->orderBy('category')
                ->pluck('category'),
            'projects' => Project::query()
                ->where('active', true)
                ->when($this->category, fn ($q) => $q->where('category', $this->category))
                ->latest()
                ->paginate(9),
        ];
    }
}; ?>

<div>
    {{-- ===================== PAGE HERO ===================== --}}
    <section style="background:#0b141d;position:relative;overflow:hidden">
        <div style="position:absolute;inset:0;z-index:0">
            <img class="cover" style="position:absolute;inset:0;opacity:.28" src="https://images.unsplash.com/photo-1576446470246-499c738d1c8e?auto=format&fit=crop&w=1900&q=80" alt="" loading="lazy">
        </div>
        <div style="position:absolute;inset:0;z-index:1;background:linear-gradient(90deg,rgba(8,14,20,.95),rgba(8,14,20,.7))"></div>
        <div style="position:relative;z-index:2;max-width:1600px;margin:0 auto;padding:88px clamp(40px,6vw,72px)">
            <div style="font:600 12px 'IBM Plex Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#ff5b62;display:flex;align-items:center;gap:10px"><span style="width:26px;height:2px;background:#ff5b62"></span>Selected work</div>
            <h1 style="font:600 54px/1.05 'Space Grotesk',sans-serif;letter-spacing:-.025em;color:#fff;margin:22px 0 16px;text-wrap:balance">Projects delivered across Sri Lanka.</h1>
            <p style="font:400 18px/1.6 'IBM Plex Sans',sans-serif;color:#c6d1da;max-width:560px;margin:0">Type-tested switchboards, industrial automation and power systems — engineered, assembled and commissioned by our in-house team.</p>
        </div>
    </section>

    {{-- ===================== PROJECTS ===================== --}}
    <section style="background:#fff;padding:72px 0 100px">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px">

            {{-- category filter --}}
            @if ($categories->isNotEmpty())
                <div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:44px">
                    <button type="button" wire:click="filter('')" class="btn-outline" style="cursor:pointer;background:transparent;font:600 13px 'IBM Plex Sans',sans-serif;padding:9px 18px;border-radius:99px;{{ ! $category ? 'background:#14202b;color:#fff;border-color:#14202b' : '' }}">All</button>
                    @foreach ($categories as $item)
                        <button type="button" wire:click="filter(@js($item))" class="btn-outline" style="cursor:pointer;background:transparent;font:600 13px 'IBM Plex Sans',sans-serif;padding:9px 18px;border-radius:99px;{{ $category === $item ? 'background:#14202b;color:#fff;border-color:#14202b' : '' }}">{{ $item }}</button>
                    @endforeach
                </div>
            @endif

            @if ($projects->isEmpty())
                <div style="text-align:center;padding:80px 20px;border:1px dashed #d5dde3;border-radius:12px">
                    <div style="font:500 14px 'IBM Plex Mono',monospace;letter-spacing:.06em;color:#8b98a2;text-transform:uppercase">No projects to show yet.</div>
                </div>
            @else
                <div class="grid-3" style="display:grid;grid-template-columns:repeat(3,1fr);gap:26px">
                    @foreach ($projects as $project)
                        <a href="{{ route('projects.show', $project) }}" wire:key="prj-{{ $project->id }}" wire:navigate data-reveal class="prj-card" style="display:block;border:1px solid #e6ebef;border-radius:12px;overflow:hidden;background:#fff;color:inherit">
                            <div style="position:relative;height:250px;overflow:hidden;background:#f5f7f9">
                                @if ($project->image)
                                    <img class="cover" style="position:absolute;inset:0" src="{{ Storage::disk('public')->url($project->image) }}" alt="{{ $project->title }}" loading="lazy">
                                @else
                                    <div class="ph" style="position:absolute;inset:0"><span>Nemt Power project</span></div>
                                @endif
                                @if ($project->category)
                                    <span style="position:absolute;top:14px;left:14px;background:rgba(20,32,43,.85);color:#fff;font:600 10px 'IBM Plex Mono',monospace;letter-spacing:.1em;padding:6px 10px;border-radius:4px;text-transform:uppercase">{{ $project->category }}</span>
                                @endif
                            </div>
                            <div style="padding:24px 26px 28px">
                                @if ($project->location)
                                    <div style="font:500 12px 'IBM Plex Mono',monospace;letter-spacing:.08em;color:#8b98a2;text-transform:uppercase;margin-bottom:9px">{{ $project->location }}</div>
                                @endif
                                <h3 style="font:600 21px/1.25 'Space Grotesk',sans-serif;color:#14202b;margin:0 0 12px">{{ $project->title }}</h3>
                                <span style="font:600 13px 'IBM Plex Sans',sans-serif;color:#e1141c;display:inline-flex;align-items:center;gap:6px">View project →</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if ($projects->hasPages())
                    <div style="margin-top:48px;display:flex;justify-content:center;align-items:center;gap:20px">
                        @if ($projects->onFirstPage())
                            <span style="font:600 14px 'IBM Plex Sans',sans-serif;color:#c3ccd3;padding:10px 18px">← Prev</span>
                        @else
                            <button type="button" wire:click="previousPage" class="btn-outline" style="cursor:pointer;background:transparent;font:600 14px 'IBM Plex Sans',sans-serif;padding:10px 18px;border-radius:5px">← Prev</button>
                        @endif

                        <span style="font:500 13px 'IBM Plex Mono',monospace;letter-spacing:.06em;color:#8b98a2">Page {{ $projects->currentPage() }} of {{ $projects->lastPage() }}</span>

                        @if ($projects->hasMorePages())
                            <button type="button" wire:click="nextPage" class="btn-outline" style="cursor:pointer;background:transparent;font:600 14px 'IBM Plex Sans',sans-serif;padding:10px 18px;border-radius:5px">Next →</button>
                        @else
                            <span style="font:600 14px 'IBM Plex Sans',sans-serif;color:#c3ccd3;padding:10px 18px">Next →</span>
                        @endif
                    </div>
                @endif
            @endif
        </div>
    </section>

    {{-- ===================== CTA ===================== --}}
    <section style="background:#14202b;padding:72px 0">
        <div style="max-width:1600px;margin:0 auto;padding:0 40px;display:flex;justify-content:space-between;align-items:center;gap:24px;flex-wrap:wrap">
            <div>
                <h2 style="font:600 32px/1.1 'Space Grotesk',sans-serif;letter-spacing:-.02em;color:#fff;margin:0 0 8px;text-wrap:balance">Have a power project in mind?</h2>
                <p style="font:400 16px 'IBM Plex Sans',sans-serif;color:#b6c4cf;margin:0">Our engineers will scope it and get back within one business day.</p>
            </div>
            <a href="{{ url('/') }}#contact" class="btn-red" style="padding:15px 26px;border-radius:5px;font:600 15px 'IBM Plex Sans',sans-serif;display:inline-flex;align-items:center;gap:9px;white-space:nowrap">Discuss your project <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#fff" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></a>
        </div>
    </section>
</div>

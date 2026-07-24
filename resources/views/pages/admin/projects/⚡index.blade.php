<?php

use App\Models\Project;
use Flux\Flux;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Projects')] class extends Component {
    use WithPagination;

    public string $search = '';

    public ?int $deletingId = null;
    public ?Project $viewing = null;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function showProject(int $id): void
    {
        $this->viewing = Project::findOrFail($id);
        Flux::modal('view-project')->show();
    }

    public function confirmDelete(int $id): void
    {
        $this->deletingId = $id;
        Flux::modal('delete-project')->show();
    }

    public function delete(): void
    {
        $project = Project::findOrFail($this->deletingId);

        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        $this->deletingId = null;
        Flux::modal('delete-project')->close();
        Flux::toast(variant: 'success', text: __('Project deleted.'));
    }

    public function with(): array
    {
        return [
            'projects' => Project::query()
                ->when($this->search, fn ($q) => $q->where('title', 'like', "%{$this->search}%"))
                ->latest()
                ->paginate(10),
        ];
    }
}; ?>

<section class="w-full space-y-6">
    {{-- Header --}}
    <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-6 dark:border-zinc-700 dark:bg-zinc-900">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <flux:heading size="lg" class="uppercase tracking-wide">{{ __('Projects') }}</flux:heading>
                <flux:subheading class="text-sm">{{ __('Organize and manage all your projects in one place.') }}</flux:subheading>
            </div>
            <flux:breadcrumbs>
                <flux:breadcrumbs.item>{{ __('Admin') }}</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>{{ __('Projects') }}</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
    </div>

    {{-- Filters --}}
    <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-6 dark:border-zinc-700 dark:bg-zinc-900">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <flux:input wire:model.live.debounce.300ms="search" :label="__('Search')" icon="magnifying-glass" :placeholder="__('Search by title')" class="max-w-sm" />

            <flux:button variant="primary" icon="plus" :href="route('admin.projects.create')" wire:navigate>
                {{ __('New Project') }}
            </flux:button>
        </div>
    </div>

    {{-- Table --}}
    <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-2 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:table>
            <flux:table.columns>
                <flux:table.column>{{ __('Project') }}</flux:table.column>
                <flux:table.column>{{ __('Category') }}</flux:table.column>
                <flux:table.column>{{ __('Location') }}</flux:table.column>
                <flux:table.column>{{ __('Featured') }}</flux:table.column>
                <flux:table.column>{{ __('Date Created') }}</flux:table.column>
                <flux:table.column>{{ __('Status') }}</flux:table.column>
                <flux:table.column>{{ __('Actions') }}</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @forelse ($projects as $project)
                    <flux:table.row :key="$project->id">
                        <flux:table.cell>
                            <div class="flex items-center gap-3">
                                @if ($project->image)
                                    <img src="{{ Storage::disk('public')->url($project->image) }}" class="h-9 w-9 rounded-md object-cover" alt="{{ $project->title }}" />
                                @else
                                    <div class="flex h-9 w-9 items-center justify-center rounded-md bg-zinc-200 dark:bg-zinc-700">
                                        <flux:icon.photo variant="micro" class="text-zinc-400" />
                                    </div>
                                @endif
                                <span class="font-medium">{{ $project->title }}</span>
                            </div>
                        </flux:table.cell>
                        <flux:table.cell>
                            @if ($project->category)
                                <flux:badge size="sm" color="blue">{{ $project->category }}</flux:badge>
                            @else
                                <span class="text-zinc-400">—</span>
                            @endif
                        </flux:table.cell>
                        <flux:table.cell>{{ $project->location ?? '—' }}</flux:table.cell>
                        <flux:table.cell>
                            <flux:badge size="sm" :color="$project->is_featured ? 'green' : 'zinc'">
                                {{ $project->is_featured ? __('Yes') : __('No') }}
                            </flux:badge>
                        </flux:table.cell>
                        <flux:table.cell>{{ $project->created_at?->format('d M Y') }}</flux:table.cell>
                        <flux:table.cell>
                            <flux:badge size="sm" :color="$project->active ? 'green' : 'red'">
                                {{ $project->active ? __('Active') : __('Inactive') }}
                            </flux:badge>
                        </flux:table.cell>
                        <flux:table.cell>
                            <div class="flex gap-2">
                                <flux:button size="sm" variant="primary" icon="eye" wire:click="showProject({{ $project->id }})">{{ __('View') }}</flux:button>
                                <flux:button size="sm" variant="primary" icon="pencil-square" :href="route('admin.projects.edit', $project)" wire:navigate>{{ __('Edit') }}</flux:button>
                                <flux:button size="sm" variant="danger" icon="trash" wire:click="confirmDelete({{ $project->id }})" />
                            </div>
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell colspan="7" class="text-center text-zinc-500">
                            {{ __('No projects found.') }}
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse
            </flux:table.rows>
        </flux:table>

        <div class="p-2">
            {{ $projects->links() }}
        </div>
    </div>

    {{-- View modal --}}
    <flux:modal name="view-project" class="min-w-[28rem]">
        @if ($viewing)
            <div class="space-y-4">
                <flux:heading size="lg">{{ $viewing->title }}</flux:heading>

                @if ($viewing->image)
                    <img src="{{ Storage::disk('public')->url($viewing->image) }}" class="h-40 w-full rounded-lg object-cover" alt="{{ $viewing->title }}" />
                @endif

                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <flux:text class="text-zinc-500">{{ __('Category') }}</flux:text>
                        <flux:text class="font-medium">{{ $viewing->category ?? '—' }}</flux:text>
                    </div>
                    <div>
                        <flux:text class="text-zinc-500">{{ __('Location') }}</flux:text>
                        <flux:text class="font-medium">{{ $viewing->location ?? '—' }}</flux:text>
                    </div>
                    <div>
                        <flux:text class="text-zinc-500">{{ __('Featured') }}</flux:text>
                        <flux:text class="font-medium">{{ $viewing->is_featured ? __('Yes') : __('No') }}</flux:text>
                    </div>
                    <div>
                        <flux:text class="text-zinc-500">{{ __('Status') }}</flux:text>
                        <flux:text class="font-medium">{{ $viewing->active ? __('Active') : __('Inactive') }}</flux:text>
                    </div>
                </div>

                @if ($viewing->description)
                    <div>
                        <flux:text class="text-zinc-500">{{ __('Description') }}</flux:text>
                        <flux:text>{{ $viewing->description }}</flux:text>
                    </div>
                @endif

                <div class="flex justify-end gap-2">
                    <flux:modal.close>
                        <flux:button variant="ghost">{{ __('Close') }}</flux:button>
                    </flux:modal.close>
                    <flux:button variant="primary" icon="pencil-square" :href="route('admin.projects.edit', $viewing)" wire:navigate>{{ __('Edit') }}</flux:button>
                </div>
            </div>
        @endif
    </flux:modal>

    {{-- Delete modal --}}
    <flux:modal name="delete-project" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Delete project?') }}</flux:heading>
                <flux:subheading>{{ __('This action cannot be undone.') }}</flux:subheading>
            </div>
            <div class="flex justify-end gap-2">
                <flux:modal.close>
                    <flux:button variant="ghost">{{ __('Cancel') }}</flux:button>
                </flux:modal.close>
                <flux:button variant="danger" wire:click="delete">{{ __('Delete') }}</flux:button>
            </div>
        </div>
    </flux:modal>
</section>

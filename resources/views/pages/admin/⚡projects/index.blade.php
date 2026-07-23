<?php

use App\Models\Project;
use Flux\Flux;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Projects')] class extends Component {
    use WithPagination;

    public string $search = '';

    public ?int $deletingId = null;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function confirmDelete(int $id): void
    {
        $this->deletingId = $id;
        Flux::modal('delete-project')->show();
    }

    public function delete(): void
    {
        $project = Project::findOrFail($this->deletingId);
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

<section class="w-full">
    <div class="flex items-center justify-between gap-4">
        <div>
            <flux:heading size="xl">{{ __('Projects') }}</flux:heading>
            <flux:subheading>{{ __('Manage your projects') }}</flux:subheading>
        </div>

        <flux:button variant="primary" icon="plus" :href="route('admin.projects.create')" wire:navigate>
            {{ __('New project') }}
        </flux:button>
    </div>

    <div class="mt-6">
        <flux:input wire:model.live.debounce.300ms="search" icon="magnifying-glass" :placeholder="__('Search projects...')" class="max-w-sm" />
    </div>

    <flux:table class="mt-4">
        <flux:table.columns>
            <flux:table.column>{{ __('Title') }}</flux:table.column>
            <flux:table.column>{{ __('Category') }}</flux:table.column>
            <flux:table.column>{{ __('Location') }}</flux:table.column>
            <flux:table.column>{{ __('Featured') }}</flux:table.column>
            <flux:table.column>{{ __('Active') }}</flux:table.column>
            <flux:table.column />
        </flux:table.columns>

        <flux:table.rows>
            @forelse ($projects as $project)
                <flux:table.row :key="$project->id">
                    <flux:table.cell class="font-medium">{{ $project->title }}</flux:table.cell>
                    <flux:table.cell>{{ $project->category ?? '—' }}</flux:table.cell>
                    <flux:table.cell>{{ $project->location ?? '—' }}</flux:table.cell>
                    <flux:table.cell>
                        <flux:badge size="sm" :color="$project->is_featured ? 'green' : 'zinc'">
                            {{ $project->is_featured ? __('Yes') : __('No') }}
                        </flux:badge>
                    </flux:table.cell>
                    <flux:table.cell>
                        <flux:badge size="sm" :color="$project->active ? 'green' : 'red'">
                            {{ $project->active ? __('Active') : __('Inactive') }}
                        </flux:badge>
                    </flux:table.cell>
                    <flux:table.cell class="text-end">
                        <flux:button size="sm" variant="ghost" icon="pencil-square" :href="route('admin.projects.edit', $project)" wire:navigate />
                        <flux:button size="sm" variant="ghost" icon="trash" wire:click="confirmDelete({{ $project->id }})" />
                    </flux:table.cell>
                </flux:table.row>
            @empty
                <flux:table.row>
                    <flux:table.cell colspan="6" class="text-center text-zinc-500">
                        {{ __('No projects yet.') }}
                    </flux:table.cell>
                </flux:table.row>
            @endforelse
        </flux:table.rows>
    </flux:table>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>

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

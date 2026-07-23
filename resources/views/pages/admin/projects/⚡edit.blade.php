<?php

use App\Models\Project;
use Flux\Flux;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Title('Edit project')] class extends Component {
    use WithFileUploads;

    public Project $project;

    public string $title = '';
    public string $category = '';
    public string $description = '';
    public string $location = '';
    public bool $is_featured = false;
    public bool $active = true;
    public $image = null;

    public function mount(Project $project): void
    {
        $this->project = $project;
        $this->title = $project->title;
        $this->category = $project->category ?? '';
        $this->description = $project->description ?? '';
        $this->location = $project->location ?? '';
        $this->is_featured = $project->is_featured;
        $this->active = $project->active;
    }

    /**
     * @return array<string, mixed>
     */
    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'is_featured' => ['boolean'],
            'active' => ['boolean'],
            'image' => ['nullable', 'image', 'max:2048'],
        ];
    }

    public function save(): void
    {
        $validated = $this->validate();

        if ($this->image) {
            if ($this->project->image) {
                Storage::disk('public')->delete($this->project->image);
            }
            $validated['image'] = $this->image->store('projects', 'public');
        } else {
            unset($validated['image']);
        }

        $this->project->update($validated);

        Flux::toast(variant: 'success', text: __('Project updated.'));

        $this->redirectRoute('admin.projects.index', navigate: true);
    }
}; ?>

<section class="w-full max-w-2xl">
    <flux:heading size="xl">{{ __('Edit project') }}</flux:heading>
    <flux:subheading class="mb-6">{{ __('Update project details') }}</flux:subheading>

    <form wire:submit="save" class="space-y-6">
        <flux:input wire:model="title" :label="__('Title')" type="text" required autofocus />

        <flux:input wire:model="category" :label="__('Category')" type="text" />

        <flux:textarea wire:model="description" :label="__('Description')" rows="4" />

        <flux:input wire:model="location" :label="__('Location')" type="text" />

        <flux:field>
            <flux:label>{{ __('Image') }}</flux:label>
            <input type="file" wire:model="image" accept="image/*"
                class="block w-full text-sm text-zinc-600 file:mr-4 file:rounded-md file:border-0 file:bg-zinc-100 file:px-4 file:py-2 file:text-sm file:font-medium hover:file:bg-zinc-200 dark:text-zinc-300 dark:file:bg-zinc-700 dark:hover:file:bg-zinc-600" />
            <flux:error name="image" />
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" class="mt-2 h-32 w-auto rounded-md object-cover" alt="preview" />
            @elseif ($project->image)
                <img src="{{ Storage::disk('public')->url($project->image) }}" class="mt-2 h-32 w-auto rounded-md object-cover" alt="{{ $project->title }}" />
            @endif
        </flux:field>

        <div class="flex gap-6">
            <flux:checkbox wire:model="is_featured" :label="__('Featured')" />
            <flux:checkbox wire:model="active" :label="__('Active')" />
        </div>

        <div class="flex gap-2">
            <flux:button variant="primary" type="submit">{{ __('Save changes') }}</flux:button>
            <flux:button variant="ghost" :href="route('admin.projects.index')" wire:navigate>{{ __('Cancel') }}</flux:button>
        </div>
    </form>
</section>

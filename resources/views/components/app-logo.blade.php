@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand :name="config('app.name', 'Laravel')" {{ $attributes }}>
        <x-slot name="logo">
            <x-app-logo-icon class="h-8 rounded-md" />
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand :name="config('app.name', 'Laravel')" {{ $attributes }}>
        <x-slot name="logo">
            <x-app-logo-icon class="h-8 rounded-md" />
        </x-slot>
    </flux:brand>
@endif

@props([
    'model',
    'label' => null,
    'placeholder' => '',
])

@assets
    <link rel="stylesheet" href="https://unpkg.com/trix@2.1.15/dist/trix.css">
    <script src="https://unpkg.com/trix@2.1.15/dist/trix.umd.min.js"></script>
    <style>
        trix-editor {
            min-height: 12rem;
            border-radius: 0.5rem;
            border: 1px solid rgb(228 228 231);
            background: #fff;
            padding: 0.75rem 0.875rem;
            font-size: 0.875rem;
            color: rgb(24 24 27);
        }
        trix-editor:empty:not(:focus)::before { color: rgb(161 161 170); }
        trix-toolbar .trix-button-group { border-color: rgb(228 228 231); }
        .dark trix-editor {
            border-color: rgb(63 63 70);
            background: rgb(24 24 27);
            color: rgb(244 244 245);
        }
        .dark trix-toolbar .trix-button {
            background: transparent;
            color: rgb(212 212 216);
        }
        .dark trix-toolbar .trix-button--icon { filter: invert(1) brightness(1.4); }
        .dark trix-toolbar .trix-button-group { border-color: rgb(63 63 70); }
    </style>
@endassets

<flux:field>
    @if ($label)
        <flux:label>{{ $label }}</flux:label>
    @endif

    <div
        wire:ignore
        x-data="{
            value: @entangle($model),
            init() {
                const editor = this.$refs.trix;
                editor.editor.loadHTML(this.value ?? '');
                editor.addEventListener('trix-change', () => { this.value = editor.value; });
                this.$watch('value', (v) => {
                    if ((v ?? '') !== editor.value) editor.editor.loadHTML(v ?? '');
                });
            }
        }"
    >
        <input type="hidden" x-ref="input">
        <trix-editor
            x-ref="trix"
            @if ($placeholder) placeholder="{{ $placeholder }}" @endif
        ></trix-editor>
    </div>

    <flux:error :name="$model" />
</flux:field>

@props(['type' => 'submit', 'class' => 'btn-primary'])

<div class="d-grid gap-2">
    <button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn ' . $class]) }}>
        {{ $slot }}
    </button>
</div>

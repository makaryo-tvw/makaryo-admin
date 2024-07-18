@props([
  'label', 
  'name', 
  'value', 
  'readonly', 
  'type'        => 'text', 
  'placeholder' => '',
  'timepicker'  => null,
  'id'          => null,
])

<div class="mb-3">
  <label for="{{ $name.($id ?? '') }}" class="form-label">{{ $label }}</label>
  <input 
    id              ="{{ $name.($id ?? '') }}" 
    class           ="form-control @error($name) is-invalid @enderror {{ $timepicker ?? '' }}" 
    aria-describedby="{{ $name }}"
    placeholder     ="{{ $placeholder }}"
    type            ="{{ $type }}" 
    name            ="{{ $name }}"
    value           ="{{ old($name, $value ?? null) }}"
    {{ $readonly ?? '' }} {{ $attributes }}
  >
  <div id="{{ $name }}" class="form-text">{{ $slot }}</div>
  @error($name)
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>

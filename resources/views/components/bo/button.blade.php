@props([
  'type' => 'submit', 
  'color' => 'primary', 
  'icon' => 'user', 
  'title' => '', 
  'as' => 'button', 
  'url' => ''
])

@if ($as == 'button')
  <button {{ $attributes }} type="{{ $type }}" class="btn btn-outline-{{ $color }} m-b-xs">
    <i class="fa fa-{{ $icon }}"></i>&nbsp;
    {{ $title }}
  </button>
@endif

@if ($as == 'link')
<a {{ $attributes }}  href="{{ $url }}" class="btn btn-outline-{{ $color }} m-b-xs">
  <i class="fa fa-{{ $icon }}"></i>&nbsp; {{ $title }}
</a>
@endif

@props(['title' => '', 'sub_title' => '', 'with_back' => false, 'with_route' => null])

<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between">
      <div>
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-description">{{ $sub_title }}</p>
      </div>
      <div class="d-flex">
        {{ $addon ?? '' }}
        @if($with_route != null)
          <x-bo.button
            title="Tambah Data"
            color="primary"
            icon="plus"
            as="link"
            url="{{ $with_route }}"
          />
        @endif
  
        @if($with_back)
          <x-bo.button
            title="Kembali"
            color="primary"
            icon="arrow-left"
            as="link"
            url="{{ $with_back }}"
          />
        @endif
      </div>
    </div>
    <div>
      {{ $slot }}
    </div>
  </div>
</div>
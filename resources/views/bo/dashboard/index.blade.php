@extends("bo.layouts.app")

@section("content")
<x-bo.wrapper>

  {{-- <x-bo.breadcrumb
    :links="[
      ['url' => '', 'label' => 'kelola-karyawan'],
      ['url' => '', 'label' => 'divisi'],
    ]"
    :menus="app\Helpers\get_menu()['employ']"
  /> --}}

  <x-bo.card title="dashboard" >
  </x-bo.card>
</x-bo.wrapper>
@endsection

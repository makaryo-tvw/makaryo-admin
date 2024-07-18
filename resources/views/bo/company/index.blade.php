@extends("bo.layouts.app")

@section("content")
<x-bo.wrapper>
  <x-bo.card title="Perusahaan" >
    <livewire:company-table />
  </x-bo.card>
</x-bo.wrapper>
@endsection

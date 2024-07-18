@extends("bo.layouts.app")

@section("content")
<x-bo.wrapper>
  <x-bo.card title="Admin" :with_route="$route">
    <livewire:owner-table />
  </x-bo.card>
</x-bo.wrapper>
@endsection

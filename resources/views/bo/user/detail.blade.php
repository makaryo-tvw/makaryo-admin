@extends("bo.layouts.app")

@section("content")
<x-bo.wrapper>
  <x-bo.breadcrumb
      :links="[
      ['url' => '', 'label' => 'kelola-karyawan'],
      ['url' => route('divisions.index'), 'label' => 'divisi'],
      ['url' => '', 'label' => 'detail'],
      ]"
      :menus="app\Helpers\get_menu()['employ']"
  />
  <x-bo.card title="Detail Jadwal Kerja" :with_back="route('divisions.index')">
    
    <div class="p-3 border rounded-lg my-3">
      <div class="mb-2 row">
        <div class="col-2">
          <b>Nama Jadwal</b>
        </div>
        <div class="col-9">
          : &nbsp;&nbsp; {{ $model->name }}
        </div>
      </div>

      <div class="mb-2 row">
        <div class="col-2">
          <b>Maksimal keterlambatan</b>
        </div>
        <div class="col-9">
          : &nbsp;&nbsp; {{ $model->late_minute }} Menit
        </div>
      </div>

      <div class="mb-2 row">
        <div class="col-2">
          <b>Kode</b>
        </div>
        <div class="col-9">
          : &nbsp;&nbsp; <div class="d-inline-block" style="background-color: {{ $model->code }}; width: 100px; height: 20px"></div>
        </div>
      </div>

      <div class="mb-2 row">
        <div class="col-2">
          <b>Catatan</b>
        </div>
        <div class="col-9">
          : &nbsp;&nbsp; {{ $model->note ?? '' }}
        </div>
      </div>
    </div>
    {{-- <table>
      <tr>
        <td><b>Nama Jadwal</b></td>
        <td>: {{ $model->name }}</td>
      </tr>
      <tr>
        <td><b>Maksimal keterlambatan</b></td>
        <td>: {{ $model->late_minute }} Menit</td>
      </tr>
    </table> --}}

  </x-bo.card>
</x-bo.wrapper>
@endsection

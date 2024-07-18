<div class="dropdown">
  <button style="background-color: #69def7; color: white;" class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
    Action
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
    @isset ($print)
      <li><a class="dropdown-item" href="{{ $print }}">Print</a></li>
    @endisset

    @isset($aprove)
      @php
        $path_approve = explode("/",parse_url($aprove)["path"]);
        $id_approve   = end($path_approve);
      @endphp
      <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#confirmApprove{{ $id_approve }}Center">Approve</button></li>
    @endisset

    @isset($reject)
      @php
        $path_reject = explode("/",parse_url($reject)["path"]);
        $id_approve_reject   = end($path_reject);
      @endphp
      <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmReject{{ $id_approve_reject }}Center">Reject</button></li>
    @endisset

    @isset($detail)
      <li><a class="dropdown-item" href="{{ $detail }}">Detail</a></li>
    @endisset

    @isset($edit)
      <li><a class="dropdown-item" href="{{ $edit }}">Edit</a></li>
    @endisset

    @isset($history)
    <form class="d-inline" action="{{ $history }}" method="POST">
      @csrf @method('PUT')
      <li><button class="dropdown-item" >Riwayat Perubahan</button></li>
    </form>
    @endisset

    @isset($re_day)
      @php
        $path_day = explode("/",parse_url($re_day)["path"]);
        $id_day   = end($path_day);
      @endphp
      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reDay{{ $id_day }}Center">Reset Cuti</a></li>
    @endisset

    @isset($restore)
      @php
        $path_restore = explode("/",parse_url($restore)["path"]);
        $id_restore   = end($path_restore);
      @endphp
      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#confirmRestore{{ $id_restore }}Center">Restor Data</a></li>
    @endisset

    @isset($delete)
      @php
        $path_delete = explode("/",parse_url($delete)["path"]);
        $id_delete   = end($path_delete);
      @endphp
  
      <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $id_delete }}Center">Hapus</button></li>
    @endisset

    @isset($delete_permanent)
      @php
        $path_permanent = explode("/",parse_url($delete_permanent)["path"]);
        $id_permanent   = end($path_permanent);
      @endphp
      <li><a class="dropdown-item" href="#"  data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $id_permanent }}Center">Hapus Permanen</a></li>
    @endisset

  </ul>
</div>


@isset($aprove)
  @include("components.livewire.approve-modal")
@endisset

@isset($re_day)
  @include("components.livewire.re-day")
@endisset

@isset($restore)
  @include("components.livewire.restore-button")
@endisset

@isset($restore)
  @include("components.livewire.restore-button")
@endisset

@isset($delete)
  @include("components.livewire.delete-button")
@endisset

@isset($delete_permanent)
  @include("components.livewire.delete-permanet-button")
@endisset





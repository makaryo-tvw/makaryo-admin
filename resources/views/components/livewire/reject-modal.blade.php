<div class="modal fade" id="confirmReject{{ $id_approve_reject }}Center" tabindex="-1" aria-labelledby="confirmReject{{ $id_approve_reject }}Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="w-100 text-center">
          <h5 class="modal-title" id="confirmReject{{ $id_approve_reject }}CenterTitle"><i class="fas fa-exclamation-triangle"></i> Konfirmasi tolak permintaan</h5>
        </div>
      </div>
      <div class="modal-body">

        <form  class="d-inline" action="{{ $reject }}" method="POST">
          @csrf
          {{-- <div class="text-center">
            <img width="80%" src="/assets/ilustration/delete-confirmation.png" alt="">
          </div> --}}
          <div class="text-center">
            Apakah anda yakin menolak permintaan ini?
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times  me-2"></i>Batal</button>
          <button class="btn btn-danger"> <i class="fas fa-times me-2"></i> Tolak</button>
        </form>
      </div>
    </div>
  </div>
</div>
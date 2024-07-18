<div class="modal fade" id="confirmApprove{{ $id_approve }}Center" tabindex="-1" aria-labelledby="confirmApprove" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="w-100 text-center">
          <h5 class="modal-title" id="confirmApprove{{ $id_approve }}CenterTitle"><i class="fas fa-exclamation-triangle"></i> Konfirmasi Menerima Permintaan</h5>
        </div>
      </div>
      <div class="modal-body">

        <form  class="d-inline" action="{{ $aprove }}" method="POST">
          @csrf
          <div class="text-center">
            Apakah anda yakin ingin menerima permintaan ini? 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times  me-2"></i>Batal</button>
          <button class="btn btn-success"> <i class="fas fa-check me-2"></i> Terima</button>
        </form>
      </div>
    </div>
  </div>
</div>
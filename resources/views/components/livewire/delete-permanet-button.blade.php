<div class="modal fade" id="confirmDelete{{ $id_permanent }}Center" tabindex="-1" aria-labelledby="confirmDelete{{ $id_permanent }}Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="w-100 text-center">
          <h5 class="modal-title" id="confirmDelete{{ $id_permanent }}CenterTitle"><i class="fas fa-exclamation-triangle"></i> Konfirmasi hapus data</h5>
        </div>
      </div>
      <div class="modal-body">

        <form  class="d-inline" action="{{ $delete_permanent }}" method="POST">
          @csrf @method('DELETE')
          <div class="text-center">
            <img width="80%" src="/assets/ilustration/delete-confirmation.png" alt="">
          </div>
          <div class="text-center">
            Apakah anda yakin ingin menghapus data ini secara permanen? data yang anda hapus tidak bisa dikembalikan.
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times  me-2"></i>Batal</button>
          <button class="btn btn-danger"> <i class="fas fa-trash me-2"></i> Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>

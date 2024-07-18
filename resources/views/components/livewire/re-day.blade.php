<div class="modal fade" id="reDay{{ $id_day }}Center" tabindex="-1" aria-labelledby="reDay{{ $id_day }}Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="w-100 text-center">
          <h5 class="modal-title" id="reDay{{ $id_day }}CenterTitle"><i class="fas fa-exclamation-triangle"></i> Konfirmasi Reset Cuti</h5>
        </div>
      </div>
      <div class="modal-body">

        <form  class="d-inline" action="{{ $re_day }}" method="POST">
          @csrf @method('PUT')
          <x-bo.form-input
            name="total_day_off"
            label="Sisa Hari (Cuti"
            value=""
            required
          />
          <x-bo.form-input
            name="valid_until"
            label="Masa Berlaku Cuti"
            type="date"
            value=""
            required
          />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times  me-2"></i>Batal</button>
          <button class="btn btn-success"> <i class="fas fa-recycle me-2"></i> Reset Cuti</button>
        </form>
      </div>
    </div>
  </div>
</div>

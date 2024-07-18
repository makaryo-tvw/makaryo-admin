@extends("bo.auth.layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-12 col-lg-4">
            <div class="card login-box-container">
                <div class="card-body">
                    @if (session("error"))
                        <div class="alert alert-danger alert-dismissible fade show " role="alert">
                            {{session("error") }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session("success"))
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            {{session("success") }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="authent-logo">
                        <img width="50%" src="/assets/logo-mark.png" alt="">
                    </div>
                    <div class="authent-text">
                        <p>Halaman pendaftaran</p>
                        {{-- <p>Silahkan mengisi data anda untuk membuat akun</p> --}}
                    </div>

                    <form method="POST" action="{{ route("register.store") }}">
                        @csrf

                        <div class="mb-3">
                            <div class="form-floating">
                                <input 
                                    type="text" 
                                    class="form-control @error("name")
                                        is-invalid
                                    @enderror" 
                                    id="floatingInput" 
                                    placeholder=""
                                    name="name"
                                >
                                <label for="floatingInput">Nama lengkap</label>
                              </div>
                              @error("name")
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <input 
                                    type="text" 
                                    class="form-control @error("company_name")
                                        is-invalid
                                    @enderror" 
                                    id="floatingInput" 
                                    placeholder=""
                                    name="company_name"
                                >
                                <label for="floatingInput">Nama perusahaan</label>
                              </div>
                              @error("company_name")
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <input 
                                    type="number" 
                                    class="form-control @error("phone_number")
                                        is-invalid
                                    @enderror" 
                                    id="floatingInput" 
                                    placeholder=""
                                    name="phone_number"
                                >
                                <label for="floatingInput">Nomor whatsapp</label>
                              </div>
                              @error("phone_number")
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <input 
                                    type="email" 
                                    class="form-control @error("email")
                                        is-invalid
                                    @enderror" 
                                    id="floatingInput" 
                                    placeholder="name@example.com"
                                    name="email"
                                >
                                <label for="floatingInput">Email address</label>
                              </div>
                              @error("email")
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>

                        <div>
                            <div class="">
                                <x-bo.form-select
                                  label="Zona Waktu"
                                  name="timezone"
                                  :options="[
                                    'WIB (UTC+7)' => 'WIB (UTC+7)',
                                    'WITA (UTC+8)' => 'WITA (UTC+8)',
                                    'WIT (UTC+9)' => 'WIT (UTC+9)',
                                  ]"
                                />
                              </div>
                        </div>

                        <div class="d-grid">
                        <button type="submit" class="btn btn-primary m-b-xs">Daftar</button>
                    </div>
                      </form>
                      <div class="authent-reg text-primary">
                          <p>sudah mempunyai akun ? <a href="/" class="text-primary">Masuk</a></p>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
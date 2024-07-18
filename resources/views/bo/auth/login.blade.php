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
                        <p>Selamatdatang di Makaryo</p>
                        {{-- <p>masukkan email dan password untuk melanjutkan.</p> --}}
                    </div>

                    <form method="POST" action="{{ route("login.store") }}">
                        @csrf
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
                                    value="owner@mail.com"
                                >
                                <label for="floatingInput">Email address</label>
                              </div>
                              @error("email")
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <input 
                                    name="password"
                                    type="password" 
                                    class="form-control @error("password")
                                        is-invalid
                                    @enderror" 
                                    id="floatingPassword"
                                    placeholder="Password"
                                    value="secret123"
                                >
                                <label for="floatingPassword">Password</label>
                              </div>
                              @error("password")
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                        <div class="mb-3 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                          <label class="form-check-label" for="exampleCheck1" >ingat saya</label>
                        </div>
                        <div class="d-grid">
                        <button type="submit" class="btn btn-primary m-b-xs">Sign In</button>
                    </div>
                      </form>
                      <div class="authent-reg text-primary">
                          <p>Not registered? <a href="/register" class="text-primary">Register now</a></p>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
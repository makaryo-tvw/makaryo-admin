<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Back-Office Makaryoo">
        <meta name="keywords" content="presensi, e presensi, kehadiran, presensi online">
        <meta name="author" content="tvw-group">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>Makaryo - Back Office</title>

        </style>
        @include("bo.layouts.style")
        @stack("addon-style")
        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body>
        {{-- <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div> --}}
        <div class="page-container">
            @include("bo.layouts.navbar")
            @include("bo.layouts.sidebar")
            <div class="page-content">
                @if (session("error"))
                    <x-bo.wrapper>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session("error") }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </x-bo.wrapper>
                @endif
              @yield("content")
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <div class="w-100 text-center">
                        <h5 class="modal-title" id="exampleModalLabel"> Konfirmasi logout</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img width="80%" src="/assets/ilustration/logout.png" alt="">
                    </div>
                    <div class="text-center">
                        Apakah anda yakin ingin mengakhiri sesi ini?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times me-2"></i>Close</button>
                    <form action="{{ route("logout") }}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button class="btn btn-danger"> <i class="fa fa-sign-out-alt me-2"></i> Logout</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <!-- loading page -->
        <div style="position: static;" class="" id="loading-page">
            <div style="position: fixed; z-index: 100000; background-color: rgba(255, 255, 255, 0.92); left: 0; right: 0; top: 0; bottom: 0;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"><path fill="#65ddf7" d="M4 16h4v4H4V16z" class="st0"><animate fill="remove" accumulate="none" additive="replace" attributeName="opacity" begin="0.12s" calcMode="linear" dur="1.8s" keyTimes="0;0.9;1" repeatCount="indefinite" restart="always" values="1;0;0"/></path><path fill="#65ddf7" d="M10 16h4v4h-4V16z" class="st0"><animate fill="remove" accumulate="none" additive="replace" attributeName="opacity" begin="0.24s" calcMode="linear" dur="1.8s" keyTimes="0;0.9;1" repeatCount="indefinite" restart="always" values="1;0;0"/></path><path fill="#65ddf7" d="M16 16h4v4h-4V16z" class="st0"><animate fill="remove" accumulate="none" additive="replace" attributeName="opacity" begin="0.36s" calcMode="linear" dur="1.8s" keyTimes="0;0.9;1" repeatCount="indefinite" restart="always" values="1;0;0"/></path><path fill="#65ddf7" d="M4 10h4v4H4V10z" class="st0"><animate fill="remove" accumulate="none" additive="replace" attributeName="opacity" begin="0.48s" calcMode="linear" dur="1.8s" keyTimes="0;0.9;1" repeatCount="indefinite" restart="always" values="1;0;0"/></path><path fill="#65ddf7" d="M10 10h4v4h-4V10z" class="st0"><animate fill="remove" accumulate="none" additive="replace" attributeName="opacity" begin="0.6s" calcMode="linear" dur="1.8s" keyTimes="0;0.9;1" repeatCount="indefinite" restart="always" values="1;0;0"/></path><path fill="#65ddf7" d="M16 10h4v4h-4V10z" class="st0"><animate fill="remove" accumulate="none" additive="replace" attributeName="opacity" begin="0.72s" calcMode="linear" dur="1.8s" keyTimes="0;0.9;1" repeatCount="indefinite" restart="always" values="1;0;0"/></path><path fill="#65ddf7" d="M4 4h4v4H4V4z" class="st0"><animate fill="remove" accumulate="none" additive="replace" attributeName="opacity" begin="0.84s" calcMode="linear" dur="1.8s" keyTimes="0;0.9;1" repeatCount="indefinite" restart="always" values="1;0;0"/></path><path fill="#65ddf7" d="M10 4h4v4h-4V4z" class="st0"><animate fill="remove" accumulate="none" additive="replace" attributeName="opacity" begin="0.96s" calcMode="linear" dur="1.8s" keyTimes="0;0.9;1" repeatCount="indefinite" restart="always" values="1;0;0"/></path><path fill="#65ddf7" d="M16 4h4v4h-4V4z" class="st0"><animate fill="remove" accumulate="none" additive="replace" attributeName="opacity" begin="1.08s" calcMode="linear" dur="1.8s" keyTimes="0;0.9;1" repeatCount="indefinite" restart="always" values="1;0;0"/></path></svg>
            </div>
            </div>
        </div>
        <!-- end loading page -->
        
        @include("bo.layouts.script")
        @stack("addon-script")
    </body>
</html>
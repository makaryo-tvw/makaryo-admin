@extends("bo.layouts.app")

@section("content")
<x-bo.wrapper>

    <x-bo.card title=" {{ !empty($model) ? 'Edit' : 'Tambah' }} User" :with_back="route('users.index')">
        <form action="{{ $route }}" method="POST">
        @csrf @isset($model)
            @method("PUT")
        @endisset

        <x-bo.form-input
            name="name"
            label="Nama User"
            value="{{ $model->name ?? '' }}"
            required
        />

        <x-bo.form-input
            name="email"
            label="Email"
            value="{{ $model->email ?? '' }}"
            required
        />

        <x-bo.form-input
            name="phone_number"
            type="text"
            label="Nomor Telepon"
            value="{{ $model->phone_number ?? '' }}"
            required
        />

        <x-bo.form-input
            name="password"
            type="password"
            label="Password"
            value=""
        />

        <div>
            <a href="{{ route('users.index') }}" class="btn btn-outline-primary me-2">
            <i class="fa fa-arrow-left me2"></i> Kembali
            </a>
            <button class="btn btn-primary"> <i class="fa fa-save me-2"></i> 
            @if (!empty($model))
                Update
            @else
                Simpan
            @endif User
            </button>
        </div>

        </form>
    </x-bo.card>
</x-bo.wrapper>
@endsection

@push("addon-style")
@endpush

@push("addon-script")
@endpush

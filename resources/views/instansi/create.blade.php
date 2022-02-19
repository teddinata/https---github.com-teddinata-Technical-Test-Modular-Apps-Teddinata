@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('instansi.store') }}" method="post">
                @csrf

                <div class="form-group">
                  <label for="instansi">Nama Instansi</label>
                  <input type="text" class="form-control @error('instansi') is-invalid @enderror" name="instansi" id="instansi" placeholder="Nama Instansi" autocomplete="on" value="{{ old('instansi') }}">
                  @error('instansi')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="jumlah_pegawai">Jumlah Pegawai</label>
                  <input type="text" class="form-control @error('jumlah_pegawai') is-invalid @enderror" name="jumlah_pegawai" id="jumlah_pegawai" placeholder="Jumlah Pegawai" autocomplete="on" value="{{ old('jumlah_pegawai') }}">
                  @error('jumlah_pegawai')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="description">Deskripsi</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="description" id="description" placeholder="Deskripsi" autocomplete="off" value="{{ old('description') }}">
                  @error('description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>



                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('instansi.index') }}" class="btn btn-default">Back to list</a>

            </form>
        </div>
    </div>

    <!-- End of Main Content -->
@endsection

@push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush

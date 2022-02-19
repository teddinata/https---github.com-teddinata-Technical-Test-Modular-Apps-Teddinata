@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Daftar Instansi') }}</h1>

    <div class="row justify-content-center">

        <!-- Begin Page Content -->
        <div class="container-fluid">

           <a href="{{ route('instansi.create') }}" class="btn btn-primary mb-3">Tambahkan Instansi</a>
           @if (session('message'))
               <div class="alert alert-success">
                   {{ session('message') }}
               </div>
           @endif
           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>

               </div>
               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                               <tr>
                                   <th>ID</th>
                                   <th>Nama Instansi</th>
                                   <th>Jumlah Pegawai</th>
                                   <th>Deskripsi</th>
                                   <th>Action</th>

                               </tr>
                           </thead>
                           <tfoot>
                               <tr>
                                   <th>ID</th>
                                   <th>Nama Instansi</th>
                                   <th>Jumlah Pegawai</th>
                                   <th>Deskripsi</th>
                                   <th>Action</th>

                               </tr>
                           </tfoot>
                           <tbody>
                               @foreach ($instansi as $instansi)
                               <tr>
                                   <td scope="row">{{ $instansi->id }}</td>
                                   <td>{{ $instansi->instansi }}</td>
                                   <td>{{ $instansi->jumlah_pegawai }}</td>
                                   <td>{{ $instansi->description }}</td>
                                   <td>
                                       <div class="d-flex">
                                           <a href="{{ route('instansi.edit', $instansi->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                           <form action="{{ route('instansi.destroy', $instansi->id) }}" method="post">
                                               @csrf
                                               @method('delete')
                                               <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this?')">Delete</button>
                                           </form>
                                       </div>
                                   </td>
                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>
    </div>
       <!-- /.container-fluid -->



    {{-- {{ $instansi->links() }} --}}

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

@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
        <a href="{{ route('gallery.create') }}" class="btn btn-sm btn-primary shadow-sm">
          <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Gallery
        </a>
      </div>

      <!-- DataTales Example -->
      <div class="card shadow mb-4 mx-3">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Gallery</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Travel</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
              </thead>
              @forelse ($items as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->travel_package->title }}</td>
                <td>
                  <img src="{{ Storage::url($item->image) }}" alt="" style="width: 150px; height: 100px; object-fit:cover;" class="img-thumbnail" />
                </td>
                <td>
                  <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-info">
                    <i class="fa fa-pencil-alt"></i>
                  </a>
                  <form action="{{ route('gallery.destroy', $item->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
          @empty
              <tr>
                <td colspan="7" class="text-center">
                  Data Kosong
                </td>
              </tr>
          @endforelse
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Travel</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>




    </div>
    <!-- /.container-fluid -->
@endsection
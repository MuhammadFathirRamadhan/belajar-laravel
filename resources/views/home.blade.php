@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="createAttendanceForm" method="POST" action="/store" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama:</label>
                          <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                          <input type="date" name="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleCheck1">Jam masuk</label>
                            <input type="time" name="time_in" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleCheck1">Deskripsi</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                    <br><br>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam masuk</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data_attendances as $item)
                          <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->date }}</td>
                              <td>{{ $item->time_in }}</td>
                              <td>{{ $item->description }}</td>
                              <td>
                                  <!-- Button edit using icon -->
                                  <a href="{{ route('edit', $item->id) }}" class="btn btn-secondary btn-sm" title="Edit">
                                      <i class="fas fa-edit"></i>
                                  </a>

                                  <!-- Button delete using icon -->
                                  <button type="button" class="btn btn-danger btn-sm" title="Hapus" onclick="confirmDelete({{ $item->id }})">
                                      <i class="fas fa-trash-alt"></i>
                                  </button>

                                  <form id="delete-form-{{ $item->id }}" action="{{ route('delete', $item->id) }}" method="POST" style="display: none;">
                                      @csrf
                                      @method('DELETE')
                                  </form>
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

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// SweetAlert2 for delete confirmation
function confirmDelete(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data ini tidak bisa dikembalikan setelah dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>
@endsection

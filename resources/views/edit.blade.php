@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('update', $attendance->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" name="name" class="form-control" value="{{ $attendance->name }}">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" name="date" class="form-control" value="{{ $attendance->date }}">
        </div>
        <div class="mb-3">
            <label for="time_in" class="form-label">Jam masuk</label>
            <input type="time" name="time_in" class="form-control" value="{{ $attendance->time_in }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <input type="text" name="description" class="form-control" value="{{ $attendance->description }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection

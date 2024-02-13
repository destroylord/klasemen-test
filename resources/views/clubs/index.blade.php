@extends('layouts.app')

@section('content')

    <div class="col-lg-7">
       <div class="card">
            <div class="card-body">
                <table class="table table-striped-column">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Klub</th>
                            <th>Kota</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clubs as $club)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $club->name }}</td>
                                <td>{{ $club->city }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form</h5>
                <form action="{{ route('club.store') }}" autocomplete="off" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Klub">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                     <div class="mb-3">
                        <input type="text" name="city" class="form-control" placeholder="Kota">
                        @error('city')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form</h5>
            <form action="{{ route('club-scores.store') }}" method="POST" autocomplete="off">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div id="inputContainer">
                    <div class="mb-2 dynamic-input">
                        <div class="d-flex justify-content-between gap-2">

                            <select name="home_team_id" id=""  class="form-control">
                                <option value="0" selected disabled>Pilih Tim</option>
                                @foreach ($clubs as $club)
                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                @endforeach
                            </select>

                            
                            <select name="away_team_id" id="" class="form-control">
                                <option value="0" selected disabled>Pilih Tim</option>
                                @foreach ($clubs as $club)
                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                        <div class="mb-2 dynamic-input">
                        <div class="d-flex justify-content-between gap-2">
                            <input type="number" name="home_team_score" class="form-control" placeholder="Score">
                            <input type="number" name="away_team_score" class="form-control" placeholder="Score">
                        </div>
                    </div>
                </div>
                <button class="btn btn-success mt-4" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
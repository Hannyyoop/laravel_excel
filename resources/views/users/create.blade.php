@extends('layouts.master')

@section('content')
    <div class="container mt-3 w-50">
        <div class="row">
            <div class="col-12">
                <h4>Create User</h4>
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="">Username</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            value="{{ old('name') }}" id="">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            value="{{ old('email') }}" id="">
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

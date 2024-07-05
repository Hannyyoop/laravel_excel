@extends('layouts.master')

@section('content')
    <div class="container py-5">
        @if (session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg') }}

            </div>
        @endif
        <h4> Userlist </h4>
        <a href="{{ route('user.create') }}" class="btn btn-info mb-3 btn-sm">
            << Back</a>
                <a href="{{ route('user.export') }}" class="btn btn-info mb-3 btn-sm">Export</a>

                <form id="importForm" action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="fileInput" style="display: none;" required>
                    <button type="button" onclick="document.getElementById('fileInput').click();">Choose File</button>
                    <button class="btn btn-sm btn-info" type="submit">Import</button>
                </form>


                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $user->id }} </td>
                                <td> {{ $user->name }}</td>
                                <td> {{ $user->email }}</td>
                                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                    @csrf @method('delete')
                                    <td> <button class="btn btn-sm btn-danger">Delete</button> </td>
                                </form>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

    </div>
@endsection

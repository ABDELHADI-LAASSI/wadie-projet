@extends('layouts.adminMaster')

@section('content')
    <div class="container">
        <h1 class="text-center">Ajouter un Employe</h1>

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action={{ route('admin.storeEmploye') }} method="Post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="exampleInputEmail1">name</label>
                <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group mb-4">
                <label for="exampleInputEmail1">Email address</label>
                <input value="{{ old('email') }}" type="email" name="email" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group mb-4">
                <label for="exampleInputPassword1">Password</label>
                <input value="{{ old('password') }}" type="password" name="password" class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="form-group mb-4">
                <label for="exampleInputPassword1">confirm Password</label>
                <input value="{{ old('password_confirmation') }}" type="password" name="password_confirmation"
                    class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group mb-3">
                <label for="image">image</label>
                <input id="image" class="form-control" type="file" name="image" placeholder="image">
            </div>
            {{-- <div class="mb-4">
                <select name="role" class="custom-select ">
                    <option value="admin" selected>Admin</option>
                    <option value="employe">employe</option>
                </select>
            </div> --}}
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

    </div>
@endsection

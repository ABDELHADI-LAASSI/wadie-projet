@extends('layouts.adminMaster')

@section('content')
    <div class="container">
        <h1 class="text-center">Edit une taches</h1>

        @if (session()->has('edit'))
            <div class="alert alert-success" role="alert">
                {{ session('edit') }}
            </div>
        @endif

        <form action="{{ route('tache.update' , $tache->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input value="{{old('description') ?? $tache->description}}" name="description" type="text" class="form-control" id="description">
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="duree" class="form-label">Durée en minutes</label>
                <input value="{{old('durée') ?? $tache->durée}}" name="durée" type="number" class="form-control" id="duree">
                @error('durée')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="select" class="form-label">employé</label>
                <select name="user_id" class="form-select" id="select">
                    <option value=""></option>
                    @foreach ($employes as $item)
                        <option value={{ $item->id }}> {{ $item->name }} </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="select" class="form-label">status</label>
                <select name="status" class="form-select" id="select">
                    <option value=""></option>
                    <option value="inProgress">inProgress</option>
                    <option value="done">Done</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Modifié</button>
        </form>

    </div>
@endsection

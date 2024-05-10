@extends('layouts.adminMaster')

@section('content')
    <div class="container">
        <h1 class="text-center">ajouter une taches</h1>

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tache.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input value="{{old('description')}}" name="description" type="text" class="form-control" id="description">
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="duree" class="form-label">Durée en minutes</label>
                <input value="{{old('durée')}}" name="durée" type="number" class="form-control" id="duree">
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
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

    </div>
@endsection

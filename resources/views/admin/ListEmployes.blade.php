@extends('layouts.adminMaster')

@section('content')
    <div class="container">
        <h1 class="text-center">List des employes</h1>

        @if (session()->has('delete'))
            <div class=" my-5 alert alert-success" role="alert">
                {{ session('delete') }}
            </div>
        @endif
        @if (session()->has('edit'))
            <div class="alert alert-success" role="alert">
                {{ session('edit') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>

                    <th scope="col">email</th>
                    <th scope="col">nombres des taches</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employes as $item)
                <tr>
                    <td> {{$item->id}} </td>
                    <td> {{$item->name}} </td>

                    <td> {{$item->email}} </td>
                    <td> {{$item->nbrOfTaches}} </td>
                    <td style="display: flex">
                        <form action="{{route('taches.deleteEmploye',$item->id)}}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                        <form action="{{route('admin.change' , $item->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success mx-3">change to admin</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>



    </div>
@endsection

@extends('layouts.adminMaster')

@section('content')
    <div class="container">
        <h1 class="text-center">List des taches</h1>

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

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">description</th>
                    <th scope="col">durée en minutes</th>
                    <th scope="col">status</th>
                    <th scope="col">employe</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taches as $item)
                <tr>
                    <td> {{$item->id}} </td>
                    <td> {{$item->description}} </td>
                    <td> {{$item->durée}} </td>
                    <td> {{$item->status}} </td>
                    <td> {{$item->employe}} </td>
                    <td style="display: flex">
                        <form action="{{route('taches.delete',$item->id)}}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                        <a href={{ route("tache.edit",$item->id) }} class="btn btn-success mx-3">modifier</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>



    </div>
@endsection

@extends('layouts.employeMaster')

@section('content')
    <div class="container">

        @if (session()->has('success'))
            <div class="my-5 alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-center">profile</h1>
        @include('employe.employeProfile')

    </div>
@endsection

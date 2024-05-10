@extends('layouts.employeMaster')

@section('content')
    <div class="container">

        @if (session()->has('success'))
            <div class="my-5 alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div style="display: flex; margin:2rem auto;" class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary" onclick="showData('all')">All taches</button>
            <button type="button" class="btn btn-primary" onclick="showData('inprogress')">taches InProgress</button>
            <button type="button" class="btn btn-primary" onclick="showData('done')">taches done</button>
        </div>


        <div id="inprogress" style="display: none" class="data-section">
            @if ($progress)
                <h1 style="text-align: center; margin:1rem;">taches inProgress</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">description</th>
                            <th scope="col">durée en minutes</th>
                            <th scope="col">status</th>
                            <th scope="col">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taches as $item)
                            @if ($item->status == 'inProgress')
                                <tr>
                                    <td> {{ $item->id }} </td>
                                    <td> {{ $item->description }} </td>
                                    <td> {{ $item->durée }} </td>
                                    <td> {{ $item->status }} </td>
                                    <td style="display: flex; column-gap:1rem;">
                                        <form action="{{ route('taches.delete', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                        <form action="{{ route('employe.makeTacheDone', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Done</button>
                                        </form>

                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            @else
                <h2 style="text-align: center; text-transform: uppercase;">pas des taches in progress</h2>
            @endif
        </div>
        <div id="done" style="display: none" class="data-section">
            @if ($done)
                <h1 style="text-align: center; margin:1rem;">taches done</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">description</th>
                            <th scope="col">durée en minutes</th>
                            <th scope="col">status</th>
                            <th scope="col">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taches as $item)
                            @if ($item->status == 'done')
                                <tr>
                                    <td> {{ $item->id }} </td>
                                    <td> {{ $item->description }} </td>
                                    <td> {{ $item->durée }} </td>
                                    <td> {{ $item->status }} </td>
                                    <td style="display: flex; column-gap:1rem;">
                                        <form action="{{ route('taches.delete', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            @else
                <h2 style="text-align: center; text-transform: uppercase;">pas des taches términé</h2>
            @endif
        </div>
        <div id="all" style="display: block" class="data-section">
            @if ($all)
                <h1 style="text-align: center; margin:1rem;">all taches</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">description</th>
                            <th scope="col">durée en minutes</th>
                            <th scope="col">status</th>
                            <th scope="col">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taches as $item)
                            @if ($item->status == 'inProgress')
                                <tr>
                                    <td> {{ $item->id }} </td>
                                    <td> {{ $item->description }} </td>
                                    <td> {{ $item->durée }} </td>
                                    <td> {{ $item->status }} </td>
                                    <td style="display: flex; column-gap:1rem;">
                                        <form action="{{ route('taches.delete', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                        <form action="{{ route('employe.makeTacheDone', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Done</button>
                                        </form>

                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td> {{ $item->id }} </td>
                                    <td> {{ $item->description }} </td>
                                    <td> {{ $item->durée }} </td>
                                    <td> {{ $item->status }} </td>
                                    <td style="display: flex; column-gap:1rem;">
                                        <form action="{{ route('taches.delete', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            @else
                <h2 style="text-align: center; text-transform: uppercase;">pas des taches</h2>
            @endif
        </div>

    </div>
@endsection

@section('script')
    <script>
        // JavaScript to show/hide the corresponding data when a button is clicked
        function showData(id) {
            // Hide all data sections
            document.querySelectorAll('.data-section').forEach(section => {
                section.style.display = 'none';
            });

            // Show the selected data section
            document.getElementById(id).style.display = 'block';
        }
    </script>
@endsection

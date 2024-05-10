<div>
    @if (session()->has('images'))
            <div class="alert alert-success" role="alert">
                {{ session('images') }}
            </div>
        @endif
    @if ($employe->image)
        <img style="width: 250px; height:250px; border-radius:50%;" src={{ asset('storage/'.$employe->image) }} alt="test">
    @else
        <h3>didnt add image yet</h3>
    @endif
    <P>Nom complet : <span style="font-weight: bold">{{$employe->name}} </span></P>
    <P>Email : <span style="font-weight: bold">{{$employe->email}}</span> </P>
    <div>
        <h3>modifier l'image</h3>
        <form action="{{route('employe.changeProfile' , $employe->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="image">image</label>
                <input id="image" class="form-control" type="file" name="image" placeholder="image">
            </div>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <button>modifier</button>
        </form>
    </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Register Form</title>
</head>
<body>
    <div class="container">
    <h1>register</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action={{ route('registerLogic')}} method="Post">
        @csrf
        <div class="form-group mb-4">
          <label for="exampleInputEmail1">name</label>
          <input value="{{old('name')}}" type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
        <div class="form-group mb-4">
          <label for="exampleInputEmail1">Email address</label>
          <input value="{{old('email')}}"  type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
        <div class="form-group mb-4">
          <label for="exampleInputPassword1">Password</label>
          <input value="{{old('password')}}" type="password" name="password" class="form-control" id="exampleInputPassword1" >
        </div>
        <div class="form-group mb-4">
          <label for="exampleInputPassword1">confirm Password</label>
          <input value="{{old('password_confirmation')}}" type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" >
        </div>
        {{-- <div class="mb-4">
            <select name="role" class="custom-select ">
                <option value="admin" selected>Admin</option>
                <option value="employe">employe</option>
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</body>
</html>

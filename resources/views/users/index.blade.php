<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-8 mx-auto">
        <div class="card border-0 shadow">
          <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $error)
              -{{$error}} <br />
              @endforeach
            </div>
            @endif
            <form class="row" action="{{ route('users.store') }}" method="POST">
              <div class="col-3">
                <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{old('name')}}" />
              </div>
              <div class="col-4">
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" />
              </div>
              <div class="col-3">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" value="{{old('password')}}" />
              </div>
              <div class="col-auto">
                @csrf
                <button class="btn btn-primary" type="submit"> Enviar</button>
              </div>
            </form>
          </div>
        </div>
        <br />
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>
                <form action="{{route('users.destroy',$user)}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <input type="submit" value="Eliminar" class="btn btn-small btn-danger" onclick="return confirm('¿Desea Eliminar?..')" />
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>
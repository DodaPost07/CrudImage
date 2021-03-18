<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <h2 style="color:white;">Gestion des utilisateurs</h2>
      </div>
    </header><br><br>
<div class="container mt-2">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>Liste des utilisateurs</h2>
                <a class="btn btn-primary float-right fa fa-plus-square" href="{{ route('posts.create') }}"> Nouveau utilisateur</a>
                <a class="btn btn-primary float-left fa fa-refresh" href="{{ route('posts.index') }}" enctype="multipart/form-data"> </a>
                
                <form action="{{  route('web.index')  }}" method="GET" class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2 ml-5" type="text" placeholder="Search" aria-label="Search" name="query">
                    <button class="btn btn-outline-success fa fa-search my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
               
        </div>
    </div>
    <br><hr>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table">
        <thead class="thead-primary">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Age</th>
                <th scope="col">Image</th>
                <th width="320px" scope="col">Action</th>
            </tr>
        </thead>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->nom }}</td>
                <td>{{ $post->prenom }}</td>
                <td>{{ $post->age }}</td>
                <td><img src="{{ Storage::url($post->image) }}" height="100" width="200" alt="" /></td>
                <td>
                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
        
                        <a class="btn btn-outline-warning fa fa-edit" href="{{ route('posts.edit',$post->id) }}">Modifier</a>

                        <a class="btn btn-outline-info fa fa-info-circle" href="{{ route('posts.show',$post->id) }}">Montrer</a>


    
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="btn btn-outline-danger fa fa-trash">Effacer</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
  
    {!! $posts->links() !!}
</body>
</html>
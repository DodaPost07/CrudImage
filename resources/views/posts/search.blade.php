<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
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
                <form action="{{url ('/search')}}" type="get" class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="query">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Nouveau utilisateur</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Age</th>
                <th scope="col">Image</th>
                <th width="280px" scope="col">Action</th>
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
        
                        <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Modifier</a>

                        <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Montrer</a>


    
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="btn btn-danger">Effacer</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
  
    {!! $posts->links() !!}
</body>
</html> 

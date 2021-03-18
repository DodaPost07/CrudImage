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
        <a class="btn btn-primary" href="{{ route('posts.index') }}" enctype="multipart/form-data"> Retour</a>
      </div>
    </header><br><br>


    <main role="main" class="container">
    <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Modification de l'utilisateur n°: {{ $post->id }} </h2>
                </div>
                <div class="pull-right">
                </div>
            </div>
        </div>
   
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif



  <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data" class="jumbotron">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" name="nom" value="{{ $post->nom }}" class="form-control" placeholder="Nom">
                    @error('title')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prenom:</strong>
                    <input type="text" name="prenom" value="{{ $post->prenom }}" class="form-control" placeholder="Prenom">
                    @error('title')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Age:</strong>
                    <input type="text" name="age" value="{{ $post->age }}" class="form-control" placeholder="Age">
                    @error('title')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ajout Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Ajout titre">
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                <img src="{{ Storage::url($post->image) }}" height="200" width="400" alt="" />
                </div>
            </div>
            
              <button type="submit" class="btn btn-primary ml-3 fa fa-check-square-o"> Valider </button>
    </main>


   
    </form>
</div>
</body>
</html>
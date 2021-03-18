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
        <a class="btn btn-primary" href="{{ route('posts.index') }}" enctype="multipart/form-data"> Retour</a>
      </div>
    </header><br><br><br>
    <div class="container mt-2">
        <div class="pull-">
            
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Utilisateur n°: {{ $post->id }} </h2>
                </div>
            </div>
    </div>
   
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif




        @csrf
        @method('PUT')
   


        <div class="col-md-5">
              <div class="card mb-4 box-shadow">    
              <img src="{{ Storage::url($post->image) }}" height="200" width="430" alt="" />
                <div class="card-body">
                <strong>Nom: {{ $post->nom }}</strong><br>
                <strong>Prenom: {{ $post->prenom }}</strong><br>
                <strong>Age: {{ $post->age }}</strong>
                  <div class="d-flex justify-content-between align-items-center">
                  </div>
                </div>
              </div>
            </div>



         <div class="row">

                <div class="form-group">
                    @error('title')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div><br>

        

                <div class="form-group">
                    
                    @error('title')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div><br><hr<
    

                <div class="form-group">
                    
                    @error('title')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                <br><hr>

                <div class="form-group">
                </div>
          
        </div>
   
    </form>
</div>
</body>
</html>
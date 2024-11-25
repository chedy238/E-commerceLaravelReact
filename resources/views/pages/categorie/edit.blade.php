@include('layouts_dashb.head')
@include('layouts_dashb.aside')
@include('layouts_dashb.navbar')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Catégories</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>

    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Ajouter une catégorie</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('categories.update', $categorie->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')      
                <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom"
                    value='{{$categorie->nom}}'
                        aria-describedby="emailHelp"
                        placeholder="Choisir le nom du site ...">
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="logo" name="logo">
                        <label class="custom-file-label" for="customFile">Choisir le logo</label>
                    </div>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

@include('layouts_dashb.footer')

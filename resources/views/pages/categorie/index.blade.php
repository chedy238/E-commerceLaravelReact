@include('layouts_dashb.head')
@include('layouts_dashb.aside')
@include('layouts_dashb.navbar')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Catégories</h1>
        <a class="btn btn-primary" type="button" href="{{ route('categories.create') }}">
            Ajouter
        </a>
        @if($type==0)
        <a class="btn btn-danger" type="button" href="{{ route('categories_archive') }}">
            Catégories archiver
        </a>
        @else
        <a class="btn btn-success" type="button" href="{{ route('categories.index') }}">
            Catégories actif
        </a>
        @endif
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                                <tr>
                                    <td><img src='{{ asset('img') }}/{{ $categorie->logo }}' width='50'></td>
                                    <td>{{$categorie->nom}}</td>
                                    <td><a class="btn btn-warning" type="button" href="{{ route('categories.edit',$categorie->id) }}">
                                        Modifier
                                    </a>
                                    @if($categorie->etat==0)
                                    <a class="btn btn-danger" href="{{ route('modif_etat_categorie', ['id' => $categorie->id, 'etat' => 1]) }}">
                                        Archiver
                                    </a> 
                                    @else
                                    <a class="btn btn-success" href="{{ route('modif_etat_categorie', ['id' => $categorie->id, 'etat' => 0]) }}">
                                        Désarchiver
                                    </a> 
                                    @endif                                   
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>

@include('layouts_dashb.footer')

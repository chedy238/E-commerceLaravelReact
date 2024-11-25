@include('layouts_dashb.head')
@include('layouts_dashb.aside')
@include('layouts_dashb.navbar')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Parameter</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>

    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Modifier les paramètres du site</h6>
        </div>

        <div class="card-body">
            @if (isset($parameter->logo))
                <img src='{{ asset('img') }}/{{ $parameter->logo }}' width='100'>
            @endif
            <form action="{{ route('modifier_parameter') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom"
                        value='{{ isset($parameter->nom) ? $parameter->nom : '' }}' aria-describedby="emailHelp"
                        placeholder="Choisir le nom du site ...">
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="logo" name="logo">
                        <label class="custom-file-label" for="customFile">Choisir le logo</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value='{{ isset($parameter->email) ? $parameter->email : '' }}' aria-describedby="emailHelp"
                        placeholder="Choisir l'e-mail ...">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" id="adresse" name="adresse"
                        value='{{ isset($parameter->adresse) ? $parameter->adresse : '' }}' aria-describedby="emailHelp"
                        placeholder="Choisir l'adresse ...">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Téléphone</label>
                    <input type="number" class="form-control" id="telephone" name="telephone"
                        value='{{ isset($parameter->telephone) ? $parameter->telephone : '' }}'
                        aria-describedby="emailHelp" placeholder="Choisir le numéro de téléphone ...">
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

@include('layouts_dashb.footer')

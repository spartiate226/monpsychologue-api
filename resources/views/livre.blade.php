@extends('layout',['page'=>'Livres'])
@section('content')
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addbook">
        Ajouter un livre
    </button>
    <div class="modal fade" id="addbook">
        <div class="modal-dialog">
            <form action="{{url('dashboard/addbook')}}" class="modal-content" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajout d'un livre</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" name="nom" type="text" placeholder="Nom du livre">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="prix" type="number" value="0" placeholder="Prix du livre">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="categorie_id" id="">
                            <option selected value="0">Choisir une categorie</option>
                            @foreach ($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Choisir le livre</label>
                        <input class="form-control" name="livre" type="file" placeholder="Nom du livre">
                    </div>
                    <div class="form-group">
                        <label for="">Affiche du livre</label>
                        <input class="form-control" name="photo" type="file" placeholder="Photo du livre">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="candownload" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Ce livre est telechargeable</label>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea name="description" id="desc" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste des livres</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 20px">Photo</th>
                            <th>Nom</th>
                            <th style="width: 10px">Prix</th>
                            <th style="width: 30px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($livres as $livre)
                            <tr>
                                <td></td>
                                <td>
                                    <img width="50" height="50" src="{{asset('storage/'.$livre->photo)}}" alt="affiche">
                                </td>
                                <td>
                                  {{$livre->nom}}
                                </td>
                                <td>
                                    {{$livre->prix}} Fcfa
                                </td>
                                <td >
                                    <span class="badge bg-info"><i class="fa fa-eye"></i></span>
                                    <span class="badge bg-success"><i class="fa fa-pencil-alt"></i></span>
                                    <span class="badge bg-danger"><i class="fa fa-trash"></i></span>
                                </td>
                            </tr>
                        @empty
                            <tr><td>Vide</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{$livres->links()}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

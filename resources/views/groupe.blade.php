@extends('layout',['page'=>'Forums'])
@section('content')
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addbook">
        Ajouter un forum
    </button>
    <div class="modal fade" id="addbook">
        <div class="modal-dialog">
            <form action="{{url('dashboard/addforum')}}" class="modal-content" method="Post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajout d'un forum</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" name="nom" type="text" placeholder="Nom du forum">
                    </div>
                    <div class="form-group">
                        <label for="admins">Administrateur du forum</label>
                        <select class="form-control" name="admin_id" id="admins">
                           @foreach(\App\Models\psychologue::all() as $psy)
                                <option value="{{$psy->id}}">{{$psy->nom.' '.$psy->prenom}}</option>
                            @endforeach
                        </select>
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
                            <th>Nom</th>
                            <th>Nombre de questions</th>
                            <th>description</th>
                            <th style="width: 30px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($forums as $forum)
                            <tr>
                                <td></td>
                                <td>
                                    {{$forum->nom}}
                                </td>
                                <td>
                                    {{count($forum->questions)}}
                                </td>
                                <td>
                                    {{$forum->description}}
                                </td>
                                <td >
                                    <span class="badge bg-info"><i class="fa fa-eye"></i></span>
                                    <span class="badge bg-success"><i class="fa fa-pencil-alt"></i></span>
                                    <span class="badge bg-danger"><i class="fa fa-trash"></i></span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center">Vide</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{$forums->links()}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

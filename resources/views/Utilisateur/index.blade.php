@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <section class="container-fluid d-flex flex-column align-items-center">
      <div class="container-fluid ml-5 mt-5 d-flex justify-content-start w-25">
        <a class="btn btn-success text-color mb-3" href="{{ URL::previous() }}" role="button">Retour</a>
      </div>
            <h3 class="display-2 mt-5 mb-5">Utilisateurs</h3>
        <div class="table-container mb-5" style="width: 90%;">
            <div class="d-flex justify-content-end">
                <button data-toggle="modal" data-target="#ajoutModal" data-toggle="tooltip" data-placement="left" title="Ajouter un utilisateur" type="button" class="btn btn-primary mb-2" style="padding: 0px 3px; text-align: center;" ><span class="material-symbols-outlined" style="font-size:30px;margin-top:3px;">add</span></button>
            </div>
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td style="text-transform: uppercase;">{{ $user->name }}</td>
                            <td >{{ $user->email }}</td>
                            <td >{{ $user->role->name }}</td>
                            <td class="actions d-flex justify-content-end">
                                @if ($user->id != 1)
                                    <form action="{{ route('Utilisateur.destroy', $user->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm mr-2" onclick="return confirm('En cliquant sur OK vous allez supprimer l\'Utilisateur')" ><span class="material-symbols-outlined">delete</span></button>
                                    </form>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#ModifierModal" onclick="getTableId({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}')"><span class="material-symbols-outlined">edit</span></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>



    <!-- Modal -->
    <div class="modal fade" id="ajoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body d-flex justify-content-center">
                <form class="form-inline mb-3 mt-3 d-flex justify-content-center" method="POST" action="{{ route("Utilisateur.store") }}">
                    @csrf
                    <label class="sr-only" for="name">Nom</label>
                    <div class="input-group mb-2 mr-sm-2" style="width : 83%;">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Nom</div>
                      </div>
                      <input type="text" class="form-control" name="name" required>
                    </div>
                    <label class="sr-only" for="email">Email</label>
                    <div class="input-group mb-2 mr-sm-2" style="width : 83%;">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Email</div>
                      </div>
                      <input type="email" class="form-control" name="email" required>
                    </div>
                    <label class="sr-only" for="mdp">Mot de passe</label>
                    <div class="input-group mb-2 mr-sm-2" id="show_hide_password" style="width : 83%;">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Mot de passe</div>
                      </div>
                      <input type="password" class="form-control" name="password" required>
                      <div class="input-group-append">
                        <a href="" class="input-group-text" style="text-decoration: none;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                      </div>
                    </div>
                    <label class="sr-only" for="role">Role</label>
                    <div class="input-group mb-2 mr-sm-2" style="width : 83%;">
                      <div class="input-group-prepend" >
                        <div class="input-group-text">Role</div>
                      </div>
                      <select name="role" class="form-control" disabled>
                        <option value="" selected> SousAdmin</option>
                      </select>
                    </div>
              </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ModifierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body d-flex justify-content-center">
                <form class="form-inline mb-3 mt-3 d-flex justify-content-center" method="POST" id="UpdateForm">
                    @csrf
                    @method("PATCH")
                    <label class="sr-only" for="name">Nom</label>
                    <div class="input-group mb-2 mr-sm-2" style="width : 83%;">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Nom</div>
                      </div>
                      <input type="text" class="form-control" name="name" id="UpdateName" required>
                    </div>
                    <label class="sr-only" for="email">Email</label>
                    <div class="input-group mb-2 mr-sm-2" style="width : 83%;">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Email</div>
                      </div>
                      <input type="email" class="form-control" name="email" id="UpdateEmail" required>
                    </div>
                    <label class="sr-only" for="mdp">Mot de passe</label>
                    <div class="input-group mb-2 mr-sm-2" id="show_hide_password" style="width : 83%;">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Mot de passe</div>
                      </div>
                      <input type="password" class="form-control" name="password" required>
                      <div class="input-group-append">
                        <a href="" class="input-group-text" style="text-decoration: none;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                      </div>
                    </div>
                    <label class="sr-only" for="role">Role</label>
                    <div class="input-group mb-2 mr-sm-2" style="width : 83%;">
                      <div class="input-group-prepend" >
                        <div class="input-group-text">Role</div>
                      </div>
                      <select name="role" class="form-control" disabled>
                        <option value="" selected> SousAdmin</option>
                      </select>
                    </div>
              </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection

@push('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> 
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                order: [[2, 'asc']]
            });
        } );

        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }
                else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });

        function getTableId(id, User, Email) {
            let modifier_action = "{{route('Utilisateur.update', '')}}"+"/"+id;
            UpdateForm.action = modifier_action;
            UpdateName.value = User;
            UpdateEmail.value = Email;
        }
    </script>
@endpush
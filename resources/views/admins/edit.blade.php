@extends('layouts.app2')

@section('content')
        <br>    <br>
        <br>

        <div style="padding-left:35%; color:#e0e0eb; font-family:Helvetica;">
        <h2>Edit Customer</h2>
        </div>
        <br>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whooops!!</strong>There Were Some Problems With Your Input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid" style="padding-left:20%;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ route('admins.update',$admin->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <form class="form-horizontal">
                        <div class="card-body">
                            
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Last name : </strong></label>
                                <div class="col-sm-9">
                                <input type="text" name="nom" value="{{$admin->nom}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>First name : </strong></label>
                                <div class="col-sm-9">
                                <input type="text" name="prenom" value="{{$admin->prenom}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Address :</strong></label>
                                        <div class="col-sm-9">
                                        <textarea  name="adresse" class="form-control" rows="2" value="{{$admin->adresse}}"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Email :</strong></label>
                                        <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" value="{{$admin->email}}">
                                        </div>
                                    </div>


                            <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Mobile No :</strong></label>
                                        <div class="col-sm-9">
                                        <input type="tel" name="tel" class="form-control" value="{{$admin->tel}}">
                                        </div>
                                    </div>

                            <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Age :</strong></label>
                                        <div class="col-sm-9">
                                        <input type="number" name="age" class="form-control" value="{{$admin->age}}">
                                        </div>
                                    </div>

                            <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"><strong>Gender :</strong></label>
                                        <div class="col-sm-9">
                                        <select  name="sexe" class="form-control" aria-invalid="false" value="{{$admin->sexe}}">
                                        <option value="">--Select--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        </select>
                                        </div>
                                    </div>


                            <div class="form-group row">
                          <strong class="col-sm-3 text-right control-label col-form-label">Current City :</strong>
                          <div class="col-sm-9">
                          <select class="form-control" name="ville" aria-invalid="false" value="{{$admin->ville}}">
                          <option value="">--Select--</option>
                          <option value="Casablanca">Casablanca</option>
                          <option value="Fés">Fés</option>
                          <option value="Tanger">Tanger</option>
                          <option value="Marrakech">Marrakech</option
                          ><option value="Salé">Salé</option>
                          <option value="Meknés">Meknés</option
                          ><option value="Rabat">Rabat</option>
                          <option value="Oujda">Oujda</option>
                          <option value="Kénitra">Kénitra</option>
                          <option value="Agadir">Agadir</option>
                          <option value="tetouan">tetouan</option>
                          <option value="El jadida">El jadida</option
                          ><option value="Berkane">Berkane</option>
                          <option value="Safi">Safi</option>
                          <option value="Mohammédia">Mohammédia</option>
                          <option value="Khouribga">Khouribga</option>
                          <option value="Al-Hoceima">Al-Hoceima</option>
                          <option value="Bouznika">Bouznika</option>
                          <option value="Chefchaouen">Chefchaouen</option>
                          <option value="Essaouira">Essaouira </option>
                          <option value="Guelmim">Guelmim</option>
                          <option value="Ifrane">Ifrane</option>
                          <option value="Laâyoune">Laâyoune </option>
                          <option value="Martil">Martil</option>
                          <option value="Mediouna">Mediouna</option>
                          <option value="Saïdia">Saïdia</option>
                          <option value="Tan-Tan">Tan-Tan</option>
                          <option value="Taza">Taza</option>
                          <option value="Youssoufia">Youssoufia</option>
                          </select>                             
                      </div>
                        </div>

                            <div class="form-group row">
                                <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-primary" href="{{route('admins.index')}}">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>

    @endsection
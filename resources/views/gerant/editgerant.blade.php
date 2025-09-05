@extends('base.gerant')

@section('gerant-content')

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Formulaire</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">editer gerant</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Editer gerant</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('update-clientgerant', [$client->id]) }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input type="text" class="form-control "  id="exampleName"
                                        name="name" value="{{$client->name}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Lastname</label>
                                        <input type="text" class="form-control"  id="exampleLastName"
                                        name="lastname" value="{{$client->lastname}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Address</label>
                                        <input type="text" class="form-control" id="exampleAddress" placeholder="Address"  name="address" value="{{$client->address}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Phone</label>
                                        <input type="phone" class="form-control" id="examplePhone" placeholder="Phone"  name="phone" value="{{$client->phone}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

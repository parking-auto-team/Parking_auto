@extends('emplacement.index')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">La duree de stationnement</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <p> </p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 ">
                        <form action="" method="POST">
                            @csrf




                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <h6>
                                    La duree est
                                </h6>
                            </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

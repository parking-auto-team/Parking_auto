@extends('base.admin')

@section('admin-content')
    {{-- <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">LISTE CLIENTS</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <p> le dashboard client nous donne la liste de tous les clients ajoutes</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <a href="{{ route('ajouter-client') }}"
                                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm "> Ajouter
                                    Client</a>
                            </div>
                            <div class="col-sm-12 col-md-6">
                            </div>

                        </div><br>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending" style="width: 161px;">
                                                Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 248px;">Lastname</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 115px;">Address</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 51px;">Phone</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 51px;">Vehicules</th>


                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Profile</th>
                                        </tr>
                                    </thead>
                                    @foreach ($clients as $client)
                                        <tbody>
                                            <tr>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->lastname }}</td>
                                                <td>{{ $client->address }}</td>
                                                <td>{{ $client->phone }}</td>
                                                <td>
                                                    @foreach ($client->vehicules as $vehicule)
                                                        <a
                                                            href="{{ route('attribuer-place', ['id' => $vehicule->id]) }}">{{ $vehicule->matricule }}</a><br>
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('edit-client', ['id' => $client->id]) }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="left" title="Edit">
                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                    fill="black"></path>
                                                                <path
                                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                    fill="gray"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->

                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('delete-client', ['id' => $client->id]) }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="left" title="Delete">
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                    fill="gray" />
                                                                <path opacity="0.5"
                                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                    fill="black" />
                                                                <path opacity="0.5"
                                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('profile', ['id' => $client->id]) }}"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm  ">
                                                        Voir Profile
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
    <br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Datatable</h4>
                </div>
                <div class="card-body">
                        <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                            {{-- <div class="dataTables_length" id="example3_length">
                                <label>Show <select name="example3_length" aria-controls="example3" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
                            </div>
                            <div id="example3_filter" class="dataTables_filter">
                                <label>Search:<input type="search" class="" placeholder="" aria-controls="example3"></label>
                            </div> --}}
                            <table id="example3" class="display min-w850 dataTable no-footer" role="grid" aria-describedby="example3_info">
                            <thead>
                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" style="width: 25px;"></th><th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 90.75px;">Name</th><th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 112.5px;">Department</th><th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" style="width: 49.0156px;">Gender</th><th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Education: activate to sort column ascending" style="width: 89.9375px;">Education</th><th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending" style="width: 71.7344px;">Mobile</th><th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 118.031px;">Email</th><th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Joining Date: activate to sort column ascending" style="width: 84.0156px;">Joining Date</th><th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 46.0156px;">Action</th></tr>
                            </thead>
                            <tbody>
                            <tr role="row" class="odd">
                                    <td class="sorting_1"><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td>
                                    <td>Tiger Nixon</td>
                                    <td>Architect</td>
                                    <td>Male</td>
                                    <td>M.COM., P.H.D.</td>
                                    <td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
                                    <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                    <td>2011/04/25</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1"><img class="rounded-circle" width="35" src="images/profile/small/pic2.jpg" alt=""></td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Female</td>
                                    <td>M.COM., P.H.D.</td>
                                    <td><a href="javascript:void(0);"><strong>987 654 3210</strong></a></td>
                                    <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                    <td>2011/07/25</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1"><img class="rounded-circle" width="35" src="images/profile/small/pic3.jpg" alt=""></td>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical</td>
                                    <td>Male</td>
                                    <td>B.COM., M.COM.</td>
                                    <td><a href="javascript:void(0);"><strong>(123) 4567 890</strong></a></td>
                                    <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                    <td>2009/01/12</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1"><img class="rounded-circle" width="35" src="images/profile/small/pic4.jpg" alt=""></td>
                                    <td>Cedric Kelly</td>
                                    <td>Developer</td>
                                    <td>Male</td>
                                    <td>B.COM., M.COM.</td>
                                    <td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
                                    <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                    <td>2012/03/29</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1"><img class="rounded-circle" width="35" src="images/profile/small/pic5.jpg" alt=""></td>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Female</td>
                                    <td>B.A, B.C.A</td>
                                    <td><a href="javascript:void(0);"><strong>987 654 3210</strong></a></td>
                                    <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                    <td>2008/11/28</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1"><img class="rounded-circle" width="35" src="images/profile/small/pic6.jpg" alt=""></td>
                                    <td>Brielle Williamson</td>
                                    <td>Specialist</td>
                                    <td>Male</td>
                                    <td>B.COM., M.COM.</td>
                                    <td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
                                    <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                    <td>2012/12/02</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1"><img class="rounded-circle" width="35" src="images/profile/small/pic7.jpg" alt=""></td>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>Female</td>
                                    <td>B.A, B.C.A</td>
                                    <td><a href="javascript:void(0);"><strong>987 654 3210</strong></a></td>
                                    <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                    <td>2012/08/06</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1"><img class="rounded-circle" width="35" src="images/profile/small/pic8.jpg" alt=""></td>
                                    <td>Rhona Davidson</td>
                                    <td>Integration</td>
                                    <td>Male</td>
                                    <td>B.TACH, M.TACH</td>
                                    <td><a href="javascript:void(0);"><strong>(123) 4567 890</strong></a></td>
                                    <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                    <td>2010/10/14</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1"><img class="rounded-circle" width="35" src="images/profile/small/pic9.jpg" alt=""></td>
                                    <td>Colleen Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>Female</td>
                                    <td>B.A, B.C.A</td>
                                    <td><a href="javascript:void(0);"><strong>(123) 4567 890</strong></a></td>
                                    <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                    <td>2009/09/15</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1"><img class="rounded-circle" width="35" src="images/profile/small/pic10.jpg" alt=""></td>
                                    <td>Sonya Frost</td>
                                    <td>Software Engineer</td>
                                    <td>Male</td>
                                    <td>B.COM., M.COM.</td>
                                    <td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
                                    <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                    <td>2008/12/13</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr></tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@extends('backend.template.template')
@section('title', 'List Users')
@section('main')
   <section class="mb-1">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">List Users</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"> Administration
                    </li>
                    <li class="breadcrumb-item active"> List Users
                    </li>
                </ol>
            </div>
            <div class="col-12 top_btn">
                @can('add user')
                <div class="btn-group">
                    <a href="{{route('users.add_edit')}}" class="btn btn-outline-primary"><span><i class="feather icon-plus"></i>&nbsp; Add New</span></a>
                </div>
                @endcan
                <div class="btn-group">
                    <button  class="btn filter-btn btn-outline-warning"><span><i class="feather icon-search"></i>&nbsp; Filter </span></button>
                </div>

            </div>
        </div>
    </section>
   <section class="filter" style="display: none">
       <div class="col-md-4 col-12 mb-1">
           <fieldset class="">
               <form id="filterForm" onsubmit="return false">
                   <div class="input-group">
                       <input type="text" id="query" class="form-control" placeholder="Button on right" aria-describedby="button-addon2">
                       <div class="input-group-append" id="button-addon2">
                           <button id="search" class="btn btn-primary waves-effect waves-light" type="button">Search</button>
                       </div>
                   </div>
               </form>
           </fieldset>
       </div>
   </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped datatable table-condensed" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>User name</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Updated BY</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
@push('script')
    <script>

       $(document).ready(function () {
           let query = null;
           function DataLoad() {
               let dataTable = $('.datatable').DataTable({
                   scrollX: false,
                   "searching": false,
                   buttons: [],
                   dom: 'Bfrtip',
                   'processing': true,
                   'serverSide': true,
                   'ajax': {
                       url: '{{ route("users.index") }}',
                       type: "GET",

                   },
                   order: [[0, 'desc']],
                   responsive: true,
                   'columns': [
                       {
                           "title": "#",
                           render: function (data, type, row, meta) {
                               return meta.row + meta.settings._iDisplayStart + 1;
                           }
                       },
                       {
                           data: 'full_name',
                           name: 'full_name',
                           searchable: false,
                       },
                       {
                           data: 'email',
                           name:'email',
                           searchable: false,
                       },
                       {
                           data: 'user_name',
                           name:'user_name',
                           searchable: false,
                       },
                       {
                           data: 'roles',
                           name:'role',
                           searchable: false,
                       },
                       {
                           "data": function (data, type, row) {
                               let status = '<span class="badge badge-danger">Inactive</span>';
                               if (data.status == '1') {
                                   status = '<span class="badge badge-success">Active</span>';
                               }
                               return status;
                           }
                       },
                       { data: 'creator.full_name' },
                       {
                           data: 'updator.full_name',
                           render: function (data, type, row) {
                               return data ? data : '';
                           },
                       },
                       { data: 'actions' },
                   ],
               });

               $('#search').click(function (e) {
                   e.preventDefault();
                   let query = $('#query').val();
                   dataTable.ajax.url("{{ route('users.index') }}?q=" + query).load();
               });
           }



           DataLoad();
       });

       //filter button toggle

       $(".filter-btn").click(function() {
           $(".filter").slideToggle(300);
       });

    </script>
@endpush

@extends('backend.template.template')
@section('title', 'Table')
@section('main')

    <section class="mb-1">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Classroom</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"> Classroom List
                    </li>
                </ol>
            </div>
            <div class="col-12 top_btn">
                <div class="btn-group">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#brand"><span><i class="feather icon-plus"></i>&nbsp;Add New Class</span></button>
                </div>
            </div>
        </div>
    </section>
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped data-table-with-export">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Class Name</th>
                                        <th>Section</th>
                                        <th>Class Teacher</th>
                                        <th>Number Of Student</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i = 1 @endphp
                                    @foreach($classroom as $data)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $data->class_name}}</td>
                                            <td>{{ $data->section}}</td>
                                            <td>{{ $data->class_teacher }}</td>
                                            <td>{{ $data->number_of_student }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--        popup modal form --}}
        <div class="modal fade text-left" id="brand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Add New Class</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form form-vertical" method="post" action="{{route('classroom.store')}}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Class Name </label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="class_name" placeholder="Class Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Section </label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="section" placeholder="section">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Class Teacher Name </label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="class_teacher" placeholder="Class Teacher Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Number Of Student </label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="number_of_student" placeholder="Number Of Student">
                                        </div>
                                        <div class=" modal-footer">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--        end popup modal form--}}
    </section>
@endsection

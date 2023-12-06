@extends('backend.template.template')
@section('title', 'Table')
@section('main')

    <section class="mb-1">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Students</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"> Student List
                    </li>
                </ol>
            </div>
            <div class="col-12 top_btn">
                <div class="btn-group">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#brand"><span><i class="feather icon-plus"></i>&nbsp;Add New Student</span></button>
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
                                        <th>Student Name</th>
                                        <th>Student Id</th>
                                        <th>E-mail</th>
                                        <th>Date of Birth</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Roll No.</th>
                                        <th>Address</th>
                                        <th>Father's Name</th>
                                        <th>Mother's Name</th>
                                        <th>Contact Number</th>
                                        <th>Guardian Contact Number</th>
                                        <th>Image</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
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
                        <form style="height: 500px"  class="form form-vertical" method="post" action="{{route('student.store')}}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div style="" class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Student Name</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="name" placeholder="Class Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Student Id</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="student_id" placeholder="section">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">E-mail</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="e_mail" placeholder="Class Teacher Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Date of birth</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="dob" placeholder="Number Of Student">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Class</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="class" placeholder="Number Of Student">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Section</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="section" placeholder="Number Of Student">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Roll No.</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="roll_no" placeholder="Number Of Student">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Address</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="address" placeholder="Number Of Student">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Father's name</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="fathers_name" placeholder="Number Of Student">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Mother's name</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="mothers_name" placeholder="Number Of Student">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Contact Number</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="contact_no" placeholder="Number Of Student">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Guardian Contact Number</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="guardian_contact_no" placeholder="Number Of Student">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Image</label>
                                            <input type="file" id="first-name-vertical" class="form-control" name="image">
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

@extends('backend.template.template')
@section('title', 'Table')
@section('main')
    <div class="col-12 mb-1">
        <h2 class="content-header-title float-left mb-0">Brand</h2>
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"> Unit List
                </li>
            </ol>
        </div>
        <div class="col-12 top_btn">
            <div class="btn-group">
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#unit"><span><i class="feather icon-plus"></i>&nbsp; Add New</span></button>
            </div>
        </div>
    </div>
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
                                        <th>Unit Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Regional Director</td>
                                        <td><span class="badge badge-success">Active</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Regional Director</td>
                                        <td><span class="badge badge-danger">Inactive</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Regional Director</td>
                                        <td><span class="badge badge-success">Active</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Regional Director</td>
                                        <td><span class="badge badge-success">Active</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                        </td>
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
        <div class="modal fade text-left" id="unit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Add New Unit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form form-vertical">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Unit Name </label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="category_name" placeholder="Category Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Unit Short Name </label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="category_name" placeholder="EX: KG">
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-vertical">Category Description</label>
                                            <textarea class="form-control" placeholder="Unit Description"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="select">Status</label>
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2">
                                                    <fieldset>
                                                        <label>
                                                            <input type="radio" name="radio" checked>
                                                            Active
                                                        </label>
                                                    </fieldset>
                                                </li>
                                                <li class="d-inline-block mr-2">
                                                    <fieldset>
                                                        <label>
                                                            <input type="radio" name="radio">
                                                            Inactive
                                                        </label>
                                                    </fieldset>
                                                </li>
                                            </ul>
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

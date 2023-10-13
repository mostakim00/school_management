@extends('backend.template.template')
@section('title', 'Table')
@section('main')
    <section class="mb-1">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">List Product</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"> Inventory
                    </li>
                    <li class="breadcrumb-item active"> List Product
                    </li>
                </ol>
            </div>
            <div class="col-12 top_btn">
                <div class="btn-group">
                    <a href="{{route('product.create')}}" class="btn btn-outline-primary"><span><i class="feather icon-plus"></i>&nbsp; Add New</span></a>
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
                                <table class="table table-striped  data-table-with-export">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Product Category </th>
                                        <th>Product Unit </th>
                                        <th>VAT</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Regional Director</td>
                                        <td>Category</td>
                                        <td>KG</td>
                                        <td>10</td>
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
    </section>
@endsection

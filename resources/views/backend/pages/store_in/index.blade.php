@extends('backend.template.template')
@section('title', 'Table')
@section('main')
    @section('top-nav-button')
        <li class="nav-item  d-lg-block"><a href="{{route('store_in.create')}}"  class="btn  btn-primary btn-sm waves-effect waves-light waves-effect waves-light">Add New Store In</a></li>
    @endsection
    @section('top-nav-title')
        <li class="nav-item  d-lg-block">
            <h4 class="block"> List Product Store In</h4>
        </li>
    @endsection
    <section class="mb-1">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">List Product</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"> Inventory
                    </li>
                    <li class="breadcrumb-item active"> List Store In
                    </li>
                </ol>
            </div>
            <div class="col-12 top_btn">
                <div class="btn-group">
                    <a href="{{route('store_in.create')}}" class="btn btn-outline-primary"><span><i class="feather icon-plus"></i>&nbsp;Add New</span></a>
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
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Item</th>
                                        <th>Action</th>
                                    </tr>
                                    {{--<tr>
                                        <th colspan="3"></th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Brand Name</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th></th>
                                    </tr>--}}
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>10 september 2023</td>
                                        <td><span class="badge badge-success">Active</span></td>
                                        <td>
                                            <table class="table">
                                                <thead class="text-primary">
                                                    <tr>
                                                        <th class="w-25">Product Name</th>
                                                        <th>Category</th>
                                                        <th>Brand Name</th>
                                                        <th>Quantity</th>
                                                        <th>Unit</th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    <td>EGG</td>
                                                    <td>Food</td>
                                                    <td>Dashi</td>
                                                    <td>500</td>
                                                    <td>Pice</td>
                                                </tr>
                                                <tr>
                                                    <td>flour</td>
                                                    <td>Food</td>
                                                    <td>Kather Ghani</td>
                                                    <td>200</td>
                                                    <td>L</td>
                                                </tr>
                                                <tr>
                                                    <td>EGG</td>
                                                    <td>Food</td>
                                                    <td>Dashi</td>
                                                    <td>500</td>
                                                    <td>Pice</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>
                                    {{--<tr>
                                        <td>2</td>
                                        <td>9 september 2023</td>
                                        <td><span class="badge badge-success">Active</span></td>
                                        <td>

                                            <table class="table">
                                                <thead class="text-primary">
                                                    <tr>
                                                        <th class="w-25">Product Name</th>
                                                        <th>Category</th>
                                                        <th>Brand Name</th>
                                                        <th>Quantity</th>
                                                        <th>Unit</th>
                                                    </tr>
                                                </thead>
                                               <tbody>
                                               <tr>
                                                   <td>EGG</td>
                                                   <td>Food</td>
                                                   <td>Dashi</td>
                                                   <td>500</td>
                                                   <td>Pice</td>
                                               </tr>
                                               <tr>
                                                   <td>flour</td>
                                                   <td>Food</td>
                                                   <td>Kather Ghani</td>
                                                   <td>200</td>
                                                   <td>L</td>
                                               </tr>
                                               <tr>
                                                   <td>EGG</td>
                                                   <td>Food</td>
                                                   <td>Dashi</td>
                                                   <td>500</td>
                                                   <td>Pice</td>
                                               </tr>
                                               </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>--}}
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

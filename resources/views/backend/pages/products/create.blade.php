@extends('backend.template.template')
@section('title', 'Dashboard')
@section('main')
    <section class="mb-1">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Add New Product</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"> Add New Product
                    </li>
                </ol>
            </div>
            <div class="col-12 top_btn">
                <div class="btn-group">
                    <a href="{{route('product.index')}}" class="btn btn-outline-primary"><span><i class="feather icon-list"></i>&nbsp; List All</span></a>
                </div>
            </div>
        </div>
    </section>
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Category Name</label>
                                                <select class="select2 form-control">
                                                    <option value="">Select One</option>
                                                    <option value="square">Square</option>
                                                    <option value="rectangle">Rectangle</option>
                                                    <option value="rombo">Rombo</option>
                                                    <option value="romboid">Romboid</option>
                                                    <option value="trapeze">Trapeze</option>
                                                    <option value="traible">Triangle</option>
                                                    <option value="polygon">Polygon</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_id">Product Name</label>
                                                <input type="text" id="product_id" class="form-control" name="product_id" placeholder="Product Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Unit</label>
                                                <select class="select2 form-control">
                                                    <option value="">Select One</option>
                                                    <option value="square">Square</option>
                                                    <option value="rectangle">Rectangle</option>
                                                    <option value="rombo">Rombo</option>
                                                    <option value="romboid">Romboid</option>
                                                    <option value="trapeze">Trapeze</option>
                                                    <option value="traible">Triangle</option>
                                                    <option value="polygon">Polygon</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="unit_id">Vat(if any)</label>
                                                <input type="text" id="unit_id" class="form-control" name="vat" placeholder="Vat if any">
                                            </div>
                                            <div class="form-group">
                                                <label for="first-name-vertical">Product Description</label>
                                                <textarea class="form-control" placeholder="Product Description"></textarea>
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
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

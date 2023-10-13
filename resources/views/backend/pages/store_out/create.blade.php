@extends('backend.template.template')
@section('title', 'Dashboard')
@section('main')
    @section('top-nav-button')
        <li class="nav-item  d-lg-block"><a href="{{route('store_out.index')}}"  class="btn  btn-info btn-sm waves-effect waves-light waves-effect waves-light"> List Store Out</a></li>
    @endsection
    @section('top-nav-title')
        <li class="nav-item  d-lg-block">
            <h4 class="block"> Add New Store Out</h4>
        </li>
    @endsection
    <section class="mb-1">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Add New Store Out</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"> Inventory
                    </li>
                    <li class="breadcrumb-item active"> List Store Out
                    </li>
                </ol>
            </div>
            <div class="col-12 top_btn">
                <div class="btn-group">
                    <a href="{{route('store_out.index')}}" class="btn btn-outline-primary"><span><i class="feather icon-list"></i> &nbsp;List All</span></a>
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
                                                <label for="store_out_date">Date</label>
                                                <input type="date" id="date" class="form-control" name="store_out_date">
                                            </div>
                                            <div class="form-group">
                                                <label for="invoice_number">Invoice Number</label>
                                                <input type="text" id="invoice_number" class="form-control" name="invoice_number" placeholder="" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="receiver_employee_name">Receiver Employee Name</label>
                                                <input type="text" id="receiver_employee_name" class="form-control" name="receiver_employee_name" placeholder="Receiver Employee Name">
                                            </div>
                                            <div class="table-responsive mt-2 mb-2">
                                                <table class="table mb-0" id="item_table">
                                                    <thead class="thead-dark text-center">
                                                    <tr>
                                                        <th scope="col" class="w-25">Product Name</th>
                                                        <th scope="col" class="w-25">Brand</th>
                                                        <th scope="col">Product category</th>
                                                        <th scope="col">Unit</th>
                                                        <th scope="col">Unit price</th>
                                                        <th scope="col">Available quantity</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">
                                                            <button class="btn btn-sm btn-info" title="Add New Item" onclick="return false" id="addNewItem"><i class="fa fa-plus"></i></button>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="item">
                                                    {{--  <tr>
                                                          <td>
                                                              <input type="text" id="product_name" class="form-control" name="product_name" placeholder="Product Name">
                                                          </td>
                                                          <td>
                                                              <input type="text" id="brand_name" class="form-control" name="brand_name" placeholder="Brand Name">
                                                          </td>
                                                          <td>
                                                              <input type="text" id="category_name" class="form-control" name="category_name" placeholder="Category Name">
                                                          </td>
                                                          <td>
                                                              <input type="text" id="unit" class="form-control" name="unit" placeholder="EX:KG">
                                                          </td>
                                                          <td>
                                                              <input type="number" id="unit_price" class="form-control" name="unit_price" placeholder="Unit Price Optional">
                                                          </td>
                                                          <td>
                                                              <input type="number" id="quantity" class="form-control" name="quantity" placeholder="Quantity">
                                                          </td>
                                                          <td>
                                                              <input type="number" id="total_price" class="form-control" name="total_price" placeholder="Total Price">
                                                          </td>
                                                          <td>
                                                              <button class="btn  btn-danger"><i class="fa fa-trash"></i></button>
                                                          </td>
                                                      </tr>--}}
                                                    </tbody>
                                                </table>
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
@push('script')
    <script>
        $( document ).ready(function() {
            //add new item
            $('#addNewItem').click(function(){
                appendRow()
                $(".select2").select2({
                    dropdownAutoWidth: true,
                    width: '100%'
                });
            });


            // remove item
            $('#item').on('click', '#deleteItem', function() {
                $(this).closest('tr').remove();
            });



            function appendRow(){
                $('#item').append('<tr>\
                <td>\
                        <select class="select2 form-control">\
                            <option value="">Select One</option>\
                            <option value="square">Square</option>\
                            <option value="rectangle">Rectangle</option>\
                            <option value="rombo">Rombo</option>\
                            <option value="romboid">Romboid</option>\
                            <option value="trapeze">Trapeze</option>\
                            <option value="traible">Triangle</option>\
                            <option value="polygon">Polygon</option>\
                       </select>\
                    </td>\
                <td>\
                    <input type="text" id="brand_name" class="form-control" name="brand_name" placeholder="Brand Name">\
                </td>\
                <td>\
                    <input type="text" id="category_name" class="form-control" name="category_name" placeholder="Category Name">\
                </td>\
                <td>\
                    <input type="text" id="unit" class="form-control" name="unit" placeholder="EX:KG">\
                </td>\
                <td>\
                    <input type="number" id="unit_price" class="form-control" name="unit_price" placeholder="Unit Price Optional">\
                </td>\
                <td>\
                    <input type="number" id="available_quantity" class="form-control" name="available_quantity" placeholder="In Stock" readonly>\
                </td>\
                <td>\
                    <input type="number" id="stock_out_quantity"  class="form-control" name="stock_out_quantity" placeholder="Quantity">\
                </td>\
                <td>\
                    <button class="btn  btn-danger" id="deleteItem" title="Remove This Item" onclick="return false"><i class="fa fa-trash"></i></button>\
                </td>\
            </tr>')
            }
        });
    </script>
@endpush

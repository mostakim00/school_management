<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="">
                    <h2 class="brand-text mb-0">SMS</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{Request::routeIs('dashboard') ? 'active' : ''}} nav-item"><a href="{{route('dashboard')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Dashboard">Dashboard</span></a>
            </li>
           {{--<li class="{{Request::routeIs('blank') ? 'active' : ''}} nav-item"><a href="{{route('blank')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Blank">Blank</span></a>--}}{{--
           </li>--}}{{--
            <li class=" {{Request::routeIs('table') ? 'active' : ''}} nav-item"><a href="{{route('table')}}"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Chat">Table</span></a>
            </li>
            <li class="{{Request::routeIs('forms') ? 'active' : ''}} nav-item"><a href="{{route('forms')}}"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Todo">forms</span></a>
            </li>--}}

            @php

               //Administration Module

               //inventory module
                $product_route = [
                        'product.index',
                        'product.create',
                    ];
                $store_in =[
                    'store_in.index',
                    'store_in.create',
                 ];

                $store_out =[
                    'store_out.index',
                    'store_out.create',
                  ];
                $administration = [
                        'users.index',
                        'users.add_edit',
                        'users.store_update',

                        'activityLog.index',

                        'role-permission.index'
                    ];


                $routeName=\Request::route()->getName();

            @endphp
            @if(auth()->user() && auth()->user()->can('user list view') || auth()->user() && auth()->user()->can('add user') || auth()->user() && auth()->user()->can('update user') )
                <li class=" {{(in_array($routeName,$administration ) !== false ) ? 'open':''}} nav-item"><a href="#"><i class="fab fa-vaadin"></i><span class="menu-title" data-i18n="Menu Levels">Administration</span></a>
                    <ul class="menu-content">
                        @can('user list view')
                            <li class=" {{Request::routeIs('users.index') || Request::routeIs('users.add_edit') || Request::routeIs('users.store_update') ? 'active' : ''}} nav-item"><a href="{{route('users.index')}}"><i class="fa fa-users"></i><span class="menu-title" data-i18n="Brand">Users</span></a>
                            </li>
                        @endcan
                        @can('activity log')
                            <li class=" {{Request::routeIs('activityLog.index') ? 'active' : ''}} nav-item"><a href="{{route('activityLog.index')}}"><i class="feather icon-grid"></i><span class="menu-title" data-i18n="Brand">User Activities</span></a>
                            </li>
                         @endcan
                        <li class=" {{Request::routeIs('role-permission.index') ? 'active' : ''}} nav-item"><a href="{{route('role-permission.index')}}"><i class="fa-solid fa-mars-and-venus-burst"></i><span class="menu-title" data-i18n="Brand">Role & Permissions</span></a>
                        </li>
                    </ul>
                </li>
            @endif


            <li class=" {{(in_array($routeName,$product_route ) !== false ) ? 'open':''}} nav-item"><a href="#"><i class="feather icon-menu"></i><span class="menu-title" data-i18n="Menu Levels">Inventory</span></a>
                <ul class="menu-content">
                    <li class=" {{Request::routeIs('brand.index') ? 'active' : ''}} nav-item"><a href="{{route('brand.index')}}"><i class="feather icon-bold"></i><span class="menu-title" data-i18n="Brand">Brand</span></a>
                    </li>
                    <li class=" {{Request::routeIs('category.index') ? 'active' : ''}} nav-item"><a href="{{route('category.index')}}"><i class="feather icon-grid"></i><span class="menu-title" data-i18n="Brand">Categories</span></a>
                    </li>
                    <li class=" {{Request::routeIs('unit.index') ? 'active' : ''}} nav-item"><a href="{{route('unit.index')}}"><i class="feather icon-sliders"></i><span class="menu-title" data-i18n="Unit's">Unit's</span></a>
                    </li>
                    <li class=" {{(in_array($routeName,$product_route ) !== false ) ? 'open ':''}} nav-item"><a href="#"><i class="feather icon-shopping-bag"></i><span class="menu-title" data-i18n="Products">Products</span></a>
                        <ul class="menu-content">
                            <li class="@if($routeName=='product.index') active @endif"><a href="{{route('product.index')}}"><i class="feather icon-list"></i><span class="menu-item" data-i18n="List Product">List Product</span></a>
                            </li>
                            <li class="@if($routeName=='product.create') active @endif"><a href="{{route('product.create')}}"><i class="feather icon-plus"></i><span class="menu-item" data-i18n="Details">Add New Product</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class=" {{(in_array($routeName,$store_in ) !== false ) ? 'open ':''}} nav-item"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Store In">Store In</span></a>
                        <ul class="menu-content">
                            <li class="@if($routeName=='store_in.index') active @endif"><a href="{{route('store_in.index')}}"><i class="feather icon-list"></i><span class="menu-item" data-i18n="List Store In">List Store In</span></a>
                            </li>
                            <li class="@if($routeName=='store_in.create') active @endif"><a href="{{route('store_in.create')}}"><i class="feather icon-plus"></i><span class="menu-item" data-i18n="Details">Add New </span></a>
                            </li>
                        </ul>
                    </li>
                    <li class=" {{(in_array($routeName,$store_in ) !== false ) ? 'open ':''}} nav-item"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Store In">Store Out</span></a>
                        <ul class="menu-content">
                            <li class="@if($routeName=='store_out.index') active @endif"><a href="{{route('store_out.index')}}"><i class="feather icon-list"></i><span class="menu-item" data-i18n="List Store In">List Store Out</span></a>
                            </li>
                            <li class="@if($routeName=='store_out.create') active @endif"><a href="{{route('store_out.create')}}"><i class="feather icon-plus"></i><span class="menu-item" data-i18n="Details">Add New </span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class=" {{(in_array($routeName,$product_route ) !== false ) ? 'open':''}} nav-item"><a href="#"><i class="feather icon-menu"></i><span class="menu-title" data-i18n="Menu Levels">Classroom</span></a>
                <ul class="menu-content">
                    <li class=" {{Request::routeIs('brand.index') ? 'active' : ''}} nav-item"><a href="{{route('brand.index')}}"><i class="feather icon-bold"></i><span class="menu-title" data-i18n="Brand">Create class</span></a>
                    </li>

                </ul>
        </ul>
    </div>
</div>

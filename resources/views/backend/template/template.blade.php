<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!---------------------BEGIN: Head------------------->
    @include('backend.includes.header')

<!---------------------END: Head---------------------->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

<!--------------------BEGIN: Top bar-------------------->
    @include('backend.includes.topbar')
<!---------------------END: Top bar--------------------->

<!-------------------BEGIN: Main Menu------------------------>
    @include('backend.includes.menu')
<!-- ----------------END: Main Menu-------------------------->


<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            @yield('main')
        </div>
    </div>
</div>
<!-- END: Content-->

{{--<div class="sidenav-overlay"></div>
<div class="drag-target"></div>--}}
<!--------------------BEGIN: Footer---------------------------->
    @include('backend.includes.footer')
<!------------------------END: Footer-------------------------->


<!--------------------BEGIN: Footer---------------------------->
    @include('backend.includes.script')
<!--------------------END: Footer----------------====---------->
</body>
<!-- END: Body-->

</html>

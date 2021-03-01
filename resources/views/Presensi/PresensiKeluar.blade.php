<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
@include('Template.head')
<script src="{{ asset('js/Timer.js')}}"></script>
<style>
    #watch {
        color: rgb(252, 150, 52);
        position: absolute;
        z-index: 1;
        height: 40px;
        width: 700px;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        font-size: 10vw;
        -webkit-text-stroke: 3px rgb(210, 65, 36);
        text-shadow: 4px 4px 10px rgb(210, 65, 36, 0.4), 4px 4px 20px rgb(210, 65, 36, 0.4), 4px 4px 30px rgb(210, 65, 36, 0.4), 4px 4px 40px rgb(210, 65, 36, 0.4);
    }
</style>
<div class="wrapper">

    <!-- Navbar -->
    @include('Template.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('Template.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Halaman Presensi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <p>Presensi Keluar</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('save-keluar') }}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <center>
                                    <label for="" id="clock" style=" font-size: 10vw;
        -webkit-text-stroke: 3px rgb(210, 65, 36);
        text-shadow: 4px 4px 10px rgb(210, 65, 36, 0.4), 4px 4px 20px rgb(210, 65, 36, 0.4), 4px 4px 30px rgb(210, 65, 36, 0.4), 4px 4px 40px rgb(210, 65, 36, 0.4);"> </label>
                            </div>
                            </center>
                            <center>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg">Keluar</button>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->


    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('Template.footer')
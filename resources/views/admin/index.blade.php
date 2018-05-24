@extends('/admin/admin-header')

@section('content')
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{route('admin.member')}}"><i class="fa fa-address-card"></i> Member</a>
                        </li>
                        <li>
                            <a href="{{route('admin.printing')}}"><i class="fa fa-address-card"></i> Printing</a>
                        </li>
                        <li>
                            <a href="{{route('admin.getBannedMember')}}"><i class="fa fa-address-card"></i> Banned Member</a>
                        </li>
                        <li>
                            <a href="{{route('admin.getBannedPrinting')}}"><i class="fa fa-address-card"></i> Banned Printing</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div align="center">
                        <h1><span>Dashboard Admin</span></h1>    
                    </div>
                    
                    @if(Auth()->admin()->status == 1)
                    <div class="col-md-8 col-sm-8 col-lg-4">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-success"><i class="fa fa-money" aria-hidden="true"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{count($trx_bayars)}}</h3>
                                <a href="{{route('admin.getTransaksi')}}"><span>Transaksi Menunggu Konfirmasi</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-lg-4">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-info"><i class="fa fa-user-o" aria-hidden="true"></i></span></a>
                            <div class="dash-widget-info">
                                <h3>{{count($printings)}}</h3>
                                <a href=""><span>Printing Baru Menunggu Konfirmasi</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-lg-4">
                        <div class="dash-widget dash-widget5">
                            <a href="#"><span class="dash-widget-icon bg-info"><i class="fa fa-user-o" aria-hidden="true"></i></span></a>
                            <div class="dash-widget-info">
                                <h3>{{count($admins)}}</h3>
                                <a href=""><span>Admin baru Belum Dikonfirmasi</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-8 col-lg-4">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-info"><i class="fa fa-user-o" aria-hidden="true"></i></span></a>
                            <div class="dash-widget-info">
                                <h3>{{count($printings_aktif)}}</h3>
                                <a href="{{route('admin.printing')}}"><span>Printing Aktif</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-lg-4">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-info"><i class="fa fa-user-o" aria-hidden="true"></i></span></a>
                            <div class="dash-widget-info">
                                <h3>{{count($users_aktif)}}</h3>
                                <a href="{{route('admin.member')}}"><span>Member Aktif</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-lg-4">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-info"><i class="fa fa-user-o" aria-hidden="true"></i></span></a>
                            <div class="dash-widget-info">
                                <h3>{{count($printings_banned)}}</h3>
                                <a href="{{route('admin.getBannedPrinting')}}"><span>Printing Terbanned</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-lg-4">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-info"><i class="fa fa-user-o" aria-hidden="true"></i></span></a>
                            <div class="dash-widget-info">
                                <h3>{{count($users_banned)}}</h3>
                                <a href="{{route('admin.getBannedMember')}}"><span>User Terbanned</span></a>
                            </div>
                        </div>
                    </div>

                    @else
                    <h4>Akun Anda Belum Dikonfirmasi. Silahkan Ajukan pada Admin berwenang.</h4>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-success"><i class="fa fa-money" aria-hidden="true"></i></span></a>
                            <div class="dash-widget-info">
                                <h3>{{count($trx_bayars)}}</h3>
                                <span>Transaksi Menunggu Konfirmasi</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-info"><i class="fa fa-user-o" aria-hidden="true"></i></span></a>
                            <div class="dash-widget-info">
                                <h3>{{count($printings)}}</h3>
                                <span>Printing Baru Menunggu Konfirmasi</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-info"><i class="fa fa-user-o" aria-hidden="true"></i></span></a>
                            <div class="dash-widget-info">
                                <h3>{{count($admins)}}</h3>
                                <span>Admin baru Belum Dikonfirmasi</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-danger"><i class="fa fa-tasks" aria-hidden="true"></i></span></a>
                            <div class="dash-widget-info">
                                <h3>618</h3>
                                <span>Tasks</span>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
@endsection
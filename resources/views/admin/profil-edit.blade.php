@extends('/admin/admin-header')

@section('content')
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li>
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
                <div class="row" style="background-color: #FFF ; padding: 5%">
                    <div align="center">
                        <h1><span>Edit Profile Admin</span></h1>    
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><span>Data Diri</span></h3>
                        <h4>
                        <div class="col-md-12">
                            <ul class="personal-info">
                                <form method="post" action="{{route('admin.update')}}">
                                    @csrf
                                    <li>
                                        <span class="title">Nama:</span>
                                        <span class="text">
                                            @if(isset($admin->nama))
                                            <input type="text" name="nama" value="{{$admin->nama}}" required>
                                            
                                            @else
                                            <input type="text" name="nama" placeholder="Lengkapi Data Anda." required>
                                            
                                            @endif</span>
                                    </li>

                                    <li>
                                        <span class="title">Email:</span>
                                        <span class="text">{{$admin->email}}</span>
                                    </li>

                                    <li>
                                        <span class="title">Username:</span>
                                        <span class="text">{{$admin->username}}</span>
                                    </li>
                                    <li>
                                        <input type="submit" class="btn btn-success" value="Update">
                                    </li>
                                </form>
                            </ul>
                        </div>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
@endsection
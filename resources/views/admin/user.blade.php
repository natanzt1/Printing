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
                        <li>
                            <a href="{{route('admin.getHistoryTrx')}}"><i class="fa fa-address-card"></i> History Transaksi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div align="center">
                        <h1><span>{{$title}}</span></h1>    
                    </div>
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->nama}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->username}}</td>
                                @if($user->status==0)
                                <td>Belum Konfirmasi</td>
                                <td><a href="{{route('admin.restore-member', $user->id)}}" title="Edit"><i class="fa fa-pencil m-r-5"></i> Aktifkan</a></td>
                                @elseif($user->status==1)
                                <td>Aktif</td>
                                <td><a href="{{route('admin.banned-member', $user->id)}}" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Banned</a></td>
                                @elseif($user->status==2)
                                <td>Terbanned</td>
                                <td><a href="{{route('admin.restore-member', $user->id)}}" title="Edit"><i class="fa fa-pencil m-r-5"></i> Aktifkan</a></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
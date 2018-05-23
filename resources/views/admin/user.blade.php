<!DOCTYPE html>
<html>


<!-- Mirrored from dreamguys.co.in/preadmin/orange/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 May 2018 15:42:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Preadmin - Bootstrap Admin Template</title>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/fullcalendar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/plugins/morris/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/style.css') }}">


    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="page-title-box pull-left">
                <h3>CetakCetak</h3>
            </div>
            <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <ul class="nav navbar-nav navbar-right user-menu pull-right">
                <li class="dropdown hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge bg-primary pull-right">200</span></a>
                </li>
                <li class="dropdown hidden-xs">
                    <a href="javascript:;" id="open_msg_box" class="hasnotifications"><i class="fa fa-comment-o"></i> <span class="badge bg-primary pull-right">1000</span></a>
                </li>
                <li class="dropdown">
                    <a href="profile.html" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin">
                        <span class="user-img"><img class="img-circle" src="{{URL::asset('admin/img/user.jpg')}}" width="40" alt="Admin">
							<span class="status online"></span></span>
                        @if(empty(Auth()->admin()->nama))
                            <span>Admin</span>
                        @else
                            <span>{{Auth()->admin()->nama}}</span>
                        @endif
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.html">My Profile</a></li>
                        <li><a href="edit-profile.html">Edit Profile</a></li>
                        <li><a href="{{route('admin.logout')}}">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="profile.html">My Profile</a></li>
                    <li><a href="edit-profile.html">Edit Profile</a></li>
                    <li><a href="{{route('admin.logout')}}">Logout</a></li>
                </ul>
            </div>
        </div>
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
                <div class="row">
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
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script type="text/javascript" src="{{ URL::asset('admin/js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/js/jquery.slimscroll.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/morris/morris.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/raphael/raphael-min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/js/app.js') }}"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js
"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap4.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>


<!-- Mirrored from dreamguys.co.in/preadmin/orange/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 May 2018 15:42:26 GMT -->
</html>
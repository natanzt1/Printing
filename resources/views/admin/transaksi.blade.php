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
                <div class="row">
                    <div align="center">
                        <h1><span>Transaksi Menunggu Konfirmasi Pembayaran</span></h1>    
                    </div>
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Nama Printing</th>
                                <th>Tanggal Order</th>
                                <th>Bukti Pembayaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trx_bayars as $trx)
                            <tr>
                                <td>{{$trx->user->nama}}</td>
                                <td>{{$trx->printing->nama}}</td>
                                <td>{{$trx->tgl_order}}</td>
                                <td>{{$trx->bukti_pembayaran}}</td>
                                <td>
                                    <li>
                                        <a href="{{route('admin.konfirmasiTrx', $trx->id)}}" title="konfirmasi"><i class="fa fa-pencil m-r-5"></i> Konfirmasi</a>    
                                    </li>
                                    <li>
                                        <a href="{{route('admin.tolakTrx', $trx->id)}}" title="tolak"><i class="fa fa-trash-o m-r-5"></i> Tolak</a>        
                                    </li>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
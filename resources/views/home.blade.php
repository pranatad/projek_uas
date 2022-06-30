@extends('layouts.app')

@section('menu')

<ul class="pcoded-item pcoded-left-item">
    <li class="active">
        <a href="{{ route('home') }}">
            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
            <span class="pcoded-mtext">Dashboard</span>
        </a>
    </li>
    @if (Auth::user()->role == 0)
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                <span class="pcoded-mtext">Master</span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="{{ route('user') }}">
                        <span class="pcoded-mtext">User</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('jenis') }}">
                        <span class="pcoded-mtext">Jenis Barang</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('satuan') }}">
                        <span class="pcoded-mtext">Satuan Barang</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('supplier') }}">
                        <span class="pcoded-mtext">Supplier</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('barang') }}">
                        <span class="pcoded-mtext">Barang</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if (Auth::user()->role == 2)
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                <span class="pcoded-mtext">Transaksi</span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="{{ route('pembelian') }}">
                        <span class="pcoded-mtext">Pembelian</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('penjualan') }}">
                        <span class="pcoded-mtext">Penjualan</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    @if (Auth::user()->role == 1 || Auth::user()->role == 0)
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file-minus"></i></span>
                <span class="pcoded-mtext">Laporan</span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="{{ route('report-stok-barang') }}">
                        <span class="pcoded-mtext">Stok Barang</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('report-pembelian') }}">
                        <span class="pcoded-mtext">Pembelian</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('report-penjualan') }}">
                        <span class="pcoded-mtext">Penjualan</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif
</ul>

@endsection

@section('content')

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="alert border-success">
                                <div class="text-center">
                                    <strong>Selamat Datang</strong> di SUPER INVENTORY
                                </div>
                            </div>
                        </div>
                        <!-- task, page, download counter  start -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-yellow update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            <h4 class="text-white">{{ $supplier }}</h4>
                                            <h6 class="text-white m-b-0">Supplier</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-1" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>List Nama Supplier</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-green update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            <h4 class="text-white">{{ $barang }}</h4>
                                            <h6 class="text-white m-b-0">Barang</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-2" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>List Barang</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-pink update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            <h4 class="text-white">{{ $penjualan }}</h4>
                                            <h6 class="text-white m-b-0">Penjualan</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-3" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>Detail Penjualan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-lite-green update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            <h4 class="text-white">{{ $pembelian }}</h4> 
                                            <h6 class="text-white m-b-0">Pembelian</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-4" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>Detail Pembelian</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

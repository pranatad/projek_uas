@extends('layouts.app')

@section('menu')

<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('home') }}">
            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
            <span class="pcoded-mtext">Dashboard</span>
        </a>
    </li>
    <li class="pcoded-hasmenu active pcoded-trigger">
        <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
            <span class="pcoded-mtext">Master</span>
        </a>
        <ul class="pcoded-submenu">
            <li class="">
                <a href="{{ route('user') }}">
                    <span class="pcoded-mtext">User</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('jenis') }}">
                    <span class="pcoded-mtext">Jenis Barang</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('satuan') }}">
                    <span class="pcoded-mtext">Satuan Barang</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('supplier') }}">
                    <span class="pcoded-mtext">Supplier</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('barang') }}">
                    <span class="pcoded-mtext">Barang</span>
                </a>
            </li>
        </ul>
    </li>
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
</ul>

@endsection

@section('content')

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Data Barang</h4>
                                    <span>Halaman ini digunakan untuk mengelola barang data.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="#"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Master</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Barang</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row justify-content-end">
                                        <div class="col-lg-6">
                                            @if (session('success-message'))
                                                <div class="alert alert-success border-success">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>
                                                    <strong>Success!</strong> {{ session('success-message') }}
                                                </div>
                                            @elseif (session('failed-message'))
                                                <div class="alert alert-warning border-warning">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <i class="icofont icofont-close-line-circled"></i>
                                                    </button>
                                                    <strong>Error!</strong> {{ session('failed-message') }} : {{ $errors->content->first() }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <button class="btn btn-mat btn-sm btn-inverse" data-toggle="modal" data-target="#myModal">Tambah Barang</button>
                                    <a class="btn btn-mat btn-sm btn-success" href="{{ route('reportbarang') }}" target="__blank">Laporan Barang</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" width="100%" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    {{-- <th style="text-align: center;">No</th> --}}
                                                    <th>Kode</th>
                                                    <th>Nama</th>
                                                    <th>Jenis</th>
                                                    <th>Stok</th>
                                                    <th>Harga Beli</th>
                                                    <th>Harga Jual</th>
                                                    <th>Gambar</th>
                                                    <th>Aksi</th>
                                            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($barang as $number => $data)
                                                    <tr>
                                                        {{-- <td width="8%">{{ ++$number }}</td> --}}
                                                        <td>{{ $data->kode }}</td>
                                                        <td>{{ $data->namabarang }}</td>
                                                        <td>{{ $data->namajenis }}</td>
                                                        <td>{{ $data->stok }} {{ $data->namasatuan }}</td>
                                                        <td>@currency($data->hargabeli)</td>
                                                        <td>@currency($data->hargajual)</td>
                                                        <td>
                                                        <center>
                                                        <img src="{{ asset('storage/' . $data->image) }}" width="100">
                                                        </center>
                                                        </td>
                                                        <td class="text-center">
                                                            <button class="btn btn-inverse btn-mini" data-toggle="modal"
                                                                data-target="#editModal{{ $data->kode }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                                    fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                                </svg>
                                                            </button>
                                                            <button class="btn btn-inverse btn-mini" data-toggle="modal"
                                                                data-target="#deleteModal{{ $data->kode }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                </svg>
                                                            </button>
                                                            <button class="btn btn-success btn-mini" data-toggle="modal"
                                                                data-target="#detailModal{{ $data->kode }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('savebarang') }}" method="post" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="myModalLabel">Add barang</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Kode Barang</label>
                            <div class="form-group">
                                <input type="text" name="kode" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Nama Barang</label>
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Jenis Barang</label>
                            <div class="form-group">
                                <select class="form-control" name="jenis" required>
                                    @foreach ($jenis as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Satuan Barang</label>
                            <div class="form-group">
                                <select class="form-control" name="satuan" required>
                                    @foreach ($satuan as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Stok Barang</label>
                            <div class="form-group">
                                <input type="text" name="stok" onkeypress="return onlyNumber(event)" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Harga Beli</label>
                            <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" name="hargabeli" onkeypress="return onlyNumber(event)" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Harga Jual</label>
                            <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" name="hargajual" onkeypress="return onlyNumber(event)" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Biaya Pesan</label>
                            <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" name="biayapesan" onkeypress="return onlyNumber(event)" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Biaya Simpan</label>
                            <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" name="biayasimpan" onkeypress="return onlyNumber(event)" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Waktu Tunggu (/Jam)</label>
                            <div class="form-group">
                                <input type="text" name="leadtime" onkeypress="return onlyNumber(event)" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="col align-self-center">
                            <label for="image">Input Gambar</label>
                            <div class="form-group">
                                <input type="file" class="form-control" name="image"></br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-inverse btn-sm">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>

@foreach ($barang as $data)
    <form action="{{ route('updatebarang') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="modal made" tabindex="-1" id="editModal{{ $data->kode }}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Update barang</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <label>Kode Barang</label>
                                <div class="form-group">
                                    <input type="text" name="kode" readonly value="{{ $data->kode }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <label>Nama Barang</label>
                                <div class="form-group">
                                    <input type="text" name="nama" value="{{ $data->namabarang }}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <label>Jenis Barang</label>
                                <div class="form-group">
                                    <select class="form-control" name="jenis" required>
                                        @foreach ($jenis as $datajenis)
                                            @if ($datajenis->id == $data->jenis)
                                                <option selected value="{{ $datajenis->id }}">{{ $datajenis->nama }}</option>
                                            @else
                                                <option value="{{ $datajenis->id }}">{{ $datajenis->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <label>Satuan Barang</label>
                                <div class="form-group">
                                    <select class="form-control" name="satuan" required>
                                        @foreach ($satuan as $datasatuan)
                                            @if ($datasatuan->id == $data->satuan)
                                                <option selected value="{{ $datasatuan->id }}">{{ $datasatuan->nama }}</option>
                                            @else
                                                <option value="{{ $datasatuan->id }}">{{ $datasatuan->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <label>Stok Barang</label>
                                <div class="form-group">
                                    <input type="text" name="stok" value="{{ $data->stok }}" onkeypress="return onlyNumber(event)" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <label>Harga Beli</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp</span>
                                    <input type="text" name="hargabeli" value="{{ $data->hargabeli }}" onkeypress="return onlyNumber(event)" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <label>Harga Jual</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp</span>
                                    <input type="text" name="hargajual" value="{{ $data->hargajual }}" onkeypress="return onlyNumber(event)" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <label>Biaya Pesan</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp</span>
                                    <input type="text" name="biayapesan" value="{{ $data->biayapesan }}" onkeypress="return onlyNumber(event)" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <label>Biaya Simpan</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp</span>
                                    <input type="text" name="biayasimpan" value="{{ $data->biayasimpan }}" onkeypress="return onlyNumber(event)" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <label>Waktu Tunggu (/Jam)</label>
                                <div class="form-group">
                                    <input type="text" name="leadtime" value="{{ $data->leadtime }}" onkeypress="return onlyNumber(event)" class="form-control" required>
                                </div>
                            </div>
                            <div class="col align-self-center">
                            <label for="image">Input Gambar</label>
                            <div class="form-group">
                                <input type="file" class="form-control" name="image"></br>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-inverse btn-sm">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('deletebarang') }}" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal" tabindex="-1" id="deleteModal{{ $data->kode }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Delete barang</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="kode" required value="{{ $data->kode }}" />
                        <h6>Are you sure you delete this data?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-inverse btn-sm">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal made" tabindex="-1" id="detailModal{{ $data->kode }}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Detail barang</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5">
                            <h6>Kode Barang</h6> <br>
                            <h6>Nama Barang</h6> <br>
                            <h6>Jenis</h6> <br>
                            <h6>Satuan</h6> <br>
                            <h6>Stok</h6> <br>
                            <h6>Harga Beli</h6> <br>
                            <h6>Harga Jual</h6> <br>
                            <h6>Biaya Pesan</h6> <br>
                            <h6>Biaya Simpan</h6> <br>
                            <h6>Waktu Tunggu (/Jam)</h6> <br>
                            <h6>Gambar</h6> <br>
                        </div>
                        <div class="col-7">
                            <h6 class="font-weight-bold">{{ $data->kode }}</h6> <br>
                            <h6 class="font-weight-bold">{{ $data->namabarang }}</h6> <br>
                            <h6 class="font-weight-bold">{{ $data->namajenis }}</h6> <br>
                            <h6 class="font-weight-bold">{{ $data->namasatuan }}</h6> <br>
                            <h6 class="font-weight-bold">{{ $data->stok }}</h6> <br>
                            <h6 class="font-weight-bold">@currency($data->hargabeli)</h6> <br>
                            <h6 class="font-weight-bold">@currency($data->hargajual)</h6> <br>
                            <h6 class="font-weight-bold">@currency($data->biayapesan)</h6> <br>
                            <h6 class="font-weight-bold">@currency($data->biayasimpan)</h6> <br>
                            <h6 class="font-weight-bold">{{ $data->leadtime }}</h6> <br>
                            <td>
                            <img src="{{ asset('storage/' . $data->image) }}" width="100">
                            </td>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    function onlyNumber(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>

@endsection
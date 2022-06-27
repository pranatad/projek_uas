@extends('layouts.app')

@section('menu')

<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('home') }}">
            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
            <span class="pcoded-mtext">Dashboard</span>
        </a>
    </li>
    <li class="pcoded-hasmenu">
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
            <li class="">
                <a href="{{ route('barang') }}">
                    <span class="pcoded-mtext">Barang</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="pcoded-hasmenu active pcoded-trigger">
        <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
            <span class="pcoded-mtext">Transaksi</span>
        </a>
        <ul class="pcoded-submenu">
            <li class="">
                <a href="{{ route('pembelian') }}">
                    <span class="pcoded-mtext">Pembelian</span>
                </a>
            </li>
            <li class="active">
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
                                    <h4>Form Penjualan</h4>
                                    <span>Halaman ini digunakan untuk mengelola form penjualan.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Transaksi</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('penjualan') }}">Penjualan</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Tambah</a>
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
                                {{-- <div class="card-header">
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
                                </div> --}}
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>No. Faktur</label>
                                            <div class="form-group">
                                                <input type="text" value="{{ $faktur }}" readonly name="faktur" class="form-control faktur" placeholder="No. Faktur" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Tanggal</label>
                                            <div class="form-group">
                                                <input type="date" value="{{ $datenow }}" name="tanggal" class="form-control tanggal" placeholder="Tanggal Masuk" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label>Kode Barang</label>
                                            <div class="input-group">
                                                <input type="text" readonly name="kodebarang" class="form-control kodebarang" placeholder="Kode Barang" required>
                                                <span data-toggle="modal" data-target="#modalBarang" class="input-group-addon" id="caribarang"><i class="feather icon-search"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Nama Barang</label>
                                            <div class="form-group">
                                                <input type="text" readonly name="namabarang" class="form-control namabarang" placeholder="Nama Barang" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Harga</label>
                                            <div class="input-group">
                                                <input type="hidden" name="stok" id="stok" class="stok">
                                                <span class="input-group-addon">Rp</span>
                                                <input type="text" readonly name="hargabarang" class="form-control hargabarang" placeholder="0" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label>Qty</label>
                                            <div class="form-group">
                                                <input type="text" name="qty" class="form-control qty" placeholder="Qty" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <button onclick="simpan()" class="btn btn-inverse btn-sm" style="margin-top: 28px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="coba" id="coba">
                                    </div>
                                    <br>
                                    <div class="row justify-content-end">
                                        <div class="col-lg-3">
                                            <label for="">Total Item :</label>
                                            <input type="text" readonly class="form-control totalitem"></input>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-lg-3">
                                            <label for="">Total Bayar :</label>
                                            <input type="text" readonly class="form-control totalbayar"></input>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row justify-content-end">
                                        <div class="col-lg-3">
                                            <button type="button" onclick="window.location='{{ route('pembelian') }}'" class="btn btn-default btn-sm">
                                                Kembali
                                            </button>
                                            <button class="btn btn-inverse btn-sm" onclick="simpanTransaksi()">
                                                Simpan & Cetak Faktur
                                            </button>
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
</div>

{{-- Modal supplier --}}
<div class="modal fade" id="modalSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="myModalLabel">Cari supplier</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletablemodal" width="100%" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th>Nama</th>
                                <th>No. Telp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplier as $number => $data)
                                <tr>
                                    <td width="8%">{{ ++$number }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->notelp }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-inverse btn-mini btn-pilihsupplier" data-id="{{ $data->id }}" data-nama="{{ $data->nama }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal barang --}}
<div class="modal fade" id="modalBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="myModalLabel">Cari barang</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletablemodaltwo" width="100%" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                {{-- <th style="text-align: center;">No</th> --}}
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th>Harga Jual</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $number => $data)
                                <tr>
                                    <td>{{ $data->kode }}</td>
                                    <td>{{ $data->namabarang }}</td>
                                    <td>{{ $data->stok }} {{ $data->namasatuan }}</td>
                                    <td>@currency($data->hargajual)</td>
                                    <td class="text-center">
                                        <button class="btn btn-inverse btn-mini btn-pilihbarang" data-kode="{{ $data->kode }}" data-nama="{{ $data->namabarang }}" data-harga="{{ $data->hargajual }}" data-stok="{{ $data->stok }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('bower_components') }}\jquery\js\jquery.min.js"></script>
<script>
    $('.btn-pilihsupplier').on('click', function() {
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        $('.idsupplier').val(id);
        $('.namasupplier').val(nama);
        $('#modalSupplier').modal('hide');
    });

    $('.btn-pilihbarang').on('click', function() {
        const kode = $(this).data('kode');
        const nama = $(this).data('nama');
        const harga = $(this).data('harga');
        const stok = $(this).data('stok');
        $('.kodebarang').val(kode);
        $('.namabarang').val(nama);
        $('.hargabarang').val(harga);
        $('.stok').val(stok);
        $('.qty').val('1');
        $('#modalBarang').modal('hide');
    });
</script>

<script>
    let totalharga = 0;
    let qty = 0;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    function dataDetail() {
        let faktur = $('.faktur').val();

        $.ajax({
            type: "POST",
            url: "/penjualan/table-detail",
            data: {
                faktur: faktur
            },
            beforeSend: function(f) {
                $('#coba').html(`<div class="text-center">
                Mencari data...
                </div>`);
            },
            success: function (response) {
                $('#coba').html(response);
            },
            error: function (xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }

    function hitungTotal() {
        let hargabarang = $('.hargabarang').val()
        let quantity = $('.qty').val()

        let hargaxqty = hargabarang * quantity

        totalharga = parseInt(totalharga) + parseInt(hargaxqty)
        qty = parseInt(qty) + parseInt(quantity)

        $('.totalitem').val(qty);
        $('.totalbayar').val(totalharga);
    }

    function hitungTotalHapus(quantity, jumlah) {
        totalharga = parseInt(totalharga) - parseInt(jumlah)
        qty = parseInt(qty) - parseInt(quantity)

        $('.totalitem').val(qty);
        $('.totalbayar').val(totalharga);
    }

    function simpan() {
        let faktur = $('.faktur').val()
        let kodebarang = $('.kodebarang').val()
        let hargabarang = $('.hargabarang').val()
        let stok = $('.stok').val()
        let qty = $('.qty').val()
        let jumlah = qty * hargabarang
        
        if (kodebarang.length == 0) {
            alert('Kode Barang tidak boleh kosong')
        } else if (qty.length == 0) {
            alert('QTY tidak boleh kosong')
        } else if (qty == 0) {
            alert('QTY tidak boleh kurang dari 1')
        } else {
            $.ajax({
                url: "/penjualan/save-detail",
                type: "POST",
                data: {
                    faktur: faktur,
                    kodebarang: kodebarang,
                    qty: qty,
                    jumlah: jumlah,
                    stok: stok
                },
                success: function(data) {
                    dataDetail();
                    hitungTotal();
                    $('.kodebarang').val('');
                    $('.hargabarang').val('');
                    $('.namabarang').val('');
                    $('.qty').val('');
                },
                error: function (xhr, ajaxOption, thrownError) {
                    alert(xhr.status + '\n' + thrownError)
                }
            });
        }
    }

    function simpanTransaksi() {
        let faktur = $('.faktur').val()
        let tanggal = $('.tanggal').val()
        let totalitem = $('.totalitem').val()
        let totalbayar = $('.totalbayar').val()
        
        $.ajax({
            url: "/penjualan/save-transaction",
            type: "POST",
            data: {
                faktur: faktur,
                tanggal: tanggal,
                totalitem: totalitem,
                totalbayar: totalbayar,
            },
            success: function(data) {
                cetakFaktur(faktur);
                window.location = "/penjualan";
            },
            error: function (xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }

    function cetakFaktur(faktur) {
        let nofaktur = faktur;
        window.open("/penjualan/faktur/" + nofaktur, "_blank");
    }

    $(document).ready(function () {
        dataDetail();
    });

</script>

@endsection
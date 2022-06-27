<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Stok Barang</title>
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/auth/logo.png">
    <style type="text/css">
        .head {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        .body {
            border-collapse: collapse;
            border: 1px;
            border-color: black;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        table tr td {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <center>
        <table class="head" width="625">
            <tr>
                <td><img src="{{ asset('assets') }}/images/auth/logo.png" width="90" height="90"></td>
                <td>
                    <center>
                        <!-- <font size="4">TOKO 73</font><br> -->
                        <font size="5"><b>SUPER INVENTORY</b></font><br>
                        <font size="2">Alamat : Kota Malang, Jawa Timur</font><br>
                        <font size="2"><i>Email : supertory@gmail.com Telp./Fax 0812-3456-7890</i></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <table width="625" class="head">
                <tr>
                    <td class="text2">Malang, <?= date("d M Y"); ?></td>
                </tr>
            </table>
        </table>
        <table class="head" style="margin-bottom: 20px;">
            <tr>
                <td>Laporan Data Stok Barang</td>
            </tr>
        </table>
        <table border="1" class="body" width="700">
            <thead>
                <tr style="height: 25px;">
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Stok</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Ket</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stokbarang as $number => $data)
                    <tr style="height: 20px; text-align: center;">
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->namabarang }}</td>
                        <td>{{ $data->namajenis }}</td>
                        <td>{{ $data->stok }} {{ $data->namasatuan }}</td>
                        <td>@currency($data->hargabeli)</td>
                        <td>@currency($data->hargajual)</td>
                        <td>
                            @if ($data->stok == 0)
                                Stok Habis
                            @elseif ($data->stok <= 40)
                                Mulai Menipis
                            @elseif ($data->stok > 40)
                                Tersedia
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
</body>

<script>
    window.print();
</script>

</html>
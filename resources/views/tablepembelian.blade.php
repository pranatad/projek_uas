<div class="dt-responsive table-responsive">
    <table id="simpletable" width="100%" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
                {{-- <th style="text-align: center;">No</th> --}}
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail as $number => $data)
                <tr>
                    {{-- <td width="8%">{{ ++$number }}</td> --}}
                    <td>{{ $data->kodebarang }}</td>
                    <td>{{ $data->namabarang }}</td>
                    <td>{{ $data->hargabeli }}</td>
                    <td>{{ $data->qty }}</td>
                    <td>@currency($data->jumlah)</td>
                    <td class="text-center">
                        <button class="btn btn-inverse btn-mini" onclick="hapus({{ $data->id }}, {{ $data->qty }}, {{ $data->jumlah }}, {{ $data->stok }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $('#simpletable').DataTable({
        responsive: true
    });
</script>

<script>
    function hapus(id, quantity, jumlah, stok) {
        $.ajax({
            url: "/pembelian/delete-detail",
            type: "POST",
            data: {
                id: id,
                stok: stok,
                qty: quantity,
            },
            success: function(data) {
                dataDetail();
                hitungTotalHapus(quantity, jumlah);
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
</script>
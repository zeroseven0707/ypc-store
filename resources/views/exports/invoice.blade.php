<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">Kode INV</th>
            <th scope="col">Pembeli</th>
            <th scope="col">Penjual</th>
            <th scope="col">Produk</th>
            <th scope="col">Tipe Pembayaran</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pesanan as $item)
        <tr>
            <th scope="row">{{ $item->kode_inv }}</th>
            <th scope="row">{{ $item->member->nama }}</th>
            <th scope="row">{{ $item->produk->toko->nama_toko }}</th>
            <th scope="row">{{ $item->produk->nmproduk }}</th>
            <th scope="row">{{ $item->tipepembayaran }}</th>
            <th scope="row">{{ $item->jmlpesanan }}</th>
            <th scope="row">{{ $item->harga }}</th>
        </tr>
        @endforeach
    </tbody>
</table>
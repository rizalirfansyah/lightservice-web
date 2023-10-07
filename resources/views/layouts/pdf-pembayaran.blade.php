<html>
<head>
    <style>
    body {
        font-family: sans-serif;
        font-size: 10pt;
    }

    /*design table 1*/
.table1 {
    font-family: sans-serif;
    color: #232323;
    border-collapse: collapse;
}
 
.table1, th, td {
    border: 1px solid #999;
    padding: 8px 20px;
}
    </style>
</head>

<body>
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
        <tr>
            <h2 width="100%" style="text-align: center; font-size: 20px; font-weight: bold;">
              Light Service - Pendapatan
            </h2>
        </tr>
    </table>
    <br>
   
    <br>
    <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
        <thead>
            <tr>
                <td width="5%" style="text-align: center;"><strong>No</strong></td>
                <td width="25%" style="text-align: left;"><strong>Nama Pelanggan</strong></td>
                <td width="40%" style="text-align: left;"><strong>Nomor Servis</strong></td>
                <td width="25%" style="text-align: left;"><strong>Tanggal Masuk</strong></td>
                <td width="25%" style="text-align: left;"><strong>Tanggal Ambil</strong></td>
                <td width="45%" style="text-align: left;"><strong>Jenis Gadget</strong></td>
                <td width="40%" style="text-align: left;"><strong>Tipe Gadget</strong></td>
                <td width="40%" style="text-align: left;"><strong>Biaya</strong></td>
            </tr>
        </thead>

        <tbody>
            <!-- ITEMS HERE -->
            
                @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="padding: 0px 5px; line-height: 20px;">{{ $transaksi->repair->pelanggan->nama_pelanggan }}</td>
                    <td style="padding: 0px 5px; line-height: 20px;">{{ $transaksi->repair->nomor_servis }}</td>
                    <td style="padding: 0px 5px; line-height: 20px;">{{ $transaksi->repair->tanggal_masuk }}</td>
                    <td style="padding: 0px 5px; line-height: 20px;">{{ $transaksi->updated_at }}</td>
                    <td style="padding: 0px 5px; line-height: 20px;">{{ $transaksi->repair->jenis_gadget }}</td>
                    <td style="padding: 0px 5px; line-height: 20px;">{{ $transaksi->repair->tipe_gadget }}</td>
                    <td style="padding: 0px 5px; line-height: 20px;">Rp. {{ number_format($transaksi->harga, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            
        </tbody>

        <tfoot>
            <td class="padding: 0px 5px;" style="border:none;"></td>
            <td class="padding: 0px 5px;" style="border:none;"></td>
            <td class="padding: 0px 5px;" style="border:none;"></td>
            <td class="padding: 0px 5px;" style="border:none;"></td>
            <td class="padding: 0px 5px;" style="border:none;"></td>
            <td class="padding: 0px 5px;" style="border:none;"></td>
            <td class="padding: 0px 5px;" style="text-align: left;">Total</td>
            <td class="padding: 0px 5px;" style="text-align: left;">Rp. {{  number_format($total_transaksi, 0, ',', '.')  }}</td>
        </tfoot>
    </table>

</body>
</html>


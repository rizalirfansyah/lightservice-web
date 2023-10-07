<html>
<head>
    <style>
    body {
        font-family: sans-serif;
        font-size: 10pt;
    }

    p {
        margin: 0pt;
    }

    table.items {
        border: 0.1mm solid #e7e7e7;
    }

    td {
        vertical-align: top;
    }

    .items td {
        border-left: 0.1mm solid #e7e7e7;
        border-right: 0.1mm solid #e7e7e7;
    }

    table thead td {
        text-align: center;
        border: 0.1mm solid #e7e7e7;
    }

    .items td.blanktotal {
        background-color: #EEEEEE;
        border: 0.1mm solid #e7e7e7;
        background-color: #FFFFFF;
        border: 0mm none #e7e7e7;
        border-top: 0.1mm solid #e7e7e7;
        border-right: 0.1mm solid #e7e7e7;
    }

    .items td.totals {
        text-align: right;
        border: 0.1mm solid #e7e7e7;
    }

    .items td.cost {
        text-align: "."center;
    }
    </style>
</head>

<body>
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
        <tr>
            <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;">
              Light Service
            </td>
        </tr>
        <tr>
          <td height="10" style="font-size: 0px; line-height: 10px; height: 10px; padding: 0px;">&nbsp;</td>
        </tr>
    </table>
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
        <tr>
            <td width="49%" style="border: 0.1mm solid #eee;">Nama : {{ $repair->pelanggan->nama_pelanggan }}<br>Nomor Servis : {{ $repair->nomor_servis }}<br>Alamat : {{ $repair->pelanggan->alamat }}<br>No telp : {{ $repair->pelanggan->notelp }}<br>Tanggal terima : {{ $repair->tanggal_masuk }}
            </td>
            <td width="2%">&nbsp;</td>
            <td width="49%" style="border: 0.1mm solid #eee; text-align: right;"><strong>Light Service</strong><br>Jl. Krukah Selatan No.106,<br> Ngagelrejo, Kec. Wonokromo, Surabaya,<br>Jawa Timur 60245<br><br><strong>Telephone:</strong> +62 82336646156<br></td>
        </tr>
    </table>
    <br>
   
    <br>
    <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
        <thead>
            <tr>
                <td width="25%" style="text-align: left;"><strong>Jenis Gadget</strong></td>
                <td width="40%" style="text-align: left;"><strong>Tipe Gadget</strong></td>
                <td width="25%" style="text-align: left;"><strong>Kelengkapan</strong></td>
                <td width="45%" style="text-align: left;"><strong>Gejala</strong></td>
            </tr>
        </thead>

        <tbody>
            <!-- ITEMS HERE -->
            <tr>
                <td style="padding: 0px 5px; line-height: 20px;">{{ $repair->jenis_gadget }}</td>
                <td style="padding: 0px 5px; line-height: 20px;">{{ $repair->tipe_gadget }}</td>
                <td style="padding: 0px 5px; line-height: 20px;">{{ $repair->kelengkapan }}</td>
                <td style="padding: 0px 5px; line-height: 20px;">{{ $repair->kerusakan }}</td>
            </tr>
        </tbody>
    </table>

    <table width="100%" style="font-family: sans-serif; font-size: 14px;" >
        <br>
        <tr>
            <td>
                
                <table width="50%" align="center" style="font-family: sans-serif; font-size: 13px; text-align: center;" >
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">
                            Check perbaikan gadget anda melalui website kami!
                            <br>
                            Kunjungi website kami di <strong> https://light-service.space </strong>
                        </td>
                    </tr>
                </table>
              
            </td>
        </tr>
        <br>
    </table>
    
    <table width="100%" style="font-family: sans-serif; font-size: 14px;" >
        <br>
        <tr>
            <td>
                
                <table width="50%" align="center" style="font-family: sans-serif; font-size: 13px; text-align: center;" >
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">
                            <strong>Light Service</strong>
                            <br>
                            Jl. Krukah Selatan No.106, Ngagelrejo, Kec. Wonokromo, Surabaya, Jawa Timur 60245
                            <br>
                            Tel: +00 000 000 0000 | Email: info@companyname.com
                            <br>
                            Company Registered in Country Name. Company Reg. 12121212.
                            <br>
                            VAT Registration No. 021021021 | ATOL No. 1234
                        </td>
                    </tr>
                </table>
              
            </td>
        </tr>
        <br>
    </table>

</body>
</html>
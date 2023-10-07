<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pendapatan Daily - {{ $date }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Pendapatan - Dicetak pada tanggal {{ $date }}</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total Pemasukan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($totalCosts as $date => $totalCost)
            <tr class="bg-gray-800 hover:bg-gray-900 text-gray-400">
                <td class="px-4 py-3 text-sm">{{ $loop->iteration }}</td>
                <td class="px-4 py-3 text-sm">{{ $date }}</td>
                <td class="px-4 py-3 text-sm">Rp. {{  number_format($totalCost, 0, ',', '.')  }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <td class="px-4 py-3 text-sm"></td>
            <td class="px-4 py-3 text-sm"></td>
            <td class="px-4 py-3 text-sm">Rp. {{  number_format($total_transaksi, 0, ',', '.')  }}</td>
        </tfoot>
    </table>
</body>
</html>

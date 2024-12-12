<!-- resources/views/pdf/stok-opname.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Stok Opname</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Stok Opname</h2>
        <p>Tanggal: {{ date('d-m-Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok Awal</th>
                <th>Barang Keluar</th>
                <th>Stok Akhir</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stokOpname as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item['nama_barang'] }}</td>
                <td>{{ $item['stok_awal'] }}</td>
                <td>{{ $item['barang_keluar'] }}</td>
                <td>{{ $item['stok_akhir'] }}</td>
                <td>
                    @if($item['stok_akhir'] > 10)
                        Stok Aman
                    @elseif($item['stok_akhir'] > 0)
                        Stok Menipis
                    @else
                        Stok Habis
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
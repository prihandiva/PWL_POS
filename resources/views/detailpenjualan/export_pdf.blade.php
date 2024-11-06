<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 6px 20px 5px 20px;
            line-height: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 4px 3px;
        }

        th {
            text-align: left;
        }

        .d-block {
            display: block;
        }

        img.image {
            width: auto;
            height: 80px;
            max-width: 150px;
            max-height: 150px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .p-1 {
            padding: 5px 1px 5px 1px;
        }

        .font-10 {
            font-size: 10pt;
        }

        .font-11 {
            font-size: 11pt;
        }

        .font-12 {
            font-size: 12pt;
        }

        .font-13 {
            font-size: 13pt;
        }

        .border-bottom-header {
            border-bottom: 1px solid;
        }

        .border-all,
        .border-all th,
        .border-all td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <table class="border-bottom-header">
        <tr>
            <td width="15%" class="text-center"><img src="{{ asset('logo.png') }}"></td>
            <td width="85%">
                <span class="text-center d-block font-11 font-bold mb-1">LAPORAN DATA PENJUALAN</span>
                <span class="text-center d-block font-13 font-bold mb-1">WEBSS KITCHEN</span>
                <span class="text-center d-block font-10">Jl. Raya Example No. 123</span>
                <span class="text-center d-block font-10">Telepon: 021-1234567</span>
            </td>
        </tr>
    </table>
    <h3 class="text-center">LAPORAN DETAIL PENJUALAN</h3>
    <table class="border-all">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Kode Penjualan</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $detail->penjualan_kode }}</td>
                    <td>{{ $detail->barang->barang_nama }}</td>
                    <td class="text-right">{{ number_format($detail->harga, 0, ',', '.') }}</td>
                    <td class="text-center">{{ $detail->jumlah }}</td>
                    <td class="text-right">{{ number_format($detail->harga * $detail->jumlah, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

<?php
use Carbon\Carbon;
?>
<!DOCTYPE html>
<html>

<head>
    <title class="text-center">{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
        td {
            font-size: 9pt;
        }

        @media print {
            @page {
                size: lanscape; /* Mengatur ukuran halaman cetak menjadi lanskap */
            }
            body {
               margin: 0;
            }
        }
        .nama{
            color: #023047;
            font-family: 'roboto', 'Montserrat', sans-serif;
}
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>Tanggal: {{ $date }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Kembali</th>
                <th>Judul Buku</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowings as $borrowing)
            <tr>
                <td class="nama">{{ $borrowing->user->name }}</td>
                <td>{{ $borrowing->book->title }}</td>
                <td>
                    @if ($borrowing->returned_at == null && Carbon::parse($borrowing->due_date)->startOfDay() < Carbon::now()->startOfDay())
                        <span class="badge bg-danger">{{ $borrowing->borrowed_at }}</span>
                    @else
                        {{ $borrowing->borrowed_at }}
                    @endif
                </td>
                <td>
                    @if ($borrowing->returned_at == null && Carbon::parse($borrowing->due_date)->startOfDay() < Carbon::now()->startOfDay())
                        <span class="badge bg-danger">{{ $borrowing->due_date }}</span>
                    @else
                        {{ $borrowing->due_date }}
                    @endif
                </td>
                <td>
                    @if ($borrowing->returned_at)
                        {{ $borrowing->returned_at }}
                    @elseif(Carbon::parse($borrowing->due_date)->startOfDay() < Carbon::now()->startOfDay())
                        <span class="badge bg-danger">Sudah Lewat Jatuh Tempo</span>
                    @else
                        {{ floor(now()->diffInDays(Carbon::parse($borrowing->due_date))) . ' hari lagi' }}
                    @endif
                </td>
                <td>
                    @if ($borrowing->status == 'Dipinjam')
                        <span class="badge bg-warning text-dark">{{ $borrowing->status }}</span>
                    @else
                        <span class="badge bg-success">{{ $borrowing->status }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


@extends('admin.layout.appadmin')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
            .
        </div>
    </div>
    <div class="card mb-4">
        {{-- Bikin button create --}}
        <div class="card-header">
            <a class="btn btn-primary" href="{{ url('produk/create') }}">Create</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($produk as $p)
                        <tr>
                            <td>{{ $p->no }}</td>
                            <td>{{ $p->nama }}</td>
                            {{-- Buat tombol --}}
                             <td>{{ $p->kategori_produk_id }}</td>
                            <td>{{ $p->nama_kategori }}</td>

                        </tr>
                        @php $no++; @endphp
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection

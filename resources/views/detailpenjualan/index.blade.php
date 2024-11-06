@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary" style="margin-left: 10px; margin-right:10px">
        <div class="card-header">
            <h3 class="card-title">Stok Barang</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/detail/import') }}')" class="btn btn-info mt-1">Import Detail (Excel)</button>
                <a href="{{ url('/detail/export_excel') }}" class="btn btn-primary mt-1"><i class="fa fa-file-excel mt-1"></i> Export Detail (Excel)</a>
                <a href="{{ url('/detail/export_pdf') }}" class="btn btn-warning mt-1"><i class="fa fa-file-pdf mt-1"></i> Export Detail (PDF)</a>
                <button onclick="modalAction('{{ url('/detail/create_ajax') }}')" class="btn btn-success mt-1">Tambah Data</button>
            </div>
        </div>
        <div class="card-body">
            <!-- untuk Filter data -->
            <div id="filter" class="form-horizontal filter-date p-2 border-bottom mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-sm row text-sm mb-0">
                            <label class="col-1 control-label col-form-label">Filter:</label>
                            <div class="col-3">
                                <select class="form-control" id="barang_id" name="barang_id" required>
                                    <option value="">- Semua -</option>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->barang_id }}">{{ $item->barang_nama }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Pilih Barang</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-sm table-striped table-hover" id="table-detail">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Penjualan</th>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false"
        data-width="75%"></div>
@endsection
@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var tableDetail;

        $(document).ready(function() {
            tableDetail = $('#table-detail').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ url('detail/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.barang_id = $('#barang_id').val();
                    }
                },

                columns: [
                {
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "penjualan.penjualan_kode",
                    className: "text-center",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "barang.barang_nama",
                    className: "text-center",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "harga",
                    className: "text-center",
                    orderable: true,
                    searchable: false
                },
                {
                    data: "jumlah",
                    className: "text-center",
                    orderable: true,
                    searchable: false
                },
                {
                    data: "aksi",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }]
            });

            $('#table-detail_filter input').unbind().bind().on('keyup', function(e) {
                if (e.keyCode == 13) { // enter key
                    tableDetail.search(this.value).draw();
                }
            });

            $('#barang_id').on('change', function() {
                tableDetail.ajax.reload();
            });
        });
    </script>
@endpush

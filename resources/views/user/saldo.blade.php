@extends('layouts.app')

@section('title', $pageName)

@section('content')
<div class="page-content">
    <!-- <i class="fa fa-info-circle"></i> Geser tabel ke kanan -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-6 col-md-6">
            <div id="data_length" class="dataTables_length" id="DataTables_Table_0_length">
                <label>
                    Show
                    <select name="data_length" aria-controls="DataTables_Table_0" class="custom-select" id="dataPerPageSelect">
                        <option value="1" @if($perPage == 10) selected @endif>10</option>
                        <option value="25" @if($perPage == 25) selected @endif>25</option>
                        <option value="50" @if($perPage == 50) selected @endif>50</option>
                        <option value="100" @if($perPage == 100) selected @endif>100</option>
                    </select> 
                    entries
                </label>
            </div>
        </div>
        <div class="col-xs-12 col-6 col-md-6">
            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                <label>Search:
                    <input type="search" class="form-control input-sm" id="productSearch" placeholder="" aria-controls="DataTables_Table_0">
                </label>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="data" class="table table-striped table-hover tabel">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="text-left">Tanggal</th>
                    <th>Saldo</th>
                    <th>Tipe Saldo</th>
                    <th>In / Out</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->saldo }}</td>
                        <td>{{ $item->tipe_saldo }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <center>
                                <a href="#" class="btn btn-sm btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i class="bi bi-file-earmark-fill"></i></a>
                            </center>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ count($data) > 0 ? $data->links('pagination::bootstrap-4') : '' }} <!-- Paginasi -->
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.querySelector('select[name="data_length"]').addEventListener('change', function () {
        window.location.href = "{{ route('history') }}?length=" + this.value;
    });

    document.querySelector('input[type="search"]').addEventListener('input', function () {
        const search = this.value;
        const url = new URL(window.location.href);
        url.searchParams.set('search', search);
        window.location.href = url.href;
    });
</script>
@endpush

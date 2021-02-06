@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('css')
<!-- DataTables -->
<link href="{{ asset('assets/back/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/back/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/back/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                @if ($msg = Session::get('success'))
                <div class="alert alert-success">
                    {{ $msg }}
                </div>
                @endif
                @if ($msg = Session::get('error'))
                <div class="alert alert-danger">
                    {{ $msg }}
                </div>
                @endif

                <h4 class="card-title">{{ $title }}</h4>
                <p class="card-title-desc">
                    <a href="{{ route('slider.create') }}" class="btn btn-primary waves-effect waves-light">
                        <i class="ti-plus"></i> Tambah</a>
                </p>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slider as $tm)
                        <tr>
                            <td>{!! $tm->judul !!}</td>
                            <td><img class="d-flex align-self-center rounded" src="{{ avatar($tm->gambar) }}" height="64"></td>
                            <td>{{ $tm->deskripsi }}</td>
                            <td>{{ $tm->link }}</td>
                            <td>{{ $tm->status }}</td>
                            <td>
                                <div class="button-items">
                                    <a href="{{ route('slider.edit', $tm) }}" class="btn btn-outline-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="ti-pencil"></i></a>
                                    <form action="{{ route('slider.destroy', $tm) }}" method="post" onsubmit="return confirm('Yakin hapus data ini?')" style="display: inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Hapus">
                                            <i class="ti-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection

@section('js')
<!-- Required datatable js -->
<script src="{{ asset('assets/back/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/back/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('assets/back/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/back/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/back/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/back/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/back/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/back/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/back/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/back/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/back/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/back/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Datatable init js -->
<script src="{{ asset('assets/back/js/pages/datatables.init.js') }}"></script>
@endsection
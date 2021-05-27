@extends('admin')
@section('css')
<style>
    .dataTables_filter {
        float: right !important;
    }
</style>
@endsection
@section('page-contents')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-tittle">Courier Trash</h3>
    </div>
    <div class="panel-body">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Courier</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$item->courier}}</td>
                    <td class="text-center">
                        <a href="/courier/restore/{{ $item->id }}" class="btn btn-success btn-sm">Restore</a>
                        <a href="/courier/deleteperm/{{ $item->id }}" class="btn btn-danger btn-sm">Hapus Permanen</a>
                    </td>
                </tr>

                @empty
                <tr>
                    <td class="text-center" colspan="3">
                        <p>Tidak ada data</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    </body>

    </html>


    @endsection
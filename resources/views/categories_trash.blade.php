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
        <h3 class="panel-tittle">Product Categories Trash</h3>
    </div>
    <div class="panel-body">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category Name</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cat as $item)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$item->category_name}}</td>
                    <td class="text-center">
                        <a href="/categories/restore/{{ $item->id }}" class="btn btn-success btn-sm">Restore</a>
                        <a href="/categories/deleteperm/{{ $item->id }}" class="btn btn-danger btn-sm">Hapus
                            Permanen</a>
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
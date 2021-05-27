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
        <h3 class="panel-tittle">Product Trash</h3>
    </div>
    <div class="panel-body">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Product Rate</th>
                    <th>Stock</th>
                    <th>Weight</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($item as $item)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->product_rate}}</td>
                    <td>{{$item->stock}}</td>
                    <td>{{$item->weight}}</td>
                    <td class="text-center">
                        <a href="/produk/restore/{{ $item->id }}" class="btn btn-success btn-sm">Restore</a>
                        <a href="/produk/deleteperm/{{ $item->id }}" class="btn btn-danger btn-sm">Hapus Permanen</a>
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
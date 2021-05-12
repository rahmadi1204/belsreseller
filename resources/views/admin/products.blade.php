@extends('layouts.app')
@section('head')
    @include('css.datatable')
    @include('js.datatable')
@endsection
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel product</h3>

                <div class="card-tools">
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button> --}}
                    <a href="/products/create" class="btn btn-outline-info btn-sm">+ Tambah</a href="/product/create">
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Opsi</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($products as $product)
                            <tr class="data-row">
                                <td style="width: 25px">{{ $i++ }}</td>
                                <td><img height="75px"
                                        src="{{ asset('/') }}dist/img/products/{{ $product->product_image ?? 'no-image.jpg' }}"
                                        alt=""></td>
                                <td>{{ $product->product_category }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>Rp. {{ number_format($product->product_price, 0, ',', '.') }}</td>
                                <td>{{ $product->product_stok }}</td>
                                <td>
                                    <div class="row ml-1">
                                        <a href="/products/edit/{{ $product->id_product }}"
                                            class="btn btn-outline-success btn-sm mr-1" id="edit-item"><i
                                                class="fa fa-edit"></i></a>
                                        <div class="btn btn-outline-danger btn-sm mr-1" id="delete-item"
                                            data-delete-id="{{ $product->id_product }}"
                                            data-delete-name="{{ $product->product_name }}"><i class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        {{-- Delete User Modal --}}
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-label"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="card-title">
                            <i class="fa fa-exclamation-triangle text-danger"></i>
                        </div>
                        <div class="tools">
                            <i class="fa fa-exclamation text-danger"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('product.delete') }}" method="post">
                            @csrf
                            <h5 class="modal-title" id="deleteUser">Yakin Hapus Data <b id="modal-delete-name"></b> <i
                                    class="fa fa-exclamation text-danger"></i>
                                <input id="modal-delete-id" name="id" type="hidden" class="form-control" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-danger">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    @include('script.datatable')
    @include('script.delete-modal')
@endsection
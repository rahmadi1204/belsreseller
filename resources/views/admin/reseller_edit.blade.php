@extends('layouts.app')
@section('head')
    @include('css.form-control')
    @include('js.form-control')
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data reseller</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('reseller.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-4">
                                <label>Username Reseller</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                                    </div>
                                    <input name="id" type="hidden" class="form-control" value="{{ $reseller->user_id }}">
                                    <input name="username" type="text" class="form-control" value="{{ $username }}">
                                </div>
                                <!-- /.input group -->
                                @error('username')
                                    <div class="text-danger text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- /.form group -->
                            <div class="form-group mt-4">
                                <label>Nama Reseller</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                    </div>
                                    <input name="name" type="text" class="form-control" value="{{ $reseller->name }}">
                                </div>
                                <!-- /.input group -->
                                @error('name')
                                    <div class="text-danger text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- /.form group -->

                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-venus-mars"></i></span>
                                    </div>
                                    <select name="gender" class="form-control">
                                        @if ($reseller->gender == 'L')
                                            <option value="L" selected>Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        @else
                                            <option value="L">Laki - Laki</option>
                                            <option value="P" selected>Perempuan</option>
                                        @endif
                                    </select>
                                </div>
                                <!-- /.input group -->
                                @error('gender')
                                    <div class="text-danger text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- /.form group -->

                            <div class="form-group">
                                <label>Email Reseller</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                    </div>
                                    <input name="email" type="email" class="form-control" value="{{ $reseller->email }}">
                                </div>
                                <!-- /.input group -->
                                @error('email')
                                    <div class="text-danger text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- /.form group -->

                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input name="birthday" type="text" class="form-control" data-inputmask-alias="datetime"
                                        data-inputmask-inputformat="yyyy/mm/dd" data-mask
                                        value="{{ $reseller->birthday }}">
                                </div>
                                <!-- /.input group -->
                                @error('birthday')
                                    <div class="text-danger text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- /.form group -->

                            <div class="form-group">
                                <label>Alamat Reseller</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                    </div>
                                    <input name="address" type="text" class="form-control"
                                        value="{{ $reseller->address }}">
                                </div>
                                <!-- /.input group -->
                                @error('address')
                                    <div class="text-danger text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- /.form group -->

                            <!-- phone mask -->
                            <div class="form-group">
                                <label>Nomor Telepon</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input name="phone" type="text" class="form-control"
                                        data-inputmask='"mask": "9999-9999-9999"' data-mask
                                        value="{{ $reseller->phone }}">
                                </div>
                                <!-- /.input group -->
                            </div>
                            @error('phone')
                                <div class="text-danger text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>JPG, JPEG, PNG, Maks 2Mb</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-camera"></i></span>
                                    </div>
                                    <input id="uploadImage" name="image" type="file" class="form-control">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <div class="col-md-6 d-flex">

                <div class="card card-teal">
                    <div class="card-header">
                        <h3 class="card-title">Foto</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group px-5 pt-1 pb-0">
                            @if ($reseller->image == null)
                                <img id="viewImage" class="img-fluid" src="{{ asset('dist/img/no-image.jpg') }}" alt="">
                            @else
                                <img id="viewImage" class="img-fluid"
                                    src="{{ asset('/') }}dist/img/resellers/{{ $reseller->image }}" alt="">
                            @endif
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>

                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="row">
            <div class="card mx-2 col">
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-success btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    @include('script.form-control')
    @include('script.image-upload')
@endsection
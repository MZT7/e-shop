@extends('layouts.admin')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Project Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Project Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Image Upload</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h1>Current Image</h1>
                            <div><img src="{{ Storage::disk('local')->url('p-img/') . $product->image }}" alt=""></div>
                            <form action="{{ route('admin.editImage', ['id' => $product->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- @method('PUT') --}}

                                <div class="form-group">
                                    {{-- <label for="inputEmail4">image</label> --}}
                                    {{-- <input type="file"
                                            class="form-control @error('image')
                                        border border-danger                                       
                                        @enderror"
                                            id="image" name="image" --}}
                                    <label for="image">Image</label><br>
                                    <input type="file"
                                        class="@error('image')
                                        border border-danger                                       
                                        @enderror"
                                        id=" image" name="image" value="{{ $product->image }}">
                                    @error('image')
                                        <div class="text-danger mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection

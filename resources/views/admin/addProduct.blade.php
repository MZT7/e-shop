@extends('layouts.admin')

@section('body')
    <!-- Main content -->
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
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>

                            @elseif (session('error'))
                                <div class="alert alert-success">
                                    {{ session('error') }}
                                </div>

                            @endif
                            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- @method('PUT') --}}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Name</label>
                                        <input type="text"
                                            class="form-control @error('name')
                                        border border-danger                                       
                                        @enderror"
                                            id="name" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Description</label>
                                        <input type="text"
                                            class="form-control @error('description')
                                        border border-danger                                       
                                        @enderror"
                                            id="description" name="description" value="{{ old('description') }}">
                                        @error('description')
                                            <div class="text-danger mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Price</label>
                                        <input type="text"
                                            class="form-control @error('price')
                                        border border-danger                                       
                                        @enderror"
                                            id="price" name="price" value="{{ old('price') }}">
                                        @error('price')
                                            <div class="text-danger mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group col-md-6">
                                        <label for="inputEmail4">Type</label>
                                        <input type="text"
                                            class="form-control @error('type')
                                        border border-danger                                       
                                        @enderror"
                                            id="type" name="type" value="{{ old('type') }}">
                                        @error('type')
                                            <div class="text-danger mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> --}}
                                    <div class="form-group col-md-6">
                                        <label for="type">Type</label>
                                        <select id="type" name='type'
                                            class="form-control @error('type')
                                        border border-danger                                       
                                        @enderror"
                                            placeholder='type'>
                                            <option value='' selected>Select Type</option>
                                            <option value="men">Men</option>
                                            <option value="women">Women</option>
                                            {{-- <option value="unisex">Unisex</option> --}}
                                        </select>
                                        @error('type')
                                            <div class="text-danger mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
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
                                            id=" image" name="image" value="">
                                        @error('image')
                                            <div class="text-danger mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
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

@extends('layouts.admin')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Projects</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Projects</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    id
                                </th>
                                <th style="width: 20%">
                                    name
                                </th>
                                <th style="width: 30%">
                                    image
                                </th>
                                <th>
                                    Description
                                </th>
                                <th style="width: 8%" class="text-center">
                                    Price
                                </th>
                                <th style="width: 8%" class="text-center">
                                    Type
                                </th>
                                <th style="width: 20%">
                                    Edit Image
                                </th>
                                <th style="width: 20%">
                                    Edit
                                </th>
                                <th style="width: 20%">
                                    Remove
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)




                                <tr>
                                    <td>
                                        {{ $product['id'] }}
                                    </td>
                                    <td>
                                        <a>
                                            {{ $product['name'] }}
                                        </a>
                                        <br />
                                        <small>
                                            {{ $product['created_at'] }}
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar"
                                                    src="{{ Storage::disk('local')->url('p-img/') . $product->image }}">
                                            </li>

                                        </ul>
                                    </td>
                                    <td>
                                        <a href=""> {{ $product['description'] }}</a>

                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">${{ $product['price'] }}</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        {{ $product['type'] }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.show', ['id' => $product->id]) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            Edit image
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('admin.edit', ['id' => $product->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        {{-- <a class="btn btn-danger btn-sm"
                                            href="{{ route('admin.destroy', ['id' => $product->id]) }}">
                                           
                                            Del
                                        </a> --}}
                                        <form action="{{ route('admin.destroy', ['id' => $product->id]) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')




                                            <button type="submit" name="submit" class="btn btn-danger btn-sm"><i
                                                    class="fas fa-trash">
                                                </i>
                                                Del</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- {{ $products->links() }} --}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            {{ $products->links() }}

        </section>
        <!-- /.content -->
    </div>
@endsection

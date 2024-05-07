@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Main</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Create</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Model group</th>
                                        <th>Price</th>
                                        <th>Count</th>
                                        <th>Published</th>
                                        <th>Category</th>
                                        <th>Tags</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($products))
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td><a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a></td>
                                            <td>{{ optional($product->model_group)->title ?? 'Not Set' }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->count }}</td>
                                            <td>{{ $product->published_text }}</td>
                                            <td>{{ $product->category->title }}</td>
                                            <td>
                                                @foreach ($product->tags as $index => $tag)
                                                    {{ $tag->title }}
                                                    @if (!$loop->last)
                                                        <span>,</span>
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

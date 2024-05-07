@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Product</h1>
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
                <form action="{{ route('product.update', $product->id) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="{{ $product->title ?? old('title') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="model_group">Model group</label>
                        <select id="model_group" name="model_group_id" class="form-control select2" style="width: 100%;">
                            <option value=""></option>
                            @foreach($model_groups as $model_group)
                                <option {{ $model_group->id == $product->model_group_id || old('model_group_id') == $model_group->id ? ' selected' : '' }} value="{{ $model_group->id }}" >{{ $model_group->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" id="description" name="description" value="{{ $product->description ?? old('description') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label><br>
                        <textarea name="content" id="content" cols="30" rows="10">{{ $product->content ?? old('content') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" value="{{ $product->price ?? old('price') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="count">Count</label>
                        <input type="number" id="count" name="count" value="{{ $product->count ?? old('count') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category_id" class="form-control select2" style="width: 100%;">
                            <option value=""></option>
                            @foreach($categories as $category)
                                <option {{ $category->id == $product->category_id || old('category_id') == $category->id ? ' selected' : '' }} value="{{ $category->id }}" >{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select id="tags" name="tags[]" class="tags" multiple="multiple" data-placeholder="Select a Tag" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" {{ $product->tags->contains($tag->id) ? ' selected' : '' }}>{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="colors">Colors</label>
                        <select id="colors" name="colors[]" class="colors" multiple="multiple" data-placeholder="Select a Color" style="width: 100%;">
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}" {{ $product->colors->contains($color->id) ? ' selected' : '' }}>{{ $color->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" {{ $product->is_published == 1 ? ' checked' : '' }} class="form-check-input" id="isPublished" name="is_published">
                        <label class="form-check-label" for="isPublished">Published</label>
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>

                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

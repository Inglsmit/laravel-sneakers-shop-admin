@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Product</h1>
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
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="model_group">Model group</label>
                        <select id="model_group" name="model_group_id" class="form-control select2" style="width: 100%;">
                            <option value=""></option>
                            @foreach($model_groups as $model_group)
                                <option {{ old('model_group_id') == $model_group->id ? ' selected' : '' }} value="{{ $model_group->id }}" >{{ $model_group->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" id="description" name="description" value="{{ old('description') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label><br>
                        <textarea name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" value="{{ old('price') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="count">Count</label>
                        <input type="number" id="count" name="count" value="{{ old('count') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category_id" class="form-control select2" style="width: 100%;">
                            <option value=""></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select id="tags" name="tags[]" class="tags" multiple="multiple" data-placeholder="Select a Tag" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="colors">Colors</label>
                        <select id="colors" name="colors[]" class="colors" multiple="multiple" data-placeholder="Select a Color" style="width: 100%;">
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="previewImage">Preview image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="previewImage">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="previewImage">Product image 1</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="product_images[]" type="file" class="custom-file-input" id="previewImage">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="previewImage">Product image 2</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="product_images[]" type="file" class="custom-file-input" id="previewImage">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="previewImage">Product image 3</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="product_images[]" type="file" class="custom-file-input" id="previewImage">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="isPublished" name="is_published">
                        <label class="form-check-label" for="isPublished">Published</label>
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary" value="Create">
                    </div>

                </form>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

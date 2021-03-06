@extends('layouts.backend')

@section('title', 'Post Create')
@section('content')
    <div class="section-header">
        <h1>Buat Post Baru</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></div>
            <div class="breadcrumb-item active">Post Baru</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="POST" id="formUpload">
                            @csrf
                            <div class="form-group">
                                <label for="title">Judul Post</label>
                                <div class="input-group mb-2">
                                    <input type="text" value="{{ old('title') }}" name="title" placeholder="isi judul"
                                        class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category">Kategori Post</label>
                                <div class="input-group mb-2">
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tag">Tags</label>
                                <div class="input-group mb-2">
                                    <select name="tag_id[]"
                                        class="form-control select2-multi @error('tag_id') is-invalid @enderror"
                                        multiple="multiple">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content">Body</label>
                                <div class="input-group mb-2">
                                    <textarea name="content" 
                                              id="mytextarea"
                                              class="form-control @error('content') is-invalid @enderror"
                                              placeholder="isi deskripsi kategori"></textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

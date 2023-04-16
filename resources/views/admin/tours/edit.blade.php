@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Paket Travel - {{ $tour->name }}</h1>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
    <div class="row">
        <div class="col-lg-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('admin.tours.update', $tour ) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Category Travel</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id ==  $tour->category_id ) selected @endif>{{ $category->title }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $tour->name }}" />
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ $tour->location }}"  />
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ $tour->duration }}" />
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea name="description" id="description" class="form-control">{{ $tour->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $tour->price }}" />
                    </div>
                  <button type="submit" class="btn btn-primary btn-block">Edit</button>
                </form>
            </div>
        </div>
        </div>

        <div class="col-lg-8">
        <div class="card shadow">

            <div class="card-body">

                @if(session('message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tour->galleries as $gallery)
                            <tr>
                                <td>{{ $gallery->id }}</td>
                                <td>
                                    <img width="100" src="/backend/img/{{ $gallery->path }}" >
                                </td>
                                <td>
                                    <a href="{{ route('admin.tours.galleries.edit', [$tour,$gallery]) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form  class="d-inline" action="{{ route('admin.tours.galleries.destroy',  [$tour,$gallery]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onClick="return confirm('Are you sure !')" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.tours.galleries.store', $tour ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="path">Add Images</label>
                        <input type="file" class="form-control" id="path" name="path" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save Image</button>
                </form>
            </div>
        </div>
    </div>
</div>
       
    

    <!-- Content Row -->

</div>
@endsection

@push('script-alt')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush
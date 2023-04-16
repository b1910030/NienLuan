@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Tour</h1>
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
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('admin.tours.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Travel</label>
                        <select name="category_id" class="form-control" >
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="form-group">
                        <label for="date_start">date_start</label>
                        <input type="datetime" class="form-control" id="date_start" name="date_start" value="{{ old('date_start') }}" />
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}" />
                    </div>
                    <div class="form-group">
                        <label for="location_start">location_start</label>
                        <input type="text" class="form-control" id="location_start" name="location_start" value="{{ old('location_start') }}" />
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" />
                    </div>
                    <div class="form-group">
                        <label for="quality">quality</label>
                        <input type="number" class="form-control" id="quality" name="quality" value="{{ old('quality') }}" />
                    </div>
                    <div class="form-group">
                        <label for="vehical">vehical</label>
                        <input type="text" class="form-control" id="vehical" name="vehical" value="{{ old('vehical') }}" />
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea name="description" id="description" rows="5" class="d-block w-100 form-control">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection
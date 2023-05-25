@extends('layouts.dashMotherPage')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List Create Page</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Shourav_Dash</li>

           
        </ol>

        @if ($errors->any())
            <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
             </div>
        @endif

        @if(session()->has('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}
        </div>
        @endif


        <form action="{{route('admin.service.create.all')}}" method="POST" enctype="multipart/form-data">
            @csrf
         
         <div class="container-fluid form-control">
        <div class="row justify-content-center mt-4">
           
            <div class="form-group col-md-3">

            <div class="">
                <label for="icon" class="fw-bold">Font Awesome Icon</label>
                <input type="text" name="icon" id="icon" class="form-control">
            </div>

            <div class=" ">
                <label for="title" class="fw-bold">title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="my-3">
                <label for="description" class="fw-bold">Description</label>
                <textarea type="file" name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
            </div>
    </div>

        </div>

        <div class="text-center">
                  <input type="submit" name="submit" class="btn btn-danger mt-5">
                </div>

           
        </div>

    </form>
</main>
@endsection
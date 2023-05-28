@extends('layouts.dashMotherPage')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Page</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Shourav_Dash</li>

           
        </ol>

      


        <form action="{{route('admin.service.update', $service->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
           
         
         <div class="container-fluid form-control">
        <div class="row justify-content-center mt-4">
           
            <div class="form-group col-md-3">

            <div class="">
                <label for="icon" class="fw-bold">Font Awesome Icon</label>
                <input type="text" name="icon" id="icon" class="form-control" value="{{$service->icon}}"> 
            </div>

            <div class=" ">
                <label for="title" class="fw-bold">title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$service->title}}">
            </div>

            <div class="my-3">
                <label for="description" class="fw-bold">Description</label>
                <textarea type="file" name="description" id="description" class="form-control" cols="30" rows="10" >{{$service->description}}</textarea>
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
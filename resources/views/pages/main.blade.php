@extends('layouts.dashMotherPage')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Shourav_Dash</h1>
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


        <form action="{{route('admin.main.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
           @method('PUT')
         <div class="container-fluid form-control">
        <div class="row justify-content-center mt-4">
            <div class="form-group col-md-4">
                <img src="{{url($data->bc_img)}}" style="height: 30vh">
                <input type="file" class="mt-2" name="bc_img" id="bc_img">
            </div>

            <div class="form-group col-md-3">

            <div class="">
                <label for="title" class="fw-bold">Title</label>
                <input type="text" name="title" class="form-control" value="{{$data->title}}">
            </div>

            <div class=" ">
                <label for="sub_title" class="fw-bold">Sub_title</label>
                <input type="text" name="sub_title" class="form-control" value="{{$data->title}}">
            </div>

            <div class="my-3">
                <label for="resume" class="fw-bold">Resume</label>
                <input type="file" name="resume" id="resume" class="form-control">
            </div>
    </div>

        </div>

        <div class="text-center">
                  <input type="submit" name="submit" class="btn btn-primary mt-5">
                </div>

           
        </div>

    </form>
</main>
@endsection
@extends('layouts.dashMotherPage')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Portfolio Create Page</h1>
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


        <form action="{{route('admin.portfolio.create.all')}}" method="POST" enctype="multipart/form-data">
            @csrf
           
          
         <div class="container-fluid form-control">
        <div class="row justify-content-center mt-4">

            <div class="form-group col-md-4">
                <span class="fw-bold">Big Image</span>
                <img src="{{asset('assets/img/big_img.jpg')}}" style="height: 30vh">
                <input type="file" class="mt-2" name="big_img" id="big_img">
            </div>

             <div class="form-group col-md-3">
                <span class="fw-bold">Small Image</span>
                <img src="{{asset('assets/img/small_img.jpg')}}" style="height: 20vh">
                <input type="file" class="mt-2" name="small_img" id="small_img">
            </div>

            <div class="form-group col-md-3">

            <div class="">
                <label for="title" class="fw-bold">Title</label>
                <input type="text" name="title" class="form-control" value="">
            </div>

            <div class=" ">
                <label for="description" class="fw-bold">Description</label>
                <input type="text" name="description" class="form-control" value="">
            </div>

            <div class=" ">
                <label for="category" class="fw-bold">Category</label>
                <input type="text" name="category" class="form-control" value="">
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
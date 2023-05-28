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

        <table class="table table-dark table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Icon</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <td class="">Action</td>
              </tr>
            </thead>
            <tbody>

                
                @foreach ($var as $service)
                <tr>


                    <th scope="row">{{$service->id}}</th>
                    <td>{{$service->icon}}</td>
                    <td>{{$service->title}}</td>
                    <td>{{$service->description}}</td>
                    <td class="">
                      <div class="row">
                        <div class="col-sm-2 mx-3">
                          <a href="{{route('admin.service.edit', $service->id)}}" class="btn btn-primary">Edit</a>
                        </div>
                        <div class="col-sm-2" >
                         <form action="{{route('admin.service.destroy',$service->id)}}" method="POST">
                          @csrf
                          @method('DELETE')

                          <input type="submit" name="submit" value="delete" class="btn btn-danger">

                        </form>
                        </div>

                        
                      </div>
                    </td>
                    
                    
                  </tr>
                @endforeach
                
               
             
              
            </tbody>
          </table>

 
</main>
@endsection
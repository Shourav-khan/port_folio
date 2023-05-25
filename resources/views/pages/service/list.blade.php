@extends('layouts.dashMotherPage')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List Create Page</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Shourav_Dash</li>

           
        </ol>

        <table class="table table-dark table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Icon</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
              </tr>
            </thead>
            <tbody>

                
                @foreach ($services as $service)
                <tr>


                    <th>{{$service->id}}</th>
                    <td>{{$service->icon}}</td>
                    <td>{{$service->title}}</td>
                    <td>{{$service->description}}</td>
                    
                    
                  </tr>
                @endforeach
                
               
             
              
            </tbody>
          </table>

 
</main>
@endsection
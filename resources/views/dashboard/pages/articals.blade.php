@extends('dashboard.layouts.master')
@section('title')
<title>Articals</title>
@endsection

@section('custom-styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
     <!-- Content Header (Page header) -->
     <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      
      <p>Hello {{ auth()->user()->name }}</p>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable with minimal features & hover style</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>name</th>
                        <th>details</th>
                        <th>related category</th>
                        <th>slug</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($articals as $artical)
                        <tr class="table-danger">
                          <td>{{$artical->name}}</td>
                          <td>{{$artical->details}}</td>
                          <td>{{$artical->category->name??"not found"}}</td>
                          <td>{{$artical->slug}}</td>
                  
                        <td>
                             <form action="{{route('articles.delete', $artical->id)}}" method="post">
                              @csrf   
                              @method('delete')
                              <input class="btn btn-danger " value="Delete artical" type="submit">
                             </form>
                         </td>
                         <td>
                              <a href="{{route('articles.updateform', $artical->id)}}"><input class="btn btn-warning " value="Update artical" type="submit"></a>
                         </td>
                  
                        </tr>  
                        @endforeach
                        </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <a href="{{route('categories.list')}}"><input class="btn btn-secondary" value="Go to category"></a>

            <!-- /.card-body -->
          </div>
            </div>
          </div>
        </div>
      </section>
@endsection


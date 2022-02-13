@extends('dashboard.layouts.master')
@section('title')
<title>categories</title>
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
                {{-- <nav>
                <ul class="navbar-nav" >
                    @foreach($categories as $cat)
                  <li class="nav-item">
                    <!-- <a class="nav-link active" href="#cat1"></a> -->
                    <div class="dropdown">
                    <button class="btn btn-primary" type="button" aria-expanded="false">
                      {{$cat->name}}
                    </button>
                    <ul >
                    @foreach($articals as $artical)
                      @if($artical->category_id == $cat->id)
                         <li><a href="#">{{$artical->name}}</a></li>
                     @endif
                     @endforeach
                    </ul>
                
                  </div>
                  </li>
                    @endforeach
                </ul></nav> --}}
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>NAME</th>
                      <th>DELETE</th>
                      <th>UPDATE(s)</th>
                      <th>SHOW version</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $cat)
                        <tr>
                          <td>
                              <div>{{$cat->name}}</div>
                         </td>
                         <td>
                             <form action="{{route('categories.delete', $cat->id)}}" method="post">
                              @csrf   
                              @method('delete')
                              <input class="btn btn-danger" value="Delete category" type="submit">
                             </form>
                         </td>
                         <td>
                              <a href="{{route('categories.updateform', $cat->id)}}"><input class="btn btn-warning" value="Update category" type="submit"></a>
                         </td>
                  
                         <td>
                              <a href="{{route('categories.articles.list', $cat->id)}}" ><input class="btn btn-secondary"  value="Show Articals" type="submit"></a>
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
            <a href="{{route('categories.create')}}"><input class="btn btn-primary" value="Add category"></a>

            <!-- /.card-body -->
          </div>
            </div>
          </div>
        </div>
      </section>
@endsection
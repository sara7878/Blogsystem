<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Store</title>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
        @foreach($categories as $cat)
      <li class="nav-item">
        <!-- <a class="nav-link active" href="#cat1"></a> -->
        <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          {{$cat->name}}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        @foreach($articals as $artical)
          @if($artical->category_id == $cat->id)
             <li><a class="dropdown-item" href="#">{{$artical->name}}</a></li>
         @endif
         @endforeach
        </ul>
      </div>
      </li>
        @endforeach
    </ul>
  </div>
</nav>


<div class="container mt-3">
  <table class="table table-hover">
    <tbody>        
    @foreach($categories as $cat)
      <tr class="table-danger">
        <td>
            <div class="mx-auto text-center fs-1 mt-5" style="height: 100px;">{{$cat->name}}</div>
       </td>
       <td>
           <form action="{{route('categories.delete', $cat->id)}}" method="post">
            @csrf   
            @method('delete')
            <input class="btn btn-danger mt-5" value="Delete category" type="submit">
           </form>
       </td>
       <td>
            <a href="{{route('categories.updateform', $cat->id)}}"><input class="btn btn-warning mt-5" value="Update category" type="submit"></a>
       </td>

       <td>
            <a href="{{route('categories.articles.list', $cat->id)}}"><input class="btn btn-primary mt-5" value="Show Articals" type="submit"></a>
       </td>
       <!-- <td> 
        related articles :
         <div class="bg-secondary rounded shadow mt-3">
         <ul>
         @foreach($articals as $artical)
         @if($artical->category_id == $cat->id)
         <li>{{$artical->name}}</li>
         @endif
         @endforeach  
        </ul>
      </div>
       </td> -->
      </tr>  
    @endforeach

    </tbody>
  </table>

  <a href="{{route('categories.create')}}"><input class="btn btn-primary" value="Add category"></a>
</div>



</body>
</html>
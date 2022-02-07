<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
<h2>Related Category :{{$category->name}}</h2>
    <table class="table">
    <thead>
      <tr>
        <th>name</th>
        <th>details</th>
        <th>slug</th>
      </tr>
    </thead>
    <tbody>
    @foreach($articals as $artical)
      <tr class="table-danger">
        <td>{{$artical->name}}</td>
        <td>{{$artical->details}}</td>
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
  </table>
  <a href="{{route('articles.create',$category_id)}}"><input class="btn btn-primary" value="Add Artical"></a>
  <a href="{{route('categories.list')}}"><input class="btn btn-secondary" value="Go to category"></a>

</div>

</body>
</html>


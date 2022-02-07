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
  <h2>Stacked form</h2>
  <form method="POST" action="{{route('categories.update',$category->id)}}">
    <div class="mb-3 mt-3">
    @csrf
      <label for="cat">Category:</label>
      <input type="text" class="form-control" id="cat" placeholder="Enter category" name="catName" value="{{$category->name}}">
    </div>

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>

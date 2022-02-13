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
  <form method="POST" action="{{route('articles.store',$categoryid)}}" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
    @csrf
      <label for="cat">Artical:</label>
      <input type="text" class="form-control" id="cat" placeholder="Enter artical" name="articalName">

      @if ($errors->get('articalName'))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->get('articalName') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

      <label for="cat1">Description:</label>
      <textarea  class="form-control" id="cat1" placeholder="Enter description" name="artialdesc"></textarea>

      @if ($errors->get('artialdesc'))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->get('artialdesc') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

      <label for="cat2">slug:</label>
      <input type="text" class="form-control" id="cat2" placeholder="Enter slug" name="articalslug">  
      
    @if ($errors->get('articalslug'))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->get('articalslug') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    </div>
      UPLOAD : <input type="file" name="upload"> <br>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


</body>
</html>

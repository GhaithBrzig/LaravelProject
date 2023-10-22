<!DOCTYPE html>
<html>
<head>
  <title>Laravel 9 Generate PDF File Using DomPDF - Techsolutionstuff</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="margin-top: 15px ">
        <div class="pull-left">
        
        </div>
        <div class="pull-right">
          <a class="btn btn-primary" href="{{route('postsBack.index')}}">Return</a>
          <a class="btn btn-primary" href="{{route('PDF.index',['download'=>'pdf'])}}">Download PDF</a>
        </div>
      </div>
    </div><br>
    <table class="table table-bordered">
      <tr>
        <th>title</th>
        <th>category</th>
        <th>content</th>
      </tr>
      @foreach ($posts as $post)
      <tr>
        <td>{{ $post->title }}</td> 
        <td>{{ $post->category }}</td>
        <td>{{ $post->content }}</td>
        
      </tr>
      @endforeach
    </table>
  </div>
</body>
</html>
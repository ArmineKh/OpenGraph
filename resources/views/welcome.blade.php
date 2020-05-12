<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    .card{
        margin: 15px auto;
        width: 70%;
        padding: 10px;
    }
    .copyText{
        display:inline-block;
        margin: 0 15px;
    }
    </style>

      
    </head>
    <body>
    <div class="card " >
  <div class="card-body">
    <form action="{{route('sendUrl')}}" method = "POST" enctype="multipart/form-data">
    {{csrf_field()}}
  <div class="form-group">
    <label for="url">Введите адрес исходной ссылки</label>
    <input type="text" class="form-control" name="url" id="url" >
  </div>
  <div class="form-group">
    <label for="title">Введите заголовок opengraph</label>
    <input type="text" class="form-control" name="title" id="title" >
  </div>
  <div class="form-group">
    <label for="description">Введите опнсание opengraph</label>
    <input type="text" class="form-control" name="description" id="description" ">
  </div>
  <div class="form-group">
    <label for="image">Прикрепите изображение</label>
    <input type="file" class="form-control" name="image" id="image" ">
  </div>
  

  <button type="submit" class="btn btn-primary">Сократите ссылку</button>
</form>
  </div>
</div>

  @foreach($links as $link)
  @if (Session::getId() === $link->session_id)
<div class="card " >
  <div class="card-body">
  <input type="hidden" id="{{$link->id}}">
  <p id="{{$link->url}}" class="copyText">{{$link->opengraph_url}}</p>
    <button onclick="copy()">Скопировать</button>
  </div>
  </div>
    <script>
    var data = document.getElementById("{{$link->url}}");
    var temp = document.getElementById("{{$link->id}}");
    function copy(){
      temp.value = data.textContent;
      if (temp.select) {
        temp.select();
        try {
      document.execCommand('copy');
    } catch (err) {
      alert('please press Ctrl/Cmd+C to copy manually');   
    }
      }
    }
    </script>
  @endif
  @endforeach

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>

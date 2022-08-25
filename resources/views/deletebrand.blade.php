<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
@foreach($brands as $brand)
<!-- Modal -->
  <div class="modal" id="deleteBrandModal{{$brand->id}}" role="dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:white;">
          <h2 clas="modal-header" style="color: red;">ВНИМАНИЕ!</h2>
        </div>
        <div class="modal-body">
      <div class="modal-text">
        <h1>Сигурни ли сте, че искате да изтриете тази марка ?</h1>
        <p>Веднъж изтритa, тази марка е загубена завинаги.</p>
        </div>
        <div class="modal-footer">
      <form action="/brand/{{$brand->id}}" class="inline-block" enctype="multipart/form-data">
             <button type="submit" name="delete" formmethod="POST" class="button" style="background-color: red;">Изтрий</button>                
             <button type="button" class="button" data-dismiss="modal">Затвори</button>
             {{ csrf_field() }}
       </form>
        </div>       
      </div>
    </div>
  </div>
<!--End modal-->
@endforeach
</body>
</html>
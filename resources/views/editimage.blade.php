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
    <body class="background">
@foreach($images as $image)
<!-- Modal -->
  <div class="modal" id="editImageModal{{$image->id}}" role="dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 clas="modal-header">Обновяване на снимка</h2>
        </div>
        <div class="modal-body">
        <form method="POST" action="/image/{{ $image->id }}" enctype="multipart/form-data">
            <div class="form-group">
            <div class="col-md-6">
                            <input type="file" name="image" class="form-control">
                        </div>
                        @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="submit" name="update" class="button">Обнови снимка</button>
                    <button type="button" class="button" data-dismiss="modal">Затвори</button>
                </div>
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

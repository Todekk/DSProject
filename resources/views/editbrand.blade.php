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
@foreach($brands as $brand)
<!-- Modal -->
  <div class="modal" id="editBrandModal{{$brand->id}}" role="dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 clas="modal-header">Редактиране на марка</h2>
        </div>
        <div class="modal-body">
        <form method="POST" action="/brand/{{$brand->id}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                    <input name="brand_name" placeholder="{{$brand->brand_name}}">
                    @if ($errors->has('brand_name'))
                        <span class="text-danger">{{ $errors->first('brand_name') }}</span>
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="submit" name="update" class="button">Обнови марка</button>
                    <button type="button" class="button" data-dismiss="modal">Затвори</button>
                </div>

            </form>

        </div>
      </div>
    </div>
  </div>
<!--End modal-->
@endforeach
</body>
</html>

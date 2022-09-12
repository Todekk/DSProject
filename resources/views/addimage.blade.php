<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
<!-- Modal -->
  <div class="modal" id="addImageModal_create" role="dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 clas="modal-header">Добавяне на снимка</h2>
        </div>
        <div class="modal-body">
         <form method="POST" action="/images" enctype="multipart/form-data">
            <div class="form-group">
            <div class="col-md-6">
                            <input type="file" name="image" class="form-control">
                        </div>
                        @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="button">Добави снимка</button>
                    <button type="button" class="button" data-dismiss="modal">Затвори</button>
                </div>
                {{ csrf_field() }}
            </form>   </div>
      </div>
    </div>
  </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--End modal-->

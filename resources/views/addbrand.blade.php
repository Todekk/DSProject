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
  <div class="modal" id="addBrandModal_create" role="dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 clas="modal-header">Добавяне на марка</h2>
        </div>
        <div class="modal-body">
         <form method="POST" id="brandForm" enctype="multipart/form-data">
            <div class="form-group">
                    <input name="brand_name" placeholder='Въведете името на марката.'></input>
                    @if ($errors->has('brand_name'))
                        <span class="text-danger">{{ $errors->first('brand_name') }}</span>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="button">Добави марка</button>
                    <button type="button" class="button" data-dismiss="modal">Затвори</button>
                </div>
                {{ csrf_field() }}
            </form>

        </div>
      </div>
    </div>
  </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('#brandForm').on('submit', function(e){
        e.preventDefault();

        var headers = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        $.ajax({
            headers:headers,
            url: '/brand',
            type: "POST",
            data:$(this).serialize(),
            success:function(data){
                alert("Успешно добавхите марка!")
                console.log(data);


            },
            error:function(data)
            {
                alert("Грешка при добавяне на марка!")
                console.log(data);
            }
        })
    });
</script>

<!--End modal-->

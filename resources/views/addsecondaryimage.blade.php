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
  <div class="modal" id="addSecondaryImageModal_creation" role="dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 clas="modal-header">Добавяне на допълнителни снимки</h2>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{url('/itemimages')}}" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                    </div>
                    @if ($errors->has('itemimage'))
                        <span class="text-danger">{{ $errors->first('itemimage') }}</span>
                    @endif
                    <div class="form-group">
                        @if ($errors->has('item_id'))
                            <span class="text-danger">{{ $errors->first('item_id') }}</span>
                        @endif
                        <select class="form-group" name="item_id" id="item_id">
                            <option selected>Артикули</option>
                            @foreach($item as $items)
                                <option value="{{$items->id}}">{{$items->itemName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="button">Добави снимка</button>
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
    $('#submitForm').on('submit', function(e){
        e.preventDefault();

        var headers = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        $.ajax({
            headers:headers,
            url: '/item',
            type: "POST",
            dataType:'json',
            data:$(this).serialize(),
            success:function(data){
                alert("Успешно добавхите артикулът!")

            },
            error:function(data)
            {
                alert("Грешка при добавяне на артикул!")
            }
        })
    });
</script>
<!--End modal-->

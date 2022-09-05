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
<!-- Modal -->
  <div class="modal" id="addModal_create" role="dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 clas="modal-header">Добавяне на артикул</h2>
        </div>
        <div class="modal-body">
         <form method="post" enctype="multipart/form-data" id="addItemForm">
             @csrf
             <div class="form-group">
                 @if ($errors->has('mainimage_id'))
                     <span class="text-danger">{{ $errors->first('mainimage_id') }}</span>
                 @endif
                     @foreach($images as $image)
                         <input type="checkbox" value="{{$image->id}}" name="mainimage_id" id="mainimage_id" >
                         <label><img style="height: 100px; width: 100px" src="{{$image->url}}"></label>
                     @endforeach
             </div>
            <div class="form-group">
                    <input name="itemName" action="/item" id="itemName" placeholder='Въведете името на вашият артикул.'>
                    @if ($errors->has('itemName'))
                        <span class="text-danger">{{ $errors->first('itemName') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input name="description"  id="description" placeholder='Въведете кратко описание за вашетият артикул.'>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    @if ($errors->has('brand_id'))
                        <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                    @endif
                    <select class="form-group" name="brand_id" id="brand_id">
                            <option selected>Марки</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    @if ($errors->has('cat_id'))
                        <span class="text-danger">{{ $errors->first('cat_id') }}</span>
                    @endif
                    <select class="form-group" name="cat_id" id="cat_id">
                            <option selected>Категории</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input name="price" id="price" placeholder='Въведете цена за вашият артикул. (В левове)'>
                    @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="modal-footer">
                    <button id="submit" type="submit" class="button">Добави артикул</button>
                    <button type="button" class="button" data-dismiss="modal">Затвори</button>
                </div>
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
    $('#addItemForm').on('submit', function(e){
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



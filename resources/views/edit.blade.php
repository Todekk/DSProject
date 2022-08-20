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
@foreach($items as $item)
<!-- Modal -->
  <div class="modal" id="editModal{{$item->id}}" role="dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 clas="modal-header">Редактиране на артикул</h2>
        </div>
        <div class="modal-body">
        <form method="POST" action="/item/{{ $item->id }}" enctype="multipart/form-data">
                 <div class="">
                    <input type="file" name="image">
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="">
                    <textarea name="itemName" class="">{{$item->itemName }}</textarea>	
                    @if ($errors->has('itemName'))
                        <span class="text-danger">{{ $errors->first('itemName') }}</span>
                    @endif
                </div>
                <div class="">
                    <textarea name="description" class="">{{$item->description }}</textarea>	
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <textarea name="brand_id">{{$item->brand_id}}</textarea>  
                    @if ($errors->has('brand_id'))
                        <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                    @endif
                    <select class="form-group">
                            <option disabled selected>Марки с техният идентификатор</option>
                            @foreach($brand as $brands)
                                <option disabled value="{{$brands->id}}" >{{$brands->id}}, {{$brands->brand_name}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <textarea name="cat_id">{{$item->cat_id}}</textarea>  
                    @if ($errors->has('cat_id'))
                        <span class="text-danger">{{ $errors->first('cat_id') }}</span>
                    @endif
                    <select class="form-group">
                            <option disabled selected>Категории с техният идентификатор</option>
                            @foreach($category as $categories)
                                <option disabled value="{{$categories->id}}" >{{$categories->id}}, {{$categories->category_name}}</option>
                            @endforeach
                    </select>
                </div>    
                <div class="">
                    <textarea name="price" class="">{{$item->price }}</textarea>	
                    @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>

                <div class="modal-footer">  
                    <button type="submit" name="update" class="button">Обнови артикул</button>                          
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
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
         <form method="POST" action="/item" enctype="multipart/form-data">
         <div class="form-group">
                    <textarea name="mainimage_id"  placeholder='Въведе идентификатор за нужната снимка.'></textarea>  
                    @if ($errors->has('mainimage_id'))
                        <span class="text-danger">{{ $errors->first('mainimage_id') }}</span>
                    @endif                    
                </div>
                <div class="form-group">
                    <textarea name="imageone_id"  placeholder='Въведе идентификатор за нужната снимка.'></textarea>  
                    @if ($errors->has('imageone_id'))
                        <span class="text-danger">{{ $errors->first('imageone_id') }}</span>
                    @endif                    
                </div>
            <div class="form-group">
                    <textarea name="itemName" placeholder='Въведете името на вашият артикул.'></textarea>  
                    @if ($errors->has('itemName'))
                        <span class="text-danger">{{ $errors->first('itemName') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <textarea name="description"  placeholder='Въведете кратко описание за вашетият артикул.'></textarea>  
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <textarea name="brand_id"  placeholder='Въведе идентификатор за нужната марка.'></textarea>  
                    @if ($errors->has('brand_id'))
                        <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                    @endif
                    <select class="form-group">
                            <option disabled selected>Марки с техният идентификатор</option>
                            @foreach($brands as $brand)
                                <option disabled value="{{$brand->id}}" >{{$brand->id}}, {{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <textarea name="cat_id"  placeholder='Въведе идентификатор за нужната категория.'></textarea>  
                    @if ($errors->has('cat_id'))
                        <span class="text-danger">{{ $errors->first('cat_id') }}</span>
                    @endif
                    <select class="form-group">
                            <option disabled selected>Категории с техният идентификатор</option>
                            @foreach($categories as $category)
                                <option disabled value="{{$category->id}}" >{{$category->id}}, {{$category->category_name}}</option>
                            @endforeach
                    </select>
                </div>                
                <div class="form-group">
                    <textarea name="price"  placeholder='Въведете цена за вашият артикул. (В левове)'></textarea>  
                    @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="submit" class="button">Добави артикул</button>
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

<!--End modal-->



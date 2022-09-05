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
                    <div class="form-group">
                        @if ($errors->has('mainimage_id'))
                            <span class="text-danger">{{ $errors->first('mainimage_id') }}</span>
                        @endif
                        @foreach($images as $image)
                            <input type="checkbox" value="{{$image->id}}" name="mainimage_id" id="mainimage_id" >
                            <label><img style="height: 100px; width: 100px" src="{{$image->url}}"></label>
                        @endforeach
                    </div>
                    <div class="">
                        <input name="itemName" class="" placeholder="{{$item->itemName }}">
                        @if ($errors->has('itemName'))
                            <span class="text-danger">{{ $errors->first('itemName') }}</span>
                        @endif
                    </div>
                    <div class="">
                        <input name="description" class="" placeholder="{{$item->description }}">
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
                    <div class="">
                        <input name="price" class="" placeholder="{{$item->price }}">
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="update" class="edit">Обнови артикул</button>
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

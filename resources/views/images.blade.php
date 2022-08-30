<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
<title>Dashboard</title>
</head>
<body style="background-color:rgb(51, 51, 51);">
<!-- Nav Bar-->
@if(Auth::user())
<ul class="navul">
<li class="navli" style="float:right; background-color: rgb(32, 32, 32);">
    <p style="font-weight:bold;font-size:15px;">Здравей, {{Auth::user()->name}}!</p>
</li>
  <li class="navli"><a class="button" href="/dashboard">Артикули</a></li>
  <li class="navli"><a class="button" href="/categories">Категории</a></li>
  <li class="navli"><a class="button" href="/brands">Марки</a></li>
</ul>
@endif
@if(Auth::guest())
<h4 style="color:white">Изглежда, че не сте влезли с потребителски акаунт, <a style="color:white" href="{{ route('login') }}">влезте</a> в профила си или се <a style="color:white" href="{{ route('register') }}">регистрирайте</a>.</h4>
@endif
            <table>
                <tr>
                    <th><h2 style="color:white;">Снимки</h2></th>
                    @if(Auth::user())
                    <th> <div class="divLayout">
                   <a data-toggle="modal" href="#" id="addImageModal" data-target="#addImageModal_create" class="addButton">Добави заглавна снимка</a>
                    </div>
                    </th>
                        <th> <div class="divLayout">
                                <a data-toggle="modal" href="#" id="addSecondaryImageModal" data-target="#addSecondaryImageModal_creation" class="addButton">Добави снимка</a>
                            </div>
                        </th>
                    @endif

                </tr>
            </table>

            <!-- Display Information -->
            <table class="table">
                <thead>
                <tr class="tr">
                    <th class="thBackground th">Заглавни Снимки</th>
                    <th class="thBackground th">Действия</th>
                </tr>
                </thead>

                <tbody>
                @foreach($images as $image)
                    <tr class="tr">
                        <td class="td"><img src="{{$image->url}}" width="200px"></td>
                        <td class="td">
                            <a data-toggle="modal" href="#" data-target="#deleteImageModal{{$image->id}}" class="anchorBCButton">Изтрий</a>
                        </td>
                    </tr>

                @endforeach
                <th  class="thBackground th"> Снимки</th>
                @foreach($itemimages as $itemimage)
                    <tr class="tr">
                        <td class="td"><img src="{{$itemimage->url}}" width="200px"></td>
                        <td class="td">
                            <a data-toggle="modal" href="#" data-target="#deleteSecondaryImageModal{{$itemimage->id}}" class="anchorBCButton">Изтрий</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
@include('editimage')
@include('deleteimage')
@include('addimage')
@include('addsecondaryimage')
@include('deletesecondaryimage')
</body>
</html>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body class="background" style="margin:0;">

<!-- Nav Bar -->
@if(Auth::user())
<ul class="navul">
<li class="navli" style="float:right; background-color: rgb(32, 32, 32);">
    <p style="font-weight:bold;font-size:15px;">Здравей, {{Auth::user()->name}}!</p>
</li>
    <li class="navli" style="float:right;">
        <form action="/filterByFavourite" method="get" >
            {{ csrf_field() }}
            <div>
                  <span>
                    <button type="submit" class="button">Любими</button>
                  </span>
            </div>
        </form></li>
  <li class="navli"><a class="button" href="/images">Снимки</a></li>
  <li class="navli"><a class="button" href="/categories">Категории</a></li>
  <li class="navli"><a class="button" href="/brands">Марки</a></li>
</ul>
@endif
<!-- Filters -->
<ul class="navul">
  <li class="navli"> <form action="/filterName" method="get">
    {{ csrf_field() }}
                 <div>
                  <span>
                    <button type="submit" class="button">Филтриране по име</button>
                  </span>
             </div>
         </form></li>
  <li class="navli"><form action="/filterPrice" method="get">
   {{ csrf_field() }}
              <div>
                  <span>
                     <button type="submit" class="button">Филтриране по цена</button>
                  </span>
             </div>
         </form>
 </li>
    @foreach($categories as $cat)
    <li class="navli"> <form action="/filterByCategory" method="get">
            {{ csrf_field() }}
            <div>
                  <span>
                    <button value="{{$cat->category_name}}" name="category_name" class="button">{{$cat->category_name}}</button>
                  </span>
            </div>
        </form>
        @endforeach</li>
            <form action="/filterBySearch" method="get"  style="float:right;">
                {{csrf_field()}}
                <div>
                    <input type="filterBySearch" name="filterBySearch" placeholder="Търси" style="border-style: solid; border-width: 3px;">
                    <span>
                     <button type="submit" class="button">Търси</button>
                  </span>
                </div>
            </form>
</ul>
@if(Auth::guest())
<h4 style="color:white">Изглежда, че не сте влезли с потребителски акаунт, <a href="{{ route('login') }}" style="color:white">влезте</a> в профила си или се <a style="color:white" href="{{ route('register') }}">регистрирайте</a>.</h4>
@endif
            <table>
                <tr>
                    <th><h2 style="color:white;">Aртикули</h2></th>
                    @if(Auth::user())
                    <th> <div class="divLayout">
                   <a data-toggle="modal" href="#" id="addModal" data-target="#addModal_create" class="addButton">Добави артикул</a>
                    </div>
                    @endif
                </th>
                </tr>
            </table>

                <!-- Adding a new item -->

            </div>

            <!-- Display Information -->
            <table class="table">
                <thead>
                <tr class="tr">
                    <th class="thBackground th">Любими</th>
                    <th class="thBackground th">Снимка</th>
                    <th class="thBackground th">Артикул</th>
                    <th class="thBackground th">Описание</th>
                    <th class="thBackground th">Марка</th>
                    <th class="thBackground th">Категория</th>
                    <th class="thBackground th">Цена</th>
                    <th class="thBackground th">Действия</th>
                </tr>
                </thead>

                <tbody>
                @foreach($items as $item)
                    <tr class="tr">
                        <td><form action="/{{$item->id}}" method="post">
                        {{ csrf_field() }}
                            @method('PATCH')
                                <button id="btn" class="anchorButton" style="background-color:yellow">⭐</button>

                            </form> </td>
                        <td class="td">
                        <img src="{{$item->image->url}}" width="200px">
                        </td>
                        <td class="td">
                            {{$item->itemName}}
                        </td>
                        <td class="td">
                            {{$item->description}}
                        </td>
                        <td class="td">
                            {{$item->brand->brand_name}}
                        </td>
                        <td class="td">
                           {{$item->category->category_name}}
                        </td>
                        <td class="td">
                            {{$item->price}} lv.
                        </td>
                        <td class="td">
                            <a data-toggle="modal" href="#" data-target="#itemPreview{{$item->id}}" class="anchorButton">Преглед</a>
                            <a data-toggle="modal" href="#" data-target="#editModal{{$item->id}}" class="anchorButton">Редактирай</a>
                            <a data-toggle="modal" href="#" data-target="#deleteModal{{$item->id}}" class="anchorButton">Изтрий</a>
                        </td>
                    </tr>
                    @include('edit')
                    @include('delete')
                @endforeach
                </tbody>
            </table>

@include('add')
@include('itempreview')

</body>
<!--Ajax-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#load').click(load);
    })
    function load(){
    $.ajax({
        type:"GET",
        url: 'addFav',
        data:{
            num:$('#num1').val(),
            num2:$('#num2').val()
        },
        dataType: 'json'
    }).done(function(data){
        $('#content').append('<p class="fav">'+Test+'</p>')
    })
    }
</script>
<style type="text/css">
    .fav{
        background-color: white;
    }
</style>-->
</html>

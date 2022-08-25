<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body class="background">

<!-- Nav Bar -->
@if(Auth::user())
<ul class="navul">    
<li class="navli" style="float:right; background-color: rgb(32, 32, 32);">    
    <p style="font-weight:bold;font-size:15px;">Здравей, {{Auth::user()->name}}!</p>    
</li>
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
<li class="navli">
    <form action="/filterBySearch" method="get">
      {{csrf_field()}}
           <div>                            
                <input type="filterBySearch" name="filterBySearch" placeholder="Търси" style="border-style: solid; border-width: 3px;">
                 <span>
                     <button type="submit" class="button">Търси</button>
                  </span>
            </div>
      </form>
</li>
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
                        <td><form action="/favourite/set" method="get">
                        {{ csrf_field() }}
                            <button class="anchorButton" style="background-color:yellow">⭐</button>        
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

</body>
</html>
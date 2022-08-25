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
  <li class="navli"><a class="button" href="/dashboard">Назад</a></li>
</ul>
@endif
<!-- Filters -->
@if(Auth::guest())
<h4 style="color:white">Изглежда, че не сте влезли с потребителски акаунт, <a href="{{ route('login') }}" style="color:white">влезте</a> в профила си или се <a style="color:white" href="{{ route('register') }}">регистрирайте</a>.</h4>
@endif
            <table>
                <tr>
                    <th><h2 style="color:white;">Aртикули</h2></th>                
                </tr>
            </table>
                
                <!-- Adding a new item -->
               
            </div>
            
            <!-- Display Information -->
            <table class="table">
                <thead>
                <tr class="tr">
                    <th class="thBackground th">Снимка</th>
                    <th class="thBackground th">Артикул</th>
                    <th class="thBackground th">Описание</th>
                    <th class="thBackground th">Марка</th>
                    <th class="thBackground th">Категория</th>
                    <th class="thBackground th">Цена</th>
                </tr>                
                </thead>
                
                <tbody>
                @foreach($items as $item)
                    <tr class="tr">     
                        <td class="td"><img value="{{$item->mainimage_id}}" src="{{$item->image->url}}" width="200px"></td>  
                        <td class="td"><img value="{{$item->imageone_id}}" src="{{$item->image->url}}" width="200px"></td>               
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
                    </tr>                
                @endforeach
                </tbody>
            </table>  
            @vite(['resources/css/app.css'])
        </body>
</html>
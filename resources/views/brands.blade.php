<!DOCTYPE html>
<html>
<head>
<title>Brands</title>
</head>
<body class="background">
<!-- Nav Bar-->
@if(Auth::user())
<ul class="navul">    
<li class="navli" style="float:right; background-color: rgb(32, 32, 32);">    
    <p style="font-weight:bold;font-size:15px;">Здравей, {{Auth::user()->name}}!</p>    
</li>
  <li class="navli"><a class="button" href="/dashboard">Артикули</a></li>
  <li class="navli"><a class="button" href="/images">Снимки</a></li>
  <li class="navli"><a class="button" href="/categories">Категории</a></li>  
</ul>
@endif
<!-- Filters -->
@if(Auth::guest())
<h4 style="color:white">Изглежда, че не сте влезли с потребителски акаунт, <a style="color:white" href="{{ route('login') }}">влезте</a> в профила си или се <a style="color:white" href="{{ route('register') }}">регистрирайте</a>.</h4>
@endif
            <table>
                <tr>
                    <th><h2 style="color:white;">Марки</h2></th>
                    @if(Auth::user())
                    <th> <div class="divLayout">
                   <a data-toggle="modal" href="#" id="addBrandModal" data-target="#addBrandModal_create" class="addButton">Добави Марка</a> 
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
                    <th class="thBackground th">Марки</th>
                    <th class="thBackground th">Действия</th>
                </tr>                
                </thead>
                
                <tbody>
                @foreach($brands as $brand)
                    <tr class="tr">             
                        <td class="td">
                            {{$brand->brand_name}}
                        </td>                      
                        <td class="td">
                            <a data-toggle="modal" href="#" data-target="#editBrandModal{{$brand->id}}" class="anchorBCButton">Редактирай</a>                            
                            <a data-toggle="modal" href="#" data-target="#deleteBrandModal{{$brand->id}}" class="anchorBCButton">Изтрий</a>                                                    
                        </td>
                    </tr>    
                    @include('editbrand')
                    @include('deletebrand')                  
                @endforeach
                </tbody>
            </table>
    
@include('addbrand')

</body>
</html>
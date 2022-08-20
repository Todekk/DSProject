<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body class="background">


<!-- Filters -->
@if(Auth::guest())
<h4>Изглежда, че не сте влезли с потребителски акаунт, <a href="{{ route('login') }}">влезте</a> в профила си или се <a href="{{ route('register') }}">регистрирайте</a>.</h4>
@endif
            <table>
                <tr>
                    <th><h2>Марки</h2></th>
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
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body class="background">   
<!-- Filters -->
@if(Auth::guest())
<h4 style="color:white">Изглежда, че не сте влезли с потребителски акаунт, <a style="color:white" href="{{ route('login') }}">влезте</a> в профила си или се <a style="color:white" href="{{ route('register') }}">регистрирайте</a>.</h4>
@endif
            <table>
                <tr>
                    <th><h2 style="color:white;">Категории</h2></th>
                    @if(Auth::user())
                    <th> <div class="divLayout">
                   <a data-toggle="modal" href="#" id="addImageModal" data-target="#addImageModal_create" class="addButton">Добави категория</a> 
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
                    <th class="thBackground th">Категория</th>
                    <th class="thBackground th">Действия</th>
                </tr>                
                </thead>
                
                <tbody>
                @foreach($images as $image)
                    <tr class="tr">
                        <td class="td"><img src="{{$image->url}}" width="200px"></td>                    
                        <td class="td">
                            <a data-toggle="modal" href="#editImageModal{{$image->id}}" id="showEditModal" class="anchorBCButton">Редактирай</a>                            
                            <a data-toggle="modal" href="#" data-target="#deleteImageModal{{$image->id}}" class="anchorBCButton">Изтрий</a>                                                    
                        </td>
                    </tr>    
                               
                @endforeach
                </tbody>
            </table>
@include('editimage')
@include('deleteimage')      
@include('addimage')


</body>
</html>
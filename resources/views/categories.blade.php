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
                    <th><h2>Категории</h2></th>
                    @if(Auth::user())
                    <th> <div class="divLayout">
                   <a data-toggle="modal" href="#" id="addCategoryModal" data-target="#addCategoryModal_create" class="addButton">Добави категория</a> 
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
                @foreach($categories as $category)
                    <tr class="tr">             
                        <td class="td">
                            {{$category->category_name}}
                        </td>                      
                        <td class="td">
                            <a data-toggle="modal" href="#" data-target="#editCategoryModal{{$category->id}}" class="anchorBCButton">Редактирай</a>                            
                            <a data-toggle="modal" href="#" data-target="#deleteCategoryModal{{$category->id}}" class="anchorBCButton">Изтрий</a>                                                    
                        </td>
                    </tr>    
                    @include('editcategory')
                    @include('deletecategory')                  
                @endforeach
                </tbody>
            </table>
    
@include('addcategory')

</body>
</html>
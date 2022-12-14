<!DOCTYPE html>
<html>
<head>
<title>Categories</title>
</head>
<body class="background">
<!-- Nav Bar-->
@if(Auth::user())
<ul class="navul">
<li class="navli" style="float:right; background-color: rgb(32, 32, 32);">
    <p style="font-weight:bold;font-size:15px;">Здравей, {{Auth::user()->name}}!</p>
</li>
  <li class="navli"><a class="button" href="/dashboard">Артикули</a></li>
  <li class="navli"><a class="button" href="/brands">Марки</a></li>
</ul>
@endif
@if(Auth::guest())
<h4 style="color:white">Изглежда, че не сте влезли с потребителски акаунт, <a style="color:white" href="{{ route('login') }}">влезте</a> в профила си или се <a style="color:white" href="{{ route('register') }}">регистрирайте</a>.</h4>
@endif
            <table>
                <tr>
                    <th><h2 style="color:white;">Категории</h2></th>
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
                            <a data-toggle="modal" href="#editCategoryModal{{$category->id}}" id="showEditModal" class="anchorBCButton">Редактирай</a>
                            <a data-toggle="modal" href="#" data-target="#deleteCategoryModal{{$category->id}}" class="anchorBCButton">Изтрий</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
{{$categories->links()}}
@include('editcategory')
@include('deletecategory')
@include('addcategory')


</body>
</html>

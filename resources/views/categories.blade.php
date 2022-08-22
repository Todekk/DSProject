<!DOCTYPE html>
<html>
<head>
<title>Categories</title>
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
            <script>
            $(document).ready(function () {
      $('body').on('click', '#showEditModal', function(event) {
                event.preventDefault();

                    var anchor = $(this),
                            url = anchor.attr('href')
                        $.ajax({
                                url: url,
                            dataType: 'html', 
                            success: function(response) {
                                $('#task-table-body').html(response);
                            },
                            error: function (data){
                                    console.log(data);
                            }                           
                    });

                    $('#editCategoryModal').modal('show');
            });
        });
        </script>
@include('editcategory')
@include('deletecategory')      
@include('addcategory')


</body>
</html>
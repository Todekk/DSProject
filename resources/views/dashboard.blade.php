<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body class="background">

<div class="">
    <div class="">
        <div class="">
            <!-- Filter names and prices in ascending order -->
            <div class="">
                        <form action="/filterName" method="get">
                        {{ csrf_field() }}
                            <div class="divLayout"> 
                                <span class="">
                                        <button type="submit" class="button">Филтриране по име</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="divLayout">
                        <form action="/filterPrice" method="get">
                        {{ csrf_field() }}
                            <div class="divLayout"> 
                                <span class="">
                                        <button type="submit" class="button">Филтриране по цена</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <!-- Search Bar -->
                    <div class="">
                        <form action="/filterBySearch" method="get">
                            {{csrf_field()}}
                            <div class="">                            
                                <input type="filterBySearch" name="filterBySearch" class="" placeholder="Търси" style="border-style: solid; border-width: 3px;">
                                <span class="">
                                        <button type="submit" class="button">Търси</button>
                                </span>
                                
                            </div>
                        </form>
                    </div>
            <div class="divLayout">
                <h2>Aртикули</h2>
                <!-- Adding a new item -->
                <div class="divLayout">
                   <a data-toggle="modal" href="#" id="addModal" data-target="#addModal_create" class="addButton">Добави артикул</a>             
                   
                </div>
            </div>
            
            <!-- Display Information -->
            <table class="">
                <thead>
                <tr class="">
                    <th class="">Снимка</th>
                    <th class="">Артикул</th>
                    <th class="">Описание</th>
                    <th class="">Цена</th>
                    <th class="">Действия</th>
                </tr>                
                </thead>
                
                <tbody>
                @foreach($items as $item)
                    <tr class="">     
                        <td class="td"><img src="{{$item->url}}" width="200px"></td>               
                        <td class="td">
                            {{$item->itemName}}
                        </td>
                        <td class="td">
                            {{$item->description}}
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
            
        </div>
    </div>
</div>
@include('add')

</body>
</html>
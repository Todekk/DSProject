<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <!-- Filter names and prices in ascending order -->
            <div class="flex-auto text-left mt-2">
                        <form action="/filterName" method="get">
                        {{ csrf_field() }}
                            <div class="input-group"> 
                                <span class="input-group-prepend">
                                        <button type="submit" class="rounded border border-blue-400 bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Filter by name</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="flex-auto text-left mt-2">
                        <form action="/filterPrice" method="get">
                        {{ csrf_field() }}
                            <div class="input-group"> 
                                <span class="input-group-prepend">
                                        <button type="submit" class="rounded border border-blue-400 bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Filter by price</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <!-- Search Bar -->
                    <div class="flex-auto text-left mt-2">
                        <form action="/filterBySearch" method="get">
                            {{csrf_field()}}
                            <div class="input-group">                            
                                <input type="filterBySearch" name="filterBySearch" class="form-control" placeholder="Search" style="border-style: solid; border-width: 3px;">
                                <span class="input-group-prepend">
                                        <button type="submit" class="rounded border border-blue-400 bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Search</button>
                                </span>
                                
                            </div>
                        </form>
                    </div>
            <div class="flex">
                <div class="flex-auto text-2xl mb-4">Items List</div>
                <!-- Adding a new item -->
                <div class="flex-auto text-right mt-2">
                   <a data-toggle="modal" href="#" id="addModal" data-target="#addModal_create" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Add new item</a>             
                   
                </div>
            </div>
            
            <!-- Display Information -->
            <table class="w-full text-md rounded mb-4">
                <thead>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Picture</th>
                    <th class="text-left p-3 px-5">Item</th>
                    <th class="text-left p-3 px-5">Description</th>
                    <th class="text-left p-3 px-5">Price</th>
                    <th class="text-left p-3 px-5">Actions</th>
                    <th></th>
                </tr>                
                </thead>
                
                <tbody>
                @foreach($items as $item)
                    <tr class="border-b hover:bg-orange-100">     
                        <td><img src="{{$item->url}}" width="200px"></td>               
                        <td class="p-3 px-5">
                            {{$item->itemName}}
                        </td>
                        <td class="p-3 px-5">
                            {{$item->description}}
                        </td>
                        <td class="p-3 px-5">
                            {{$item->price}} lv.
                        </td>
                        <td class="p-3 px-5">
                            <a data-toggle="modal" href="#" data-target="#editModal{{$item->id}}" class="text-lg bg-green-500 hover:bg-green-700 text-black py-2 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>                            
                            <a data-toggle="modal" href="#" data-target="#deleteModal{{$item->id}}" class="mr-2 text-lg bg-red-500 hover:bg-red-700 text-black py-2 px-2 rounded focus:outline-none focus:shadow-outline">Delete</a>                                                    
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

</x-app-layout>
<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <div class="flex">
                <div class="flex-auto text-2xl mb-4">Items List</div>
                
                <div class="flex-auto text-right mt-2">
                    <a href="/item" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Add new Item</a>
                </div>
            </div>
            <table class="w-full text-md rounded mb-4">
                <thead>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Item</th>
                    <th class="text-left p-3 px-5">Description</th>
                    <th class="text-left p-3 px-5">Price</th>
                    <th class="text-left p-3 px-5">Actions</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach(auth()->user()->items as $item)
                    <tr class="border-b hover:bg-orange-100">
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
                            
                            <a href="/item/{{$item->id}}" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-black py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                            <form action="/item/{{$item->id}}" class="inline-block">
                                <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-black py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
</x-app-layout>
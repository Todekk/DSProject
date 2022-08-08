<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Item') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        
            <form method="POST" action="/item/{{ $item->id }}" enctype="multipart/form-data">
                 <div class="form-group">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="itemName" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$item->itemName }}</textarea>	
                    @if ($errors->has('itemName'))
                        <span class="text-danger">{{ $errors->first('itemName') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <textarea name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$item->description }}</textarea>	
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <textarea name="price" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$item->price }}</textarea>	
                    @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Update item</button>
                </div>
            {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
</x-app-layout>
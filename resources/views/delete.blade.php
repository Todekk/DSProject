@extends('layouts.modal')
@foreach($items as $item)
<!-- Modal -->
  <div class="modal fade" id="deleteModal{{$item->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 clas="modal-header">Delete Item</h2>
        </div>
        <div class="modal-body">
      <div class="modal-text">
        <h1>Are you sure that you want to delete this item ?</h1>
        <p>Once deleted the item is gone forever.</p>
        </div>
        <div class="modal-footer">
      <form action="/item/{{$item->id}}" class="inline-block" enctype="multipart/form-data">
             <button type="submit" name="delete" formmethod="POST" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">Delete</button>                
             <button type="button" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded" data-dismiss="modal">Close</button>
             {{ csrf_field() }}
       </form>
        </div>       
      </div>
    </div>
  </div>
</div>
<!--End modal-->
@endforeach

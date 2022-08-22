
@foreach($categories as $category)
<!-- Modal -->
  <div class="modal" id="deleteCategoryModal{{$category->id}}" role="dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:white;">
          <h2 clas="modal-header" style="color: red;">ВНИМАНИЕ!</h2>
        </div>
        <div class="modal-body">
      <div class="modal-text">
        <h1>Сигурни ли сте, че искате да изтриете тази категория ?</h1>
        <p>Веднъж изтритa, този категория е загубена завинаги.</p>
        </div>
        <div class="modal-footer">
      <form action="/category/{{$category->id}}" class="inline-block" enctype="multipart/form-data">
             <button type="submit" name="delete" formmethod="POST" class="button" style="background-color: red;">Изтрий</button>                
             <button type="button" class="button" data-dismiss="modal">Затвори</button>
             {{ csrf_field() }}
       </form>
        </div>       
      </div>
    </div>
  </div>
<!--End modal-->
@endforeach

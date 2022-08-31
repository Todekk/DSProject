
@foreach($images as $image)
<!-- Modal -->
  <div class="modal" id="deleteSecondaryImageModal{{$image->id}}" role="dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:white;">
          <h2 clas="modal-header" style="color: red;">ВНИМАНИЕ!</h2>
        </div>
        <div class="modal-body">
      <div class="modal-text">
        <h1>Сигурни ли сте, че искате да изтриете тази снимка ?</h1>
        <p>Веднъж изтритa, тaзи снимка е загубена завинаги.</p>
        </div>
        <div class="modal-footer">
      <form action="/itemimage/{{$image->id}}" class="inline-block" enctype="multipart/form-data">
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

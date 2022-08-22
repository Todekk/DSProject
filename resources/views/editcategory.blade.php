@foreach($categories as $category)
<!-- Modal -->
  <div class="modal" id="editCategoryModal{{$category->id}}" role="dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 clas="modal-header">Редактиране на категория</h2>
        </div>
        <div class="modal-body" id="task-table-body">
        <form method="POST" action="/category/{{ $category->id }}" enctype="multipart/form-data">
            <div class="form-group">
                    <textarea name="category_name">{{$category->category_name}}</textarea>  
                    @if ($errors->has('category_name'))
                        <span class="text-danger">{{ $errors->first('category_name') }}</span>
                    @endif
                </div>               

                <div class="modal-footer">  
                    <button type="submit" name="update" class="button">Обнови категория</button>                          
                    <button type="button" class="button" data-dismiss="modal">Затвори</button>        
                </div>
                {{ csrf_field() }}
            </form>
      
        </div>       
      </div>
    </div>
  </div>
<!--End modal-->
@endforeach
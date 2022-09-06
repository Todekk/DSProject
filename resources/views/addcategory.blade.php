
<!-- Modal -->
  <div class="modal" id="addCategoryModal_create" role="dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 clas="modal-header">Добавяне на категория</h2>
        </div>
        <div class="modal-body">
         <form id="addCatForm" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                    <input  name="category_name" placeholder='Въведете името на марката.'></input>
                    @if ($errors->has('category_name'))
                        <span class="text-danger">{{ $errors->first('category_name') }}</span>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="button">Добави Категория</button>
                    <button type="button" class="button" data-dismiss="modal">Затвори</button>
                </div>
                {{ csrf_field() }}
            </form>

        </div>
      </div>
    </div>

@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $('#addCatForm').on('submit', function(e){
        e.preventDefault();

        var headers = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        $.ajax({
            headers:headers,
            url: '/category',
            type: "POST",
            data:$(this).serialize(),
            success:function(data){
                alert("Успешно добавхите категория!")


            },
            error:function(data)
            {
                alert("Грешка при добавяне на категория!")
            }
        })
    });
</script>


<!--End modal-->

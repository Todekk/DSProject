@foreach($items as $item)
    <!-- Modal -->
    <div class="modal" id="itemPreview{{$item->id}}" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 clas="modal-header" style="color: white;">{{$item->itemName}}</h2>
                <img value="{{$item->mainimage_id}}" src="{{$item->image->url}}" width="200px">
            </div>
            <div class="modal-body">
                <table class="table">

                    <tbody>
                    <th class="thBackground th">Снимки</th>
                    <th><div class="divLayout">
                            <a data-toggle="modal" href="#" id="addSecondaryImageModal" data-target="#addSecondaryImageModal{{$item->id}}" class="addButton">Добави снимка</a>
                        </div></th>
                    <tr class="tr">
                        @foreach($item->itemimages as $itemimage)
                            <td class="td"><img value="{{$itemimage->item_id}}" src="{{$itemimage->url}}" width="200px"></td>
                        @endforeach
                        </tr>
                    <tr class="tr">
                        <th class="thBackground th">Описание</th>
                        <th class="thBackground th">Марка</th>
                        <th class="thBackground th">Категория</th>
                        <th class="thBackground th">Цена</th>
                    </tr>
                    <tr>
                        </td>
                        <td class="thBackground td">
                            {{$item->description}}
                        </td>
                        <td class="thBackground td">
                            {{$item->brand->brand_name}}
                        </td>
                        <td class="thBackground td">
                            {{$item->category->category_name}}
                        </td>
                        <td class="thBackground td">
                            {{$item->price}} lv.
                        </td>
                    </tr>

                    </tbody>
                </table>
                <div style="text-align: center;">
                    <button type="button" class="button" data-dismiss="modal">Затвори</button>
                </div>

            </div>
        </div>
    </div>

    <!--End modal-->

@endforeach


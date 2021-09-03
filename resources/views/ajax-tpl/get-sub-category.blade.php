<select name="category_id" >
    <option value="0">Выбирите подкатегорию</option>
    @foreach($subcategories as  $category)
        <option value="{{$category->id}}">{{$category->translate()->title}}</option>
    @endforeach
</select>

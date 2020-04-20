Product - edit
<form action="{{ route('api.products.edit') }}" method="post">
    <input style="width:400px" type="text" name="data" value='{"id":1, "name":"super", "categories":[1, 2]}'>
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    <input type="submit" name="submit" value="Submit">
</form>
<hr>
Product - new
<form action="{{ route('api.products.new') }}" method="post">
    <input style="width:400px" type="text" name="data" value='{"id":1, "name":"super", "categories":[1, 2]}'>
    {{ csrf_field() }}
    <input type="submit" name="submit" value="Submit">
</form>
<hr>
Category - edit
<form action="{{ route('api.categories.edit') }}" method="post">
    <input style="width:400px" type="text" name="data" value='{"id":1, "name":"super"}'>
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    <input type="submit" name="submit" value="Submit">
</form>
<hr>
Category - new
<form action="{{ route('api.categories.new') }}" method="post">
    <input style="width:400px" type="text" name="data" value='{"name":"super"}'>
    {{ csrf_field() }}
    <input type="submit" name="submit" value="Submit">
</form>

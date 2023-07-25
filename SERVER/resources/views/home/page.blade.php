<div>

    <h2> Products </h2>

    <p> {{ $data }}</p>


    <h2> add products </h2>

    <form action="/testing/add" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name">
        <input type="number" name="price">
        <input type="text" name="description">
        <input type="file" accept=".jpg,.jpeg,.bmp,.png,.gif" name="img" >

        <button type="submit"> add </button>


    </form>

    @if(session('messageadd'))

    <p> {{session('messageadd')}} </p>

    @endif


    <h2> update products </h2>

    <form action="/testing/update" method="post" enctype="multipart/form-data">
        @csrf
        <input type="number" name="id">
        <input type="text" name="name">
        <input type="number" name="price">
        <input type="text" name="description">
        <input type="file" accept=".jpg,.jpeg,.bmp,.png,.gif" name="img" >

        <button type="submit"> update </button>


    </form>

    @if(session('messageup'))

    <p> {{session('messageup')}} </p>

    @endif




</div>

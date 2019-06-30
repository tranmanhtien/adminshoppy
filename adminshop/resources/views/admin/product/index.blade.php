@extends("admin.layouts.layout")
@section("content")
    <div class="container">
        <h2>Danh sách sản phẩm</h2>
        <h3 ><a style="border: solid red 1px;" href="{{url("product/create")}}">Tạo sp</a></h3>
        <table class="table table-bordered" style="width:80%;">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>images</th>
                <th>slug</th>
                <th>description</th>
                <th>option</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $pd)
            <tr>
                <td>{{$pd->id}}</td>
                <td>{{$pd->product_name}}</td>
                <td>{{$pd->product_images}}</td>
                <td>{{$pd->product_slug}}</td>
                <td>{{$pd->product_description}}</td>
                <td><strong><a href="{{url('product/edit/'.$pd->id)}}">Cập nhập</a></strong>
                <br><strong><a href="{{url('product/delete/'.$pd->id)}}">Xóa</a></strong>
                </td>
            </tr>
           @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends('admin.master')
@section('title', 'Bảng đánh giá')
@section('main')

<form action="" method="GET" class="form-inline" role="form">
    <div class="form-group">
        <input class="form-control" name="keyword" placeholder="Input field">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
</form>
<br>
<table class="table table-hover">
    {{-- <i class="fa-solid fa-star"></i>
    <i class="fa-regular fa-star-half-stroke"></i>
    <i class="fa-regular fa-star"></i> --}}
    <thead>
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>5<i class="fa-solid fa-star" style="color: yellow ;"></i></th>
            <th>4<i class="fa-solid fa-star" style="color: yellow ;"></i></th>
            <th>3<i class="fa-solid fa-star" style="color: yellow ;"></i></th>
            <th>2<i class="fa-solid fa-star" style="color: yellow ;"></i></th>
            <th>1<i class="fa-solid fa-star" style="color: yellow ;"></i></th>
            <th>Trung bình</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $object)
        <tr>
            <td><b>{{$object->id}}</b></td>
            <td><b>{{$object->name}}</b></td>
            <td><a class="clk_5s" href="#">{{$object->_5s}}</a></td>
            <td><a class="clk_4s" href="#">{{$object->_4s}}</a></td>
            <td><a class="clk_3s" href="#">{{$object->_3s}}</a></td>
            <td><a class="clk_2s" href="#">{{$object->_2s}}</a></td>
            <td><a class="clk_1s" href="#">{{$object->_1s}}</a></td>
            <td>{{($object->_1s*1+$object->_2s*2+$object->_3s*3+$object->_4s*4+$object->_5s*5)/(($object->_1s+$object->_2s+$object->_3s+$object->_4s+$object->_5s)==0)?1:($object->_1s+$object->_2s+$object->_3s+$object->_4s+$object->_5s)}}</td>
            <td>
                <a href="{{ route('rate.edit', $object->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Ẩn</a>
            </td>  
        </tr>
        <tr class="5star">
            <td>5<i class="fa-solid fa-star" style="color: yellow ;"></td>
            <td>Người đánh giá</td>
            <td>Nội dung</td>
            <td>Ngày </td>
            <td>Trạng thái </td>
        </tr>
        @foreach($data_0 as $object1)
        @if ($object1->star == 5 && ($object->product_id == $object1->product_id))
        <tr class="5star">
            <td></td>
            <td>{{$object1->name}}</td>
            <td>{{$object1->content}}</td>
            <td>{{$object1->date}}</td>
            <td>{{($object1->status == '1')?'hiện':'ẩn';}}</td>
        </tr>
        @endif
        @endforeach
        <tr class="4star">
            <td>4<i class="fa-solid fa-star" style="color: yellow ;"></td>
            <td>Người đánh giá</td>
            <td>Nội dung</td>
            <td>Ngày </td>
            <td>Trạng thái </td>
        </tr>
        @foreach($data_0 as $object1)
        @if ($object1->star == 4 && ($object->product_id == $object1->product_id))
        <tr class="4star">
            <td></td>
            <td>{{$object1->name}}</td>
            <td>{{$object1->content}}</td>
            <td>{{$object1->date}}</td>
            <td>{{($object1->status == '1')?'hiện':'ẩn';}}</td>
        </tr>
        @endif
        @endforeach
        <tr class="3star">
            <td>3<i class="fa-solid fa-star" style="color: yellow ;"></td>
            <td>Người đánh giá</td>
            <td>Nội dung</td>
            <td>Ngày </td>
            <td>Trạng thái </td>
        </tr>
        @foreach($data_0 as $object1)
        @if ($object1->star == 3 && ($object->product_id == $object1->product_id))
        <tr class="3star">
            <td></td>
            <td>{{$object1->name}}</td>
            <td>{{$object1->content}}</td>
            <td>{{$object1->date}}</td>
            <td>{{($object1->status == '1')?'hiện':'ẩn';}}</td>
        </tr>
        @endif
        @endforeach
        <tr class="2star">
            <td>2<i class="fa-solid fa-star" style="color: yellow ;"></td>
            <td>Người đánh giá</td>
            <td>Nội dung</td>
            <td>Ngày </td>
            <td>Trạng thái </td>
        </tr>
        @foreach($data_0 as $object1)
        @if ($object1->star == 2 && ($object->product_id == $object1->product_id))
        <tr class="2star">
            <td></td>
            <td>{{$object1->name}}</td>
            <td>{{$object1->content}}</td>
            <td>{{$object1->date}}</td>
            <td>{{($object1->status == '1')?'hiện':'ẩn';}}</td>
        </tr>
        @endif
        @endforeach
        <tr class="1star">
            <td>1<i class="fa-solid fa-star" style="color: yellow ;"></td>
            <td>Người đánh giá</td>
            <td>Nội dung</td>
            <td>Ngày </td>
            <td>Trạng thái </td>
        </tr>
        @foreach($data_0 as $object1)
        @if ($object1->star == 1 && ($object->product_id == $object1->product_id))
        <tr class="1star">
            <td></td>
            <td>{{$object1->name}}</td>
            <td>{{$object1->content}}</td>
            <td>{{$object1->date}}</td>
            <td>{{($object1->status == '1')?'hiện':'ẩn';}}</td>
        </tr>
        @endif
        @endforeach
        @endforeach
    </tbody>
</table>

@stop
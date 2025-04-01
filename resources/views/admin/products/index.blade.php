@extends('layouts.admin')
@section('content')
    <div class="py-4">
        <a href="{{ url('products/create') }}" class="btn btn-primary mb-3">أضف منتج جديد</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم المنتج</th>
                    <th scope="col">الصنف</th>
                    <th scope="col">السعر</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">الأحداث</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>المنتج رقم {{ $loop->iteration }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>

                            <form action="{{ url('products/delete/'.$product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                            <a href="{{ url('products/edit/'.$product->id) }}" class="btn btn-info">تعديل</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$products->links()}}
    </div>
@endsection


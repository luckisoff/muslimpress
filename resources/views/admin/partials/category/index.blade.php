@extends('admin.app')
@section('content')
    <div class="col-md-12">
        <div class="listing-table">
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Common Name</th>
                        <th>Name in English</th>
                        <th>Name in Hindi</th>
                        <th>Created By</th>
                        <th>Cover</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($categories as $index=>$category)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->en}}</td>
                            <td>{{$category->hi}}</td>
                            <td>{{$category->admin->name}}</td>
                            <td>
                                <img src="{{$category->image}}" alt="" class="table-img img-responsive">
                            </td>
                            <td>
                                @if(isOwner($category->user_id) || isAdmin())
                                    <a href="{{route('admin.category.create', $category)}}" class="btn btn-warning">
                                        <span class="fa fa-edit"> Edit</span>
                                    </a>
                                    <a href="{{route('admin.category.delete', $category)}}" class="btn btn-danger"><span class="fa fa-trash"> Delete</span></a>
                                @else
                                    <span>Restricted</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7">No data available!</td></tr>
                    @endforelse
                </tbody>
                <tfoot>
                    {{$categories->links()}}
                </tfoot>
            </table>
        </div>
    </div>
@endsection
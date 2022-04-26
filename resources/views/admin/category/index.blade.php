 @extends('admin.layout.master')
 @section('title', trans('message.categoryAdmin'))
 @section('content')
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h3 class="page-title">{{ trans('message.category') }}</h3>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ trans('message.home') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ trans('message.category') }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if(Auth::user()->can('add-category'))
                        <a href="{{ route('category.create') }}">
                            {{ trans('message.createCategory') }}
                        </a>
                        @endif
                        <div class="">&nbsp</div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr class="btn-info">
                                    <th class=""> {{ trans('message.nameCategory') }}</th>
                                    <th class="">{{ trans('message.descriptionCategory') }}</th>
                                    <th class="">{{ trans('message.parent') }}</th>
                                    @if(Auth::user()->can('edit-category') || Auth::user()->can('remove-category'))
                                    <th class="">{{ trans('message.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $cate)
                                    <tr>
                                        <td>{{ $cate->name }}</td>
                                        <td>{{ $cate->description }}</td>
                                        <td>
                                            @if ($cate->parent_id == config('config.one'))
                                                {{ trans('message.foodsCategory') }}
                                            @elseif ($cate->id == config('config.one'))
                                                {{ trans('message.foodsCategory') }}
                                            @else
                                                {{ trans('message.dinksCategory') }}
                                            @endif
                                        </td>
                                        <td>
                                            @can('edit-category')
                                            <a href="{{ route('category.edit', $cate->id) }}"
                                                class="btn btn-warning ">
                                                <span class="fa fa-edit"> {{ trans('message.btnEdit') }}</span>
                                            </a>
                                            <a
                                                class="btn btn-warning editcategory">
                                                <span class="fa fa-edit"> {{ trans('message.btnEdit') }}</span>
                                            </a>
                                            @endcan
                                            @can('remove-category')
                                            <a data-id="{{ $cate->id }}" data-url="{{ route('category.destroy', $cate->id) }}"
                                                class=" delete btn btn-danger">
                                                <span class="fa fa-trash"></span>
                                                {{ trans('message.btnDelete') }}
                                            </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">{{ $category->links() }}</div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('category.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label > Tên loại sản phẩm</label>
                        <input type="text" class="form-control" name="name" placeholder="tên loại sản phẩm">
                    </div>
                    <div class="form-group">
                        <label >Mô tả loại sản phẩm </label>
                        <input type="text" class="form-control" name="description" placeholder="Mô tả">
                    </div>
                    <div class="form-group">
                        <label for="fname">
                            Thuộc loại sản phẩm
                        </label>
                            <select class="select2 form-control custom-select" name="parent"
                                value="{{old('parent')}}" required>
                                <option selected disabled>CHọn</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                            <span class=" alert-danger">{{ $errors->first('parent') }}</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save data</button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/category" method="POST" id="editForm">
                @method('PUT')
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label > Tên loại sản phẩm</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="tên loại sản phẩm">
                    </div>
                    <div class="form-group">
                        <label >Mô tả loại sản phẩm </label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Mô tả">
                    </div>
                    <div class="form-group">
                        <label for="fname">
                            Thuộc loại sản phẩm
                        </label>
                            <select class="select2 form-control custom-select" name="parent" id="parent" value="{{old('parent')}}" required>
                                <option selected disabled>CHọn</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                            <span class=" alert-danger">{{ $errors->first('parent') }}</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


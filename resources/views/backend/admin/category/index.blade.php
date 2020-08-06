@extends('backend.layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Category Management</h4>
                <div class="card-header-action">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                      Add Category
                  </button>
              </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table align-items-center table-hover" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th width="10%">No</th>
                            <th>Nama Category</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td> </td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <form action="{{ route('category.delete', $category->slug) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <a type="button" class="btn btn-warning" href="{{ route('category.edit', $category->slug) }}">Edit
                                  </a>
                                  <button type="submit" class="btn btn-danger" href="{{ route('category.delete', $category->slug) }}">Delete</button>
                                <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal">Delete
                                </button> -->
                              </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">New Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Kategori</label>
                <input name= "name" type="text" class="form-control" id="nama" autofocus="">
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus {{ $category->name }}?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        yakin ingin menghapus?
      </div>
      <div class="modal-footer">
        <form action="{{ route('category.delete', $category->slug) }}" method="post">
            @csrf
            @method('delete')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editcategory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Kategori</label>
                <input name= "name" type="text" class="form-control" id="nama" value="{{ old('name') ?? $category->name }}" autofocus="">
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
</div>
</div>
</div>
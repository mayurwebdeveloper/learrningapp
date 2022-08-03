@extends('layouts.AdminLTE.index')

@section('content')

<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">	
<div class="pull-right">
    <a class="btn btn-success"  title="Create a Category" href="{{ route('category.create') }}"> <i class="fa fa-plus"></i>
        </a>
</div></div></div>
        <div class="row">
            
            <div class="col-md-12">	
               
                <div class="table-responsive">
                    <table id="tabelapadrao" class="table table-condensed table-bordered table-hover">
                        <thead>
                            <tr>			 
                                <th>No</th>
                                <th>Name</th>
                                <th>description</th>
                                <th>Date Created</th>
                                <th>Actions</th>			 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->created_at }}</td>
                                
                                <td>
                                    <a class="btn btn-warning  btn-xs" href="{{ route('image.bulkupdate') }}?category_id={{ $category->id }}" title="Edit {{ $category->name }}"><i class="fa fa-cloud-upload"></i></a>
                                       
                                        <a class="btn btn-warning  btn-xs" href="{{ route('category.edit',$category->id) }}" title="Edit {{ $category->name }}"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger  btn-xs" href="#" title="Delete {{ $category->name}}" data-toggle="modal" data-target="#modal-delete-{{ $category->id }}"><i class="fa fa-trash"></i></a>
                                        <div class="modal fade" id="modal-delete-{{ $category->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 class="modal-title"><i class="fa fa-warning"></i> Caution!!</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you really want to delete ({{ $category->name }}) ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                                        <a href="{{ route('category.destroy', $category->id) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @csrf
                                        @method('DELETE')
                
                                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                            <i class="fas fa-trash fa-lg text-danger"></i>
                                        </button> --}}
                                    {{-- </form> --}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>		 
                                <th>No</th>
                                <th>Name</th>
                                <th>description</th>
                                <th>Date Created</th>
                                <th>Actions</th>			 
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>				
            <div class="col-md-12 text-center">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>  


@endsection
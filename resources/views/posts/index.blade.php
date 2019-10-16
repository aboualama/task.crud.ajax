@extends('layouts.app')

@section('content')

    <div class="block block-rounded block-bordered ">
        <div class="block-header block-header-default"><h3 class="block-title">Posts</h3>
            <div class="block-options">
                <div class="block-options-item"><code></code></div>
            </div> 
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter  js-dataTable-buttons1">
                <thead> 
                <div class="btn-group">
                    <a onclick="addnew()" target="_blank" data-toggle="modal" data-target="#modal-block-large">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" title="delete">Add New Post</button> 
                    </a>
                </div>
                <th class="text-center">#</th>
                <th class="text-center">Short</th>
                <th class="text-center">Title</th>
                <th class="text-center">Content</th>
                <th class="text-center">Category</th> 
                <th class="text-center">Action</th>


                </thead>
                <tbody>
                  @foreach($posts as $post)
                    <tr class="tr{{$post->id}} text-center">
                        <th class="font-w600 text-xinspire-darker" id="table_id_{{$post->id}}">{{$post->id}}</th>
                        <th class="font-w600 text-xinspire-darker" id="table_short_{{$post->id}}">{{$post->short}}</th> 
                        <th class="font-w600 text-xinspire-darker" id="table_title_{{$post->id}}">{{$post->title}}</th> 
                        <th class="font-w600 text-xinspire-darker" id="table_content_{{$post->id}}">{{$post->content}}</th> 
                        <th class="font-w600 text-xinspire-darker" id="table_category_{{$post->id}}">{{$post->category}}</th> 
                 

                       <td class="text-center">
                            <div class="btn-group">
                                <a onclick="edit({{$post->id}})" target="_blank" data-toggle="modal"
                                   data-target="#modal-block-edit">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                            title="Edit"><i class="fas fa-pencil-alt"></i></button>
                                </a>
                                <a onclick="destroy('{{$post->id}}',this)" target="_blank" data-toggle="modal"
                                        data-target="#confirmModal">
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                            title="delete"><i class="fa fa-trash"></i></button>
                                </a>
                            </div>
                        </td>
                    </tr>
                   @endforeach   
                </tbody>
            </table>
        </div>
    </div>

 

<!--Add Modal -->
<div class="modal fade" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
            <div id="createContent"> 
            </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="addpost()" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
</div>

 
<!--Edit Modal -->
<div class="modal fade" id="modal-block-edit" tabindex="-1" role="dialog" aria-labelledby="modal-block-edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
            <div id="editContent"> 
            </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="updatepost()" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
</div>

 
<!--Delete Modal -->
<div id="confirmModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-block-edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">  Are you sure? </div> 
       
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary" id="ok">Delete</button>
                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
            </div>
        </div>
    </div>
</div>

@endsection 
 

   <script> 

        function addnew() { 
            $.ajax({
                    url: "{{route('post.create')}}",
                    method: "GET",
                    success: function (resp) {
                        $('#createContent').html(resp);

                    }
                });
        }

        function edit(id) { 
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: "GET",
                url: '/post/' + id + '/edit',
                success: function (data) {
                    $('#editContent').html(data); 
                }
            }); 
        }


        function destroy(id, el) {
           
            $('#ok').on('click', function (e) {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',
                    url: '/post/' + id,
                    data: {
                        _method: "DELETE",
                    },
                    success: function (data) {  
                        el.closest('tr').remove();
                    }

                });
            });
        }


    </script> 


 
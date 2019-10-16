


 
    <div class="form-group">
        <label for="short">Short</label>
        <input type="text" class="form-control" id="short" name="short" placeholder="Short"> 
      </div>
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
      </div> 
      <div class="form-group">
        <label for="content">Content</label>
        <input type="text" class="form-control" id="content" name="content" placeholder="Content">
      </div> 
      <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" id="category" name="category" placeholder="Category">
      </div> 
   
      
   
      
 
<script> 
 
    function addpost() {  

        var short = $('#short').val(); 
        var title = $('#title').val();
        var content = $('#content').val();
        var category = $('#category').val();
        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            url: '{{route('post.store')}}',
            data: { 
                'short': short,
                'title': title,
                'content': content,
                'category': category,
            },
            success: function (data) {
                $('#modal-block-large').modal('toggle');  
                t = $('.js-dataTable-buttons1 tbody');   
                t.append([           
                '<tr class="tr' + data.id + '">',
                '<th class="font-w600 text-xinspire-darker text-center" id ="table_id_"' + data.id + '>' + data.id + '</th>',
                '<th class="font-w600 text-xinspire-darker text-center" id ="table_short_"' + data.id + '>' + data.short + '</th>',
                '<th class="font-w600 text-xinspire-darker text-center" id ="table_title_"' + data.id + '>' + data.title + '</th>',
                '<th class="font-w600 text-xinspire-darker text-center" id ="table_content_"' + data.id + '>' + data.content + '</th>' , 
                '<th class="font-w600 text-xinspire-darker text-center" id ="table_category_"' + data.id + '>' + data.category + '</th>',  
                '<th class="font-w600 text-xinspire-darker text-center" >' + 
                    '<a onclick="edit(' + data.id + ')" target="_blank" data-toggle="modal" data-target="#modal-block-edit">' +
                        '<button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></button> </a>' +
                    '<a onclick="destroy(' + data.id + ',this)"> <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" title="delete"><i class="fa fa-trash"></i></button> </a>' + 
                '</th> </tr>',
                ]);
 
                $('#createContent').html('');

            }
        });
    } 

</script> 
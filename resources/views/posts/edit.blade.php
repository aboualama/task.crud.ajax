<input type="hidden" id="Id" value="{{$post->id}}">



 
    <div class="form-group">
        <label for="short">Short</label>
        <input type="text" class="form-control" id="short" value="{{$post->short}}" name="short" placeholder="Short"> 
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" value="{{$post->title}}" name="title" placeholder="Title">
    </div> 
    <div class="form-group">
        <label for="content">Content</label>
        <input type="text" class="form-control" id="content" value="{{$post->content}}" name="content" placeholder="Content">
    </div> 
        <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" id="category" value="{{$post->category}}" name="category" placeholder="Category">
    </div> 
       
          
       
          
     
    <script> 
     
        function updatepost() {  
    
            var short = $('#short').val(); 
            var title = $('#title').val();
            var content = $('#content').val();
            var category = $('#category').val();
            var id = $('#Id').val();
            
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/post/' + id,
                data: {
                    _method: "PUT",
                    'short': short,
                    'title': title,
                    'content': content,
                    'category': category,
                },
                success: function (data) {
                    $('#modal-block-edit').modal('toggle');    
                    $("#table_short_" + id).text('');  
                    $("#table_short_" + id).text(short);
                    $("#table_title_" + id).text(title);
                    $("#table_content_" + id).text(content);
                    $("#table_category_" + id).text(category);
    
                }
            });
        } 
    
    </script> 
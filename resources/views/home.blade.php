@extends('layouts.app')

@section('content')



<table class="table">
    <caption>List of users</caption>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td> 
                <a href=" " class="btn btn-info btn-sm"><i class="far fa-edit"></i> @lang('site.edit')</a>
         
                <a href="#" class="btn btn-info btn-sm disabled"><i class="far fa-edit"></i> @lang('site.edit')</a>
           
                <form action=" " method="post" style="display: inline-block">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                </form><!-- end of form -->
          
                <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
            
        </td>
      </tr>  
    </tbody>
  </table>





@endsection('content')
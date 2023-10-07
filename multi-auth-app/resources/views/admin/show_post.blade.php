<!DOCTYPE html>
<html>
  <head> 

    <style  type="text/css">
    
    .title-deg{
        padding: 30px;
        font-size: 30px;
        color: white;
        font-weight: bold;
        text-align: center;
    }

    .table_deg{
        border: 1px solid white;
        width: 80%;
        text-align: center;
        margin-left: 70px;
    }

    .th_deg{

        background-color: skyblue;

    }

    .img_deg{
       height: 100px;
       width: 150px;
       padding: 10px; 
    }
    </style>
    
    @include('admin.css')
     </head>
  <body>

    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      
      

            <div class="page-content">

                @if(session()->has('message'))

                <div class="alert alert-danger">

                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                {{session()->get('message')}}

                </div>

                @endif
                
                <div class="title-deg">All Post</div>

                <table class="table_deg">

                    <tr class="th_deg">
                        <th>Post title</th>
                        <th>Description</th>
                        <th>Post by</th>
                        <th>Post Status</th>
                        <th>UserType</th>
                        <th>Image</th>
                        <th>Delete</th>
                    </tr>
           
                    @foreach ($post as $post)
                        <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->post_status}}</td>
                        <td>{{$post->usertype}}</td>
                        <td>
                            <img class="img_deg" src="postimage/{{$post->image}}" alt="">
                        </td>

                        <td>
                            <a href="{{url('delete_post',$post->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to Delete This?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>

                    
        {{-- footer --}}
      @include('admin.footer')
  </body>
</html>
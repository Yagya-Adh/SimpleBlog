<!DOCTYPE html>
<html>
  <head> 

    {{-- Sweet Alert CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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
                        <th>Edit</th>
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
                            <a 
                                href="{{url('delete_post',$post->id)}}"
                                 class="btn btn-danger"
                                 {{-- onclick="return confirm('Are you sure to Delete This?')" --}}

                                 onclick="confirmation(event)"
                            >
                                Delete
                            </a>
                        </td>


                        <td>
                            <a 
                            href="{{url('edit_page',$post->id)}}" 
                            class="btn btn-success"
                            >
                            Edit
                        </a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>

                    
        {{-- footer --}}
      @include('admin.footer')
  </body>



  <script type="text/javascript">

    function confirmation(ev){

        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('href');

        console.log(urlToRedirect);

        swal({
            title:"Are you sure to delete this ?", 
            text:"You won't be able to revert this delete",
            icon:"warning",
            buttons:true,
            dangerMode:true,
        })
        .then((willCancel)=>{
         
            if(willCancel){

                window.location.href= urlToRedirect;

            }
        });
    }
  </script>



</html>
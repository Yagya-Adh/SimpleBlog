<!DOCTYPE html>
<html>
  <head> 
<style type="text/css">
.post_title{
    font-size: 30px;
    font-weight: bold;
    text-align: center;
    padding: 30px;
    color: white;
}


.div_center{
    text-align: center;
    padding: 30px;
}


label{
display: inline-block;
width: 200px;
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

                {{-- success message alert --}}
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button  type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{ session()->get('message')}}
                </div>
                @endif


                   <h1 class="post_title"> Add Post</h1> 

                   <div>

                        <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="div_center">
                                <label for="">Post Title</label>
                                <input type="text" name="title" id="">
                            </div>

                            <div class="div_center">
                                <label for="">Post Title</label>
                                <textarea name="description"></textarea>

                            </div>

                             <div class="div_center">
                                <label for="">Add Image</label>
                                <input type="file" name="image" id="">
                            </div>

                            <div class="div_center">

                                <input type="submit" class="btn btn-primary">
                            </div>

                        </form>
                   </div>
            </div>
        
        {{-- footer --}}
      @include('admin.footer')
  </body>
</html>
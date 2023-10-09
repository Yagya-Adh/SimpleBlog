<!DOCTYPE html>
<html lang="en">
   <head>

    <style type="text/css">
        
    .div_deg{

        text-align: center;
    }    


     .title_deg{
        font-size: 30px;
        font-weight: bold;
        padding: 30px;
    }


    label{

    display: inline-block;
    width: 200px;
    font-size: 18px;

    }

    .field_deg{
        padding: 20px;

    }

    </style>

      <!-- basic -->
   @include('home.homecss')
   
    </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
       
      </div>


      <div class="div_deg">
                <h3 class="title_deg">Add Post</h3>

        <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data" >

                @csrf

            <div class="field_deg">
                <label>Title</label>
                <input type="text" name="title">
            </div>

             <div class="field_deg">
                <label>Description</label>
                <input type="text" name="description">
            </div>

             <div class="field_deg">
                <label>Add Image</label>
                <input type="file" name="image">
            </div>

             <div class="field_deg">
                 
                <input class="btn btn-secondary " type="submit" value="Add Post">
            </div>
        </form>
      </div>




      
      <!-- blog section start -->
      @include('home.footer')
      <!-- blog section end -->
      
      
       </body>
</html>
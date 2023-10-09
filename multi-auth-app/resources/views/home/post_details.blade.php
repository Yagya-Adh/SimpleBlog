<!DOCTYPE html>
<html lang="en">
   <head>

    <base href="/public" >
      <!-- basic -->
   @include('home.homecss')
   
    </head>
   <body>
      <!-- header section start -->
        <div class="header_section">
         @include('home.header')
          
     
                  <div style="text-align: center;"  class="col-md-12" >
                    
                    <div>
                        <img style="padding: 20px; height:400px; width:550px; margin:auto" src="/postimage/{{$post->image}}" class="services_img">
                    </div>
                  
                  <h3 class="text-white"><b>{{$post->title}}</b></h3>
                  
                  <h4 class="text-white">{{$post->description}}</h4>
                 
                  <p>Post by <b>{{$post->name}}</b></p>
                  </div>
        </div>
             

      
      <!-- blog section start -->
      @include('home.footer')
      <!-- blog section end -->
           
       </body>
</html>
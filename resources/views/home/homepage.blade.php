<!DOCTYPE html>
<html lang="en">
   <head>
     @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         <!-- banner section start -->
         @include('home.banner')
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- services section start -->
         @include('home.service')
      <!-- services section end -->
      <!-- about section start -->
         @include('home.about')
      <!-- about section end -->
      <!-- blog section start -->
      
      <!-- blog section end -->
      
      <!-- client section start -->
      <!-- choose section start -->
      
      <!-- choose section end -->
      <!-- footer section start -->
      @include('home.footer')
      <!-- footer section end -->
      <!-- copyright section start -->
      
   </body>
</html>
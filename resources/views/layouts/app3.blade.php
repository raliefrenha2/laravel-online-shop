<!DOCTYPE html>
<html>
  @include('parts.head')
  <body>
    <!-- navbar-->
    @include('parts.header')
    <div id="all">
      <div id="content">
        @include('parts.content')
      </div>
    </div>
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    @include('parts.footer')
   
    
    
    
    <!-- JavaScript files-->
    <script src="{{ asset('vendor/obaju') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('vendor/obaju') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/obaju') }}/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="{{ asset('vendor/obaju') }}/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="{{ asset('vendor/obaju') }}/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="{{ asset('vendor/obaju') }}/js/front.js"></script>
  </body>
</html>
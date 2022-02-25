<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> Powered by <a href="https://www.easyclicknt.com/">eClick Technologies</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('public/assets/js/stisla.js') }}"></script>
  <!-- JS Libraies -->
  <script src="{{ asset('node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('node_modules/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('node_modules/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('node_modules/summernote/dist/summernote-bs4.js') }}"></script>
  <script src="{{ asset('node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="{{ asset('public/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/plugins-init/datatables.init.js') }}"></script>
   <! ----------------extra----------------------->
	<script src="{{ asset('public/vendor/chart.js/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('public/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
	  
    <script src="{{ asset('public/vendor/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('public/vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('public/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/vendor/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('public/vendor/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('public/vendor/flot-spline/jquery.flot.spline.min.js') }}"></script>
	
	<!-- Chart sparkline plugin files -->
    <script src="{{ asset('public/vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('public/assets/js/plugins-init/sparkline-init.js') }}"></script>
	
	<!-- Apex Chart -->
	<script src="{{ asset('public/vendor/apexchart/apexchart.js') }}"></script>
	
	<!-- Chart piety plugin files -->
    <script src="{{ asset('public/vendor/peity/jquery.peity.min.js') }}"></script>
   <!----------------extra-------------------->
  <!-- Template JS File -->
  <script src="{{ asset('public/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('public/assets/js/custom.js') }}"></script>
  <script src="{{ asset('public/assets/js/id_script.js') }}"></script>
  <script src="{{ asset('public/assets/js/fnon.min.js') }}"></script>


  <!-- Page Specific JS File -->
  <script src="{{ asset('public/assets/js/page/index.js') }}"></script>
  <script src="{{ asset('public/assets/js/page/dashboard.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('public/assets/js/page/components-table.js') }}"></script>
    <script src="{{ asset('public/assets/js/page/modules-ion-icons.js') }}"></script>

    <script>
    $(document).ready(function(){

     //searc script
  $('#search-input').keyup(function() {   
    var text = $(this).val();
   
             $.ajax({  
                  url:"{{URL::to('/')}}/admin/search/"+text,  
                  type:"get",  
                  success:function(data)  
                  {  
                   
                      $('.search-result').html(data);
              
                  }  
             });  
         
    
   }); 
        
    })
    
    </script>
</body>
</html>

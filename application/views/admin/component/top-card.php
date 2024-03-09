 <!-- Earnings (Monthly) Card Example -->
 <div class="col-xl-3 col-md-6 mb-4" id="">
     <div class="card border-left-primary shadow h-100 py-2">
         <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Total Teachers <div id="total_teachers"></div>
                     </div>
                 </div>
                 <div class="col-auto">
                     <i class="fas fa-user-md fa-2x text-gray-300"></i>
                 </div>
             </div>
         </div>
     </div>
 </div>

<!-- Earnings (Monthly) Card Example -->
 <div class="col-xl-3 col-md-6 mb-4" id="">
     <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                          </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                      Total Pages  <div id="total_pages"></div>
                     </div>
                 </div>
                 <div class="col-auto">
                     <i class="fas fa-users fa-2x text-gray-300"></i>
                 </div>
             </div>
         </div>
     </div>
 </div>

  <!-- Earnings (Monthly) Card Example -->
 <div class="col-xl-3 col-md-6 mb-4" id="">
     <div class="card border-left-info shadow h-100 py-2">
         <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                          
                     </div>
                     <div class="row no-gutters align-items-center">
                         <div class="col-auto">
                             <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                Total Posts  <div id="total_post"></div>
                             </div>
                         </div>
                        
                     </div>
                 </div>
                 <div class="col-auto">
                     <i class="fas fa-clock fa-2x text-gray-300"></i>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Pending Requests Card Example -->
 <div class="col-xl-3 col-md-6 mb-4" id="">
     <div class="card border-left-warning shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
                         <div class="col-auto">
                             <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                Total Navbars  <div id="total_navbar"></div>
                             </div>
                         </div>
                        
                     </div>
         </div>
     </div>
 </div>

<script>
    const SERVER = '<?= base_url() ?>';
    const _TOTAL_TEACHERS_ = SERVER+'admin/total_teachers';
    const _TOTAL_PAGE_ = SERVER+'admin/total_page';
    const _TOTAL_POST_ = SERVER+'admin/total_post';
    const _TOTAL_NAVBAR_ = SERVER+'admin/total_navbar';
  
    Vony({
		url: _TOTAL_TEACHERS_,
		method: 'POST',
		data: {
			_token: ''
		}
	}).ajax($response => {
	    var obj = JSON.parse($response);
	    if (obj){
	        console.log(obj.data);
	        document.getElementById('total_teachers').innerHTML = obj.data;
	    }
	    
	})
	 Vony({
		url: _TOTAL_PAGE_,
		method: 'POST',
		data: {
			_token: ''
		}
	}).ajax($response => {
	    var obj = JSON.parse($response);
	    if (obj){
	        console.log(obj.data);
	        document.getElementById('total_pages').innerHTML = obj.data;
	    }
	    
	})
	 Vony({
		url: _TOTAL_POST_,
		method: 'POST',
		data: {
			_token: ''
		}
	}).ajax($response => {
	    var obj = JSON.parse($response);
	    if (obj){
	        console.log(obj.data);
	        document.getElementById('total_post').innerHTML = obj.data;
	    }
	    
	})
	 Vony({
		url: _TOTAL_NAVBAR_,
		method: 'POST',
		data: {
			_token: ''
		}
	}).ajax($response => {
	    var obj = JSON.parse($response);
	    if (obj){
	        console.log(obj.data);
	        document.getElementById('total_navbar').innerHTML = obj.data;
	    }
	    
	})
</script>
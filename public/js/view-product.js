function viewProduct(slug)
{
    $.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	    }
	  });

	// console.log(slug);

   	jQuery.ajax({
    	url: "/product/" + slug,
    	type: 'get',
    	contentType: "application/json; charset=utf-8",
      	success: function(result){

      		var base_url = window.location.origin;
      		$('#modal-product-description').html(
      			"<center><img src="+base_url+"/products/"+result.filename+" style='border-radius:10px; max-width:100%; height:auto;'></center>" + 
      			"<p style='margin-top:20px;font-weight:700;'>"+result.name+"</p>" +
      			"<p style='margin-top:8px;'>"+result.description+"</p>" +
      			"<p style='font-size:12px;'><i>Dibuat pada tanggal "+result.updated_at+"<i></p>"
      		);
        	// console.log(result);
      	}
    });
}

function searchProduct()
{
  var keyword = $('#search').val();

  // alert(keyword);
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });

// console.log(slug);

  jQuery.ajax({
    url: "/filter/" + keyword,
    type: 'get',
    contentType: "application/json; charset=utf-8",
      success: function(result){
        $('#search-info').html("<h2><center>"+result.message+"</center></h2>");
        document.getElementById('filter-products').innerHTML = "";

        var section = document.querySelector('#search_button');

        if ( $('[data-section="' + section.dataset.navSection + '"]').length ) {
          $('html, body').animate({
            scrollTop: $('[data-section="' + section.dataset.navSection + '"]').offset().top - 75
          }, 500, 'easeInOutExpo');
        }

        if ($('body').hasClass('offcanvas')) {
          $('body').removeClass('offcanvas');
          $('.js-ubea-nav-toggle').removeClass('active');
        }
        // event.preventDefault();
        // return false;


        if(!isEmpty(result.data)){

          Object.keys(result.data).forEach(function (item) {
            document.getElementById('filter-products').innerHTML +=
              '<div class="col-md-3 mb-4">' +
                '<div class="col-md-12 card">' +
                    '<figure><img src="products/'+result.data[item].filename+'" alt="Image" class="image-responsive" style="height:auto; max-width: 100%; border-radius: 10px;"></figure>' + 
                    '<h4 style="font-weight: 700; color: #666; "><center>'+result.data[item].name+'</center></h4>' + 
                    '<p style="font-size: 10px"><center>'+result.data[item].description.substring(0,150)+'</center></p>' +
                    '<div style="color:#666; font-size: 14px; font-weight: 600;"><center>Mulai dari</center></div>' + 
                    '<h3 class="price-card">Rp 20.000,-</h3>' + 
                    "<center><button class='btn btn-primary' onclick='viewProduct("+JSON.stringify(result.data[item].slug)+")' id='viewProductButton' data-toggle='modal' data-target='#viewProduct'>Lihat</button></center>" +
                '</div>'+
            '</div>'
            ;
          });
        }
      },
      error: function(error){
        console.log(error);
      }
  });
}

function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}


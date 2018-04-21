/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function(){
	$(".animsition").animsition({
	  inClass: 'fade-in',
      outClass: 'fade-out-right',
	});
	
	$(document).on('submit','#form',function(e){
		e.preventDefault();
		//get the url to submit to
		url = $('#form').attr('action');
		$.ajax({
			type: "POST",
			url: url,
			data: $("#form").serialize(), // serializes the form's elements.
			success: function(data)
			{
				toastr.options = {
				  "closeButton": false,
				  "debug": false,
				  "newestOnTop": false,
				  "progressBar": false,
				  "positionClass": "toast-top-full-width",
				  "preventDuplicates": false,
				  "onclick": null,
				  "showDuration": "300",
				  "hideDuration": "1000",
				  "timeOut": "5000",
				  "extendedTimeOut": "1000",
				  "showEasing": "swing",
				  "hideEasing": "linear",
				  "showMethod": "slideDown",
				  "hideMethod": "slideUp"
				}
				
				if ( data == 'OK' ) {
					toastr.success('Message was delivered successfully');
				}else{
					toastr.error('Message was not delivered. Please fill out form properly');
				}
			}
		});
		return false;
		
	});
	
	$("html").niceScroll({
		zindex:999,
		cursorborder:"",
		cursorborderradius:"2px",
		cursorcolor:"#191919",
		cursoropacitymin:.5
	});
	  
      function initNice() {
        if($(window).innerWidth() <= 960) {
          $('html').niceScroll().remove();
        } else {
          $("html").niceScroll({zindex:999,cursorborder:"",cursorborderradius:"2px",cursorcolor:"#191919",cursoropacitymin:.5});
        }
      }
        

        $('a[href^="#"]').on('click', function(event){
          var target = $(this.getAttribute('href'));
          if ( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
              scrollTop: target.offset().top
            }, 1000);
          }
        });
	
     $('.form_time').datetimepicker({
         language:  'En',
         weekStart: 1,
         todayBtn:  1,
		 autoclose: 1,
	 	todayHighlight: 1,
	 	startView: 1,
	 	minView: 0,
	 	maxView: 1,
	 	forceParse: 0
    });
	
	$('.form_date').datetimepicker({
         language:  'En',
         weekStart: 1,
         todayBtn:  1,
	 	autoclose: 1,
	 	todayHighlight: 1,
	 	startView: 2,
	 	minView: 2,
	 	forceParse: 0
    });
	
	
    
		
		
	

});


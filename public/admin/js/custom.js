function deleterow(tr) {
    var empTab = document.getElementById('custom-edittable');
    empTab.deleteRow(tr.parentNode.parentNode.rowIndex);
    grand_total();
}
function getitemArray() {
    var myTab = document.getElementById('custom-edittable');
    
    var arrValues = Array.from(myTab.rows).slice(1).map(function(row) {
        var rowValue = Array.from(row.cells).reduce(function(result, cell, index) {
            var element = cell.childNodes[0];
            if (element.getAttribute('EditInput') === 'custom-edit') {
                result[element.name] = element.value;
            }
            return result;
        }, {});
        return rowValue;
    });

    var itemsArray = { data: arrValues };
    return JSON.stringify(itemsArray);
}


function convertNumberToWords(amount) {
  var words = new Array();
  words[0] = '';
  words[1] = 'One';
  words[2] = 'Two';
  words[3] = 'Three';
  words[4] = 'Four';
  words[5] = 'Five';
  words[6] = 'Six';
  words[7] = 'Seven';
  words[8] = 'Eight';
  words[9] = 'Nine';
  words[10] = 'Ten';
  words[11] = 'Eleven';
  words[12] = 'Twelve';
  words[13] = 'Thirteen';
  words[14] = 'Fourteen';
  words[15] = 'Fifteen';
  words[16] = 'Sixteen';
  words[17] = 'Seventeen';
  words[18] = 'Eighteen';
  words[19] = 'Nineteen';
  words[20] = 'Twenty';
  words[30] = 'Thirty';
  words[40] = 'Forty';
  words[50] = 'Fifty';
  words[60] = 'Sixty';
  words[70] = 'Seventy';
  words[80] = 'Eighty';
  words[90] = 'Ninety';
  amount = amount.toString();
  var atemp = amount.split(".");
  var number = atemp[0].split(",").join("");
  var n_length = number.length;
  var words_string = "";
  if (n_length <= 9) {
      var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
      var received_n_array = new Array();
      for (var i = 0; i < n_length; i++) {
          received_n_array[i] = number.substr(i, 1);
      }
      for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
          n_array[i] = received_n_array[j];
      }
      for (var i = 0, j = 1; i < 9; i++, j++) {
          if (i == 0 || i == 2 || i == 4 || i == 7) {
              if (n_array[i] == 1) {
                  n_array[j] = 10 + parseInt(n_array[j]);
                  n_array[i] = 0;
              }
          }
      }
      value = "";
      for (var i = 0; i < 9; i++) {
          if (i == 0 || i == 2 || i == 4 || i == 7) {
              value = n_array[i] * 10;
          } else {
              value = n_array[i];
          }
          if (value != 0) {
              words_string += words[value] + " ";
          }
          if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
              words_string += "Crores ";
          }
          if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
              words_string += "Lakhs ";
          }
          if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
              words_string += "Thousand ";
          }
          if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
              words_string += "Hundred and ";
          } else if (i == 6 && value != 0) {
              words_string += "Hundred ";
          }
      }
      words_string = words_string.split("  ").join(" ");
  }
  return words_string;
}
(function($) {
	
    "use strict";

	/*===========================================================================
      *
      *  FULL SCREEN TOGGLE BUTTON
      *
      *============================================================================*/
	$("#fullscreen-button").on("click", function toggleFullScreen() {
		
      if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
		  $('#fullscreen-icon').removeClass('fa-expand');
		  $('#fullscreen-icon').addClass('fa-compress');
        if (document.documentElement.requestFullScreen) {
          document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
          document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (document.documentElement.msRequestFullscreen) {
          document.documentElement.msRequestFullscreen();
        }

      } else {

		$('#fullscreen-icon').addClass('fa-expand');
		$('#fullscreen-icon').removeClass('fa-compress');
        if (document.cancelFullScreen) {
          document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
          document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
      }
    })



	/*===========================================================================
      *
      *  PAGE LOADING EFFECT
      *
      *============================================================================*/
	$(window).on("load", function(e) {
		$("#preloader").delay(0).fadeOut("slow");
	})



	/*===========================================================================
      *
      *  SCROLL TO TOP BUTTON
      *
      *============================================================================*/
	$(window).on("scroll", function(e) {
    	if ($(this).scrollTop() > 0) {
            $('#back-to-top').fadeIn('slow');
        } else {
            $('#back-to-top').fadeOut('slow');
        }
    });
    $("#back-to-top").on("click", function(e){
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });



	/*===========================================================================
      *
      *  GLOBAL SEARCH
      *
      *============================================================================*/
	$(document).on("click", "[data-toggle='search']", function(e) {
		var body = $("body");

		if(body.hasClass('search-gone')) {
			body.addClass('search-gone');
			body.removeClass('search-show');
		}else{
			body.removeClass('search-gone');
			body.addClass('search-show');
		}
	});
	var toggleSidebar = function() {
		var w = $(window);
		if(w.outerWidth() <= 1024) {
			$("body").addClass("sidebar-gone");
			$(document).off("click", "body").on("click", "body", function(e) {
				if($(e.target).hasClass('sidebar-show') || $(e.target).hasClass('search-show')) {
					$("body").removeClass("sidebar-show");
					$("body").addClass("sidebar-gone");
					$("body").removeClass("search-show");
				}
			});
		}else{
			$("body").removeClass("sidebar-gone");
		}
	}
	toggleSidebar();
	$(window).resize(toggleSidebar);



	/*===========================================================================
      *
      *  NOTIFICATION ALERTS
      *
      *============================================================================*/
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(4000, function(){
			$(this).remove(); 
		});
	}, 7000);



	/*===========================================================================
      *
      *  SIMPLEBAR INITIALIZATION
      *
      *============================================================================*/
	$(document).ready(function(){
		
		if (document.getElementById('scrollbar')) {
			var scrollbar = document.getElementById('scrollbar');
			new SimpleBar(scrollbar);
		  }
		
	});



  /*===========================================================================
      *
      *  PROMOCODE APPLY AT CHECKOUT
      *
      *============================================================================*/
	$('#prepaid-promocode-apply').on('click', function(e) {
		
		e.preventDefault()

		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type: "POST",
			url: $('#payment-form').attr('promocode'),
			data: $('#payment-form').serialize(),

			success: function(data) {
				if (data['error']) {
					document.getElementById('promocode-error').classList.remove("d-none");
					document.getElementById('promocode-error').innerHTML = data['error'];	
				} else {
					document.getElementById('promocode-error').classList.add("d-none");
					document.getElementById('voucher-result').classList.remove("d-none");
					document.getElementById('total_payment').innerHTML = data['total'];
					document.getElementById('total_discount').innerHTML = data['discount'];
					document.getElementById('hidden_value').value = data['total'];
				}
			},
			error: function(data) {
				console.log(data)	
							
			}
		}).done(function(data) {})
	});


})(jQuery);

(function($) {
    "use strict";
    $('#modal-confirm').on('show.bs.modal', function (e) {
        const button=$(e.relatedTarget);
        const message=button.attr('data-message');
        const method=button.attr('data-method')?button.attr('data-method'):'post';
        const action=button.attr('data-action');
        const input=JSON.parse(button.attr('data-input'));
        let div='';
        $.each(input,function(index,value){
            div+=`<input type="hidden" name=${index} value=${value}>`;
        });

        $('#modal-confirm .modal-body').html(message);
        $('#modal-form').attr('method',method).attr('action',action);
        $('#modal-form #customInput').html(div);
        $('#modal-confirm-btn').attr('type','submit');
    })
})(jQuery);

function toggleSection(from,to){
    "use strict";
    $(from).hide();
    $(to).show();

}

function notify(type,message) {
    "use strict";
    $(document).Toasts('create', {
        autohide: true,
        delay: 3000,
        class: 'bg-'+type,
        title: 'Notification',
        body: message
    })
}

function remove_readonly(e) {
    "use strict";
    e.removeAttribute('readonly');
}




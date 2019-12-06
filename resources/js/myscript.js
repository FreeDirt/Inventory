class Myscript {
    constructor() {
     this.init();
    }
   
    init() {
      console.info( 'App Initialized' );

      // Sidebar Toggle
      $('#btn-tog').click( function() {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
        $('#btn-tog').toggleClass('active');
      });

      // DASHBOARD CLOCK
      jQuery(function($){
        if (!$('#clock').length) return;
          // Analog Clock
        var d, h, m, s, hdeg, ampm;
        function adjustClock(){
          d = new Date();
          h = d.getHours() > 12 ? d.getHours() - 12 : d.getHours()
          m = d.getMinutes();
          s = d.getSeconds();
          
          hdeg = h*30 + m/2;
          if(h > 12){ampm = "AM";} else { ampm = "PM";}
          hh.style.transform = "rotate("+hdeg+"deg)";
          mh.style.transform = "rotate("+m*6+"deg)";
          sh.style.transform = "rotate("+s*6+"deg)";
          meridiem.innerHTML = h+":"+m+":"+s+" "+ampm;

        }

        window.addEventListener("load", function(){
          this.setInterval(adjustClock, 1000);
        });
      });// DASHBOARD CLOCK


      // READY FUNCTION
      $(document).ready(function(){
        
          // SHOW/HIDE MENU IF ACTIVE SIDEBAR LIST ITEMS
          if($(".user-profile-settings").hasClass('active')) {
            $(".user-profile-settings").show();
          }
          else {
            $(".user-profile-settings").hide(); 
          }

          if($(".inventory-menu-settings").hasClass('active')) {
            $(".inventory-menu-settings").show();
          }
          else {
            $(".inventory-menu-settings").hide(); 
          }

          if($(".employee-menu-settings").hasClass('active')) {
            $(".employee-menu-settings").show();
          }
          else {
            $(".employee-menu-settings").hide(); 
          }

          // ARROW TOGGLE SIDEBAR MENU

          $("#btn-profile").click(function(){
              $(".user-profile-settings").slideToggle();
              $(".user-profile-settings").toggleClass('active');
              $('#myprofile').toggleClass('arrow-rotated');
          });
      
          $(".toggle-btn-menu").click(function(){
              $(".inventory-menu-settings").slideToggle();
              $(".inventory-menu-settings").toggleClass('active');
              $('#inv-tog-icon').toggleClass('arrow-rotated');
          });

          $(".toggle-btn-menu-emp").click(function(){
              $(".employee-menu-settings").slideToggle();
              $(".employee-menu-settings").toggleClass('active');
              $('#emp-tog-icon').toggleClass('arrow-rotated');
          });


          // DYNAMIC ON CHANGE CATEGORY STOCK
           $(document).ready(function() {
        $('select[name="devcat"]').on('change', function() {
            var devcatID = $(this).val();
            if(devcatID) {
                $.ajax({
                    url: '/stock/ajax/'+devcatID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="device_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="device_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="device_id"]').empty();
            }
        });
    });
          // $('#deviceCat').on('change',function(){
          //     // console.log("123");
          //     var cat_id = $(this).val();
          //     // console.log(cat_id);
          //     $.ajax({
          //       type: 'get',
          //       url:'stock',
          //       data:{'id':cat_id},
          //       success:function(data){
          //           console.log('success');
          //       },
          //       error:function(data){

          //       }
          //     });
          // });

         


      }); // READY FUNCTION

                // SELECT OPTION

                /*
          Reference: http://jsfiddle.net/BB3JK/47/
          */

          // $('select').each(function(){
          //       var $this = $(this), numberOfOptions = $(this).children('option').length;

          //       $this.addClass('select-hidden'); 
          //       $this.wrap('<div class="select"></div>');
          //       $this.after('<div class="select-styled"></div>');

          //       var $styledSelect = $this.next('div.select-styled');
          //       $styledSelect.text($this.children('option').eq(0).text());

          //       var $list = $('<ul />', {
          //           'class': 'select-options'
          //       }).insertAfter($styledSelect);

          //       for (var i = 0; i < numberOfOptions; i++) {
          //           $('<li />', {
          //               text: $this.children('option').eq(i).text(),
          //               rel: $this.children('option').eq(i).val()
          //           }).appendTo($list);
          //       }

          //       var $listItems = $list.children('li');

          //       $styledSelect.click(function(e) {
          //           e.stopPropagation();
          //           $('div.select-styled.active').not(this).each(function(){
          //               $(this).removeClass('active').next('ul.select-options').hide();
          //           });
          //           $(this).toggleClass('active').next('ul.select-options').toggle();
          //       });

          //       $listItems.click(function(e) {
          //           e.stopPropagation();
          //           $styledSelect.text($(this).text()).removeClass('active');
          //           $this.val($(this).attr('rel'));
          //           $list.hide();
          //           //console.log($this.val());
          //       });

          //       $(document).click(function() {
          //           $styledSelect.removeClass('active');
          //           $list.hide();
          //       });

          //     });
          
          // document.getElementById('pagination').onchange = function() {
          //   window.location = "{{URL::route('stock')}}?items=" + this.value;
          // };
      
    }
   }
   
   export default Myscript;
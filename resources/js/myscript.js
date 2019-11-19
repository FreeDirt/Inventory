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
      });

      $(document).ready(function(){
        
        if($(".user-profile-settings").hasClass('active')) {
          $(".user-profile-settings").show();
        }
        else {
          $(".user-profile-settings").hide(); 
        }
    
        $("#btn-profile").click(function(){
            $(".user-profile-settings").slideToggle();
            $(".user-profile-settings").toggleClass('active');
            $('#myprofile').toggleClass('arrow-rotated');
        });
    });
      
    }
   }
   
   export default Myscript;
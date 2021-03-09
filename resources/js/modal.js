class Modal {

    constructor() {
     this.init();
    }

    init() {

        console.info( 'App Initialized 2' );
        
        // Get modal element
        var importModal = document.getElementById('importModal');
        // Get open modal button
        var modalimport = document.getElementById('modalimport');
        // Get close button
        // var closeBtn = document.getElementById('closeBtn');
        // var closeBtn = document.getElementsByClassName('closeModalBtn')[0];

        $('#importModal').click(function(){
          // alert(this.id);
            importModal.style.display = 'block';
        });

        $('#modalimport').click(function(){
          // alert(this.id);
            importModal.style.display = 'block';
        });

        // $('.modalImport').click(function(){
        //   // alert(this.id);
        //   importModal.style.display = 'none';
        // });


        // listen for click
        // modalimport.addEventListener('click', openModal);
        //function to open modal
        // function openModal() {
        //     importModal.style.display = 'flex';
        // }
        // // listen for click close btn
        // closeBtn.addEventListener('click', closeModal);
        // //function to close modal
        // function closeModal() {
        //     importModal.style.display = 'none';
        // }

        // // Get the modal
        // var modal = document.getElementById("myModal");

        // // Get the button that opens the modal
        // var btn = document.getElementById("myBtn");

        // // Get the <span> element that closes the modal
        // var span = document.getElementsByClassName("close")[0];

        // // When the user clicks the button, open the modal 
        // btn.onclick = function() {
        //   modal.style.display = "block";
        // }

        // // When the user clicks on <span> (x), close the modal
        // span.onclick = function() {
        //   modal.style.display = "none";
        // }

        // // When the user clicks anywhere outside of the modal, close it
        // window.onclick = function(event) {
        //   if (event.target == modal) {
        //     modal.style.display = "none";
        //   }
        // }

        // var clickMe = document.getElementsByClassName('clickMe')[0];
        // var clickMe = document.getElementById('test');

        // // listen for click
        // clickMe.addEventListener('click', getImage());
        // //function to open modal
        // function getImage() {
        //     // importModal.style.display = 'flex';
        //     alert(this.id);
        // }
        var mdlwindow = document.getElementById('open-modal');
        
        $('.clickMe').click(function(){
            // alert(this.id);
            $('#img-id').val(this.id).trigger('change');
            mdlwindow.style.visibility = "hidden";
        });

        $('#mdlopen').click(function(){
          mdlwindow.style.visibility = "visible";
        });
        


        // TABLE SORTING
        // $.noConflict();
        // jQuery( document ).ready(function( $ ) {
        //     $('#table_id').DataTable();
        // });
        

        $(document).ready( function () {
          // if($('#table_id').length >0 )
            $('#table_id').DataTable();
        } );

        $(document).ready( function () {
          if($('#tabledata').length >0 )
          $('#tabledata').DataTable();
      } );
          


      // END
    }
}

export default Modal;
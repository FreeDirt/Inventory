class Modal {

    constructor() {
     this.init();
    }

    init() {
        
        // Get modal element
        var importModal = document.getElementById('importModal');
        // Get open modal button
        var modalimport = document.getElementById('modalimport');
        // Get close button
        var closeBtn = document.getElementsByClassName('closeModalBtn')[0];
        // listen for click
        modalimport.addEventListener('click', openModal);
        //function to open modal
        function openModal() {
            importModal.style.display = 'flex';
        }
        // listen for click close btn
        closeBtn.addEventListener('click', closeModal);
        //function to close modal
        function closeModal() {
            importModal.style.display = 'none';
        }

    }
   
}

export default Modal;
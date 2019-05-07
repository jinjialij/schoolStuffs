$('#chatButton').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)
    modal.find('.modal-body input')//.val(chat)
})
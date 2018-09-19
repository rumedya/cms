$(document).ready(function(){

    $(".remove-btn").click(function(){
        var $data_url = $(this).data("url");

        swal({
            title: 'Emin misiniz?',
            text: "Bu işlemi geri alamayacaksınız!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText: 'Hayır'
        }).then((result) => {
            if (result.value) {
                window.location.href = $data_url;
            }
        })
    });

});
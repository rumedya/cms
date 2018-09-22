$(document).ready(function(){

    $(".sortable").sortable();

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

    $(".isActive").change(function () {
        var $data       = $(this).prop("checked");
        var $data_url   = $(this).data("url");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){

            $.post($data_url, {data : $data}, function(response){
            });
        }
    });

    $(".sortable").on("sortupdate", function(event, ui){

        var $data       = $(this).sortable("serialize");
        var $data_url   = $(this).data("url");

        $.post($data_url, {data: $data}, function(response){})

    });

    var uploadSection = Dropzone.forElement("#dropzone");

    uploadSection.on("complete", function(){
        alert();
    });


});
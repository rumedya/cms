$(document).ready(function(){
    $(".news_type_select").change(function(){
        if($(this).val() === "image"){
            $(".image_upload_container").fadeIn();
            $(".video_url_container").hide();
            $(".video_url").val("");
        }
        else if($(this).val() === "video"){
            $(".video_url_container").fadeIn();
            $(".image_upload_container").hide();
            $(".img_url").val("");;
        }
    });
});
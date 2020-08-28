function volumeToggle(button){

    var muted =$(".previewVideo").prop("muted");
    $(".previewVideo").prop("muted",!muted);

    $(button).find("i").toggleClass("fas fa-volume-mute");
    $(button).find("i").toggleClass("fas fa-volume-up");

}

function previewEnded(){
    $(".previewVideo").toggle();
    $(".previewImage").toggle();
    
}
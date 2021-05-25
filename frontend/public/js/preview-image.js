function previewClick() {
    if ($(".imagem-secundaria-popup").hasClass("hide")) {
        $(".imagem-secundaria-popup").removeClass("hide");
        $(".imagem-secundaria-popup").addClass("display");

        $(".fundo-popup").removeClass("hide");
        $(".fundo-popup").addClass("display");
    }
}

function popupClose() {
    if ($(".imagem-secundaria-popup").hasClass("display")) {

        $(".imagem-secundaria-popup").removeClass("display");
        $(".imagem-secundaria-popup").addClass("hide");

        $(".fundo-popup").removeClass("display");
        $(".fundo-popup").addClass("hide");
    }
    if ($(".video-popup").hasClass("display")) {

        $(".video-popup").removeClass("display");
        $(".video-popup").addClass("hide");

        $(".fundo-popup").removeClass("display");
        $(".fundo-popup").addClass("hide");
    }
}

function chooseVideo() {
    if ($(".video-popup").hasClass("hide")) {
        $(".video-popup").removeClass("hide");
        $(".video-popup").addClass("display");

        $(".imagem-secundaria-popup").removeClass("display");
        $(".imagem-secundaria-popup").addClass("hide");
    }
}
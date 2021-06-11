function projetoEscolherPasta() {
    if ($(".projetoPastaOpcoes").hasClass("hide")) {
        $(".projetoPastaOpcoes").removeClass("hide");
        $(".projetoPastaOpcoes").addClass("display");
    }
    else{
        if ($(".projetoPastaOpcoes").hasClass("display")) {
            $(".projetoPastaOpcoes").removeClass("display");
            $(".projetoPastaOpcoes").addClass("hide");
        }
    }
}
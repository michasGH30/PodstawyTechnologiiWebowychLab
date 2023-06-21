$(document).ready(function () {
    //alert("Strona załadowała się!!!!");
    // https://stackoverflow.com/a/11085618
    $('#header').append('<h1>Witaj na stronie!</h1>').delay(3000).queue(function (next) {
        $(this).slideUp();
        next();
    });
})

let widocznosc = true;

$("#widocznosc").click(function () {
    if (widocznosc) {
        $("#potrawy").hide();
        widocznosc = false;
    }
    else {
        $("#potrawy").show();
        widocznosc = true;
    }

});

$("#czcionka").click(function () {
    $(".kolorki").css("color", $("#kolory").val());
});

$("#tlo").click(function () {
    $(".kolorki").css("background-color", $("#kolory").val());
});

$("#bad").click(function () {
    $("#zyczenia").removeClass("good");
    $("#zyczenia").addClass("bad");
});

$("#good").click(function () {
    $("#zyczenia").removeClass("bad");
    $("#zyczenia").addClass("good");
});

// https://stackoverflow.com/questions/979662/how-can-i-detect-pressing-enter-on-the-keyboard-using-jquery
$("#wstaw").on("keypress", function (e) {
    if (e.which == 13) {
        $("#zmiana_tekstu").text($("#wstaw").val());
        $("#wstaw").val("");
    }
});

$("#galeria").on("click", "img", function () {
    $("#big_img").attr("src", $(this).attr("src"));
});

$("#dodaj").click(function () {
    $("#lista").append("<li>" + $("#rzecz").val() + "</li>");
    $("#rzecz").val("");
});
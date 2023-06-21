$(document).ready(function () {
    $(".fav").on("click", function () {
        const obrazek = $(this);
        $.post("changeFav.php", { idDzbana: "'" + $(this).data("dzban") + "'" }, function (data) {
            if (data == "sukces") {
                obrazek.attr('src', (obrazek.atrr('src') == "images/heart_full.jpg") ? "images/heart_empty.jpg" : "images/heart_full.jpg");
                // if (obrazek.attr('src') == "images/heart_full.jpg") {
                //     obrazek.attr('src', "images/heart_empty.jpg");
                // }
                // else {
                //     obrazek.attr('src', "images/heart_full.jpg");
                // }
            }
        });
    });
});
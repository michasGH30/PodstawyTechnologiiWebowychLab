$(document).ready(function () {
    $("#sendMessage").on("click", function () {
        let message = $("#message").val();
        $.post("footerQuery.php", { data: message }, function (data) {
            if (data == "sukces") {
                alert("Twoja wiadomość została pomyślnie wysłana.");
            }
            else {
                alert("Twoja wiadomość nie została pomyślnie wysłana.");
            }
        });
    });
});
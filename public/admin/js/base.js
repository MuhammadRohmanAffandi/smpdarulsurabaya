$(function () {
    $(".subnavbar")
        .find("li")
        .each(function (i) {
            var mod = i % 3;

            if (mod === 2) {
                $(this).addClass("subnavbar-open-right");
            }
        });
});

$(document).on("click", ".open-AddBookDialog", function () {
    var myBookId = $(this).data("id");
    $(".modal-body #bookId").val(myBookId);
    console.log(myBookId);
});

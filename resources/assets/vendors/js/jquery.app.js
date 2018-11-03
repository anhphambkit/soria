"use strict";

function slimScroll_menu() {
    $(".slimscroll-menu").slimscroll({
        height: "auto",
        position: "right",
        size: "8px",
        color: "#9ea5ab",
        wheelStep: 5
    })
}
slimScroll_menu();

$(".slimscroll").slimscroll({
    height: "auto",
    position: "right",
    size: "8px",
    color: "#9ea5ab"
})
$("#side-menu").metisMenu()
$(".button-menu-mobile").on("click", function(a) {
    a.preventDefault(),
        $("body").toggleClass("enlarged"),
        slimScroll_menu()
})
$(window).width() < 1025 ? $("body").addClass("enlarged") : 1 != $("body").data("keep-enlarged") && $("body").removeClass("enlarged")
$("#sidebar-menu a").each(function() {
    this.href == window.location.href && ($(this).addClass("active"),
        $(this).parent().addClass("active"),
        $(this).parent().parent().addClass("in"),
        $(this).parent().parent().prev().addClass("active"),
        $(this).parent().parent().parent().addClass("active"),
        $(this).parent().parent().parent().parent().addClass("in"),
        $(this).parent().parent().parent().parent().parent().addClass("active"))
})
$(window).resize(function(event) {
	slimScroll_menu();

});
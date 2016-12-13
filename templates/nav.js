$(function() {
    //Hide and show the nav
    $('.toggleNav').click(function(e) {
        e.preventDefault();
        toggleNav();
    });

    //Hide and show dropdown menus
    $('.toggleDrop').click(function(e) {
        e.preventDefault();
        if ($(this).children("i").hasClass("fa-caret-down")) {
            $(this).children("i").removeClass("fa-caret-down").addClass("fa-caret-up");
        } else {
            $(this).children("i").removeClass("fa-caret-up").addClass("fa-caret-down");
        }
        var targetDropdown = $(this).data("for");
        var $targetDropdown = $("#" + targetDropdown);
        $targetDropdown.toggleClass("offScreenTop");
    });

    //Hide navigation when overlay is clicked
    $("#overlay").click(function(e) {
        toggleNav();
    });
});

function toggleNav() {
    $('.sideNav').toggleClass('offScreenRight');
    $("#overlay").toggleClass("offScreenRight");
}
$(document).ready(function () {
    $(".draggable-col img").draggable({
        revert: "invalid",
        refreshPositions: true,
        drag: function (event, ui) {
            ui.helper.addClass("draggable");
        },
        stop: function (event, ui) {
            ui.helper.removeClass("draggable");
            var image = this.src.split("/")[this.src.split("/").length - 1];
            if ($.ui.ddmanager.drop(ui.helper.data("draggable"), event)) {
                alert(image + " dropped.");
            }
            else {
                alert(image + " not dropped.");
            }
        }
    });
    $(".wishlist-col").droppable({
        drop: function (event, ui) {
            if ($(".wishlist-col img").length === 0) {
                $(".wishlist-col").html("");
            }
            ui.draggable.addClass("dropped");
            $(".wishlist-col").append(ui.draggable);
        }
    });
});
$(document).ready(function () {
    $(".draggable-col").draggable({
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
            if ($(".wishlist-col").length == 0) {
            if ($(".wishlist-col img").length === 0) {
                $(".wishlist-col").html("");
            }
            ui.draggable.addClass("dropped");
            $(".wishlist-col").append(ui.draggable);
        }
    });

    $("#reinitialiser").click(function(){
        location.reload();
    });

    $("#envoyer").click(function(){
        var i = 0;
        var data = [];

        $(".wishlist-col").find(".draggable-col").each(function(){
            data.push({
                'id':$(this).find(".hidden-id").val(),
                'name':$(this).find(".hidden-name").val(),
                'description':$(this).find(".hidden-description").val(),
                'price':$(this).find(".hidden-sale-price").val(),
            });
            i++;
        });

        $.ajax({
            type: 'POST',
            datatype: 'json',
            data: {postData:data},
            url: '/lettre.html',
            success: function(){
                localtion.href('/accueil.html');
            },
            error: function(e){
                alert(e.message);
            }
        });
    });
});
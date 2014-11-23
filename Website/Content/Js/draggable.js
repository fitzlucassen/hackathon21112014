$(document).ready(function () {
    $(".draggable-col").draggable({        
        revert: "invalid",
        refreshPositions: true,
        drag: function (event, ui) {
            ui.helper.addClass("draggable");
        },
        stop: function (event, ui) {
            ui.helper.removeClass("draggable");

            var img = $(this).find(".hidden-img");
            var id = img.parent().attr('id');
            img.attr("id", id);

            img.click(function(){
                var idToRemove = $(this).attr('id');

                var htmlToBind = '';
                $(".wishlist-col").find(".draggable-col").each(function(){
                    if ($(this).attr('id') === idToRemove) {
                        htmlToBind = $(this);
                        $(this).remove();
                    }
                });

                htmlToBind.removeClass('dropped').addClass('ui-draggable').css('top','auto').css('left','auto');
                htmlToBind = htmlToBind.prepend(img.clone());
                $('.gift-list').append(htmlToBind);
                $(this).remove();
            });

            $(img).appendTo('.wishlist-visible');
        }
    });

    $(".wishlist-col").droppable({
        drop: function (event, ui) {
            if ($(".wishlist-col").length === 0) {
                $(".wishlist-col").html("");
            }
            ui.draggable.addClass("dropped");
            $(".wishlist-col").append(ui.draggable);
        }
    });

    $("#reinitialiser").click(function(){
        $(".wishlist-visible").find("img").each(function(){
            $(this).remove();
        });
        $(".wishlist-col").find(".draggable-col").each(function(){
            $(this).remove();
        });
    });

    $("#envoyer").click(function(e){
        var i = 0;
        var data = [];

        e.stopPropagation();
        e.preventDefault();
        $(".wishlist-col").find(".draggable-col").each(function(){
            data.push({
                'id':$(this).attr('id'),
                'name':$(this).find(".hidden-name").val(),
                'description':$(this).find(".hidden-description").val(),
                'price':$(this).find(".hidden-price").val(),
                'imageUrl':$('img#' + $(this).attr('id')).attr('src')
            });
            i++;
        });

        $.ajax({
            type: 'POST',
            datatype: 'json',
            data: {postData:data},
            url: '/lettre.html',
            success: function(){
                // localtion.href('/accueil.html');
            },
            error: function(e){
                alert(e.message);
            }
        });
    });
});
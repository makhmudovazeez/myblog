$('.custom-file-input').on('change',function(){
    var fileName = $(this).val();

    fileName = fileName.substring(fileName.lastIndexOf('\\') + 1, fileName.length);
    $(this).next('.form-control-file').addClass("selected").html(fileName);
});

$(document).on({
    click:function(){
        var rate = $(this).data('rate');
        var place = $(this).data('place');

        var _this = this;

        $.ajax({
            method: "POST",
            url: "/catalog/rate",
            data: { place_id: place, rate: rate }
        })
        .done(function( r ) {
            var result = JSON.parse(r);

            if (result.status == 'success') {
                $(_this).prevAll().removeClass ("fa-star-o");
                $(_this).nextAll().removeClass ("fa-star-o");
                $(_this).prevAll().addClass ("fa-star rated");
                $(_this).nextAll().addClass ("fa-star-o rated");
                $(_this).removeClass("fa-star-o");
                $(_this).addClass("fa-star rated");

                $(_this).parent('div').next().find('.rating-in-points').text(rate);

            } else {
                alert (result.message);
            }

            console.log (result.message);
        });
    }
}, '.featured-places-list .featured-places-item-rate i');

$(document).on('click', '.featured-places-list .like a', function(){
    var place_id = $(this).data('place');
    var _this = this;

    $.ajax({
        method: "POST",
        url: "/catalog/favorite",
        data: { place_id: place_id }
    })
        .done(function( r ) {
            var result = JSON.parse(r);

            if (result.status == 'added') {
                $(_this).find('i').removeClass('fa-heart-o');
                $(_this).find('i').addClass('fa-heart');

            } else if (result.status == 'deleted'){
                $(_this).find('i').removeClass('fa-heart');
                $(_this).find('i').addClass('fa-heart-o');
            }

            console.log (result.message);
        });

    return false;
});

var more = function (){
    var current = $('ul.pagination');

    $(current).find('li.active').removeClass('active').next ().addClass('active');

    return false;
};
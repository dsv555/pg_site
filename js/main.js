$(document).ready((function() {

    $(window).on('resize', function() {
        var sliders = $(".why-slick,.get-slick,.reviews-slick");
        if ($(window).width() < 768) {
            if (sliders.hasClass('slick-initialized')) {
                sliders.slick('unslick')
            }
            sliders.slick({
                mobileFirst: !0,
                slidesToShow: 1,
                dots: !0,
                arrows: !1
            })
        } else {
            if (sliders.hasClass('slick-initialized')) {
                sliders.slick('unslick')
            }
        }
    }).trigger('resize')

    $(".text-toggle").click((function() {
        return $(this).siblings(".text").toggleClass("hide"), $(this).siblings(".text").hasClass("hide") ? $(this).html("показать полностью") : $(this).html("скрыть"), !1
    }))

    $('.modal').on('click', function() {
        $(this).fadeOut(300)
    })

    $('[href="#modal"]').on('click', function() {
        $('.modal_form').show()
        $('.modal__message').hide()
        $('.modal').fadeIn(300)
    })

    $('.modal_form,.modal__message').on('click', function(event) {
        event.stopPropagation()
    })

    $('.modal_form').on('submit', function() {
        var action = $(this).attr('action')
        var data = $(this).serialize()
        $.post(action, data).then(function() {
            $('.modal_form').hide()
            $('.modal_form input').val('')
            $('.modal__message').show()
            setTimeout(function() {
                $('.modal').fadeOut(300)
            }, 3000)
        })
        return false;
    });
}))

window.onload = function() {

    function runLiner (el) {
        var _w = $(el).width() / 3
        el.animate({
            left: '-' + _w + 'px'
        }, $(window).width() > 768 ? 40000 : 15000, "linear", function() {
            el.css('left', 0)
            runLiner(el)
        })
    }

    $('.b-marquee-line__flow-block').each(function() {
        var _w = 0;
        $(this).find('.b-marquee-line__flow-item').each(function() {
            var _mr = getComputedStyle(this)
            _w += $(this).width() + parseFloat(_mr["margin-right"]);
        })
        $(this).parent().css('width', _w * 3)
        runLiner($(this).parent())
        $(this).css('opacity', 1)
        $(this).parents('.b-marquee-line__flow')
            .css('background-image', 'none');
    })

}

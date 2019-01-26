$('.add-to-cart-animation').click(function(){
    var productCard = $(this).parents('.bb-product-item');
    var position = productCard.offset();
    var productImage = $(productCard).find('img.bb-img-feature-product').get(0).src;
    var productName = $(productCard).find('.bb-product-title').get(0).innerHTML;

    $(".bb-cart-box").append('<div class="floating-cart"></div>');
    var cart = $('div.floating-cart');
    productCard.clone().appendTo(cart);
    $(cart).css({'top' : position.top + 'px', "left" : position.left + 'px'}).fadeIn("slow").addClass('moveToCart');
    setTimeout(function(){$("body").addClass("MakeFloatingCart");}, 800);
    setTimeout(function(){
        $('div.floating-cart').remove();
        $("body").removeClass("MakeFloatingCart");


        var cartItem = "<div class='cart-item'><div class='img-wrap'><img src='"+productImage+"' alt='' /></div><span>"+productName+"</span><strong>$39</strong><div class='cart-item-border'></div><div class='delete-item'></div></div>";

        $(".bb-cart-box .empty").hide();
        $(".bb-cart-box").append(cartItem);
        $("#checkout").fadeIn(500);

        $(".bb-cart-box .cart-item").last()
            .addClass("flash")
            .find(".delete-item").click(function(){
            $(this).parent().fadeOut(300, function(){
                $(this).remove();
                if($(".bb-cart-box .cart-item").size() == 0){
                    $(".bb-cart-box .empty").fadeIn(500);
                    $("#checkout").fadeOut(500);
                }
            })
        });
        setTimeout(function(){
            $(".bb-cart-box .cart-item").last().removeClass("flash");
        }, 10 );

    }, 1000);
});
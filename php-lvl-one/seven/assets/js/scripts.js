if(window.location.pathname.indexOf("product.php") != -1)
{
    $(".tovar--button").on("click", () => {
        addTocart( $(".tovar--button").attr('id') );
    })
}

function addTocart(itemId)
{
    console.log("js - addTo()");
    $.ajax({
        type: "POST",
        async: false,
        url: "basket.php?id=" + itemId,
        dataType: 'json',
        success: function(data) {
            $(".cart--count").text(data['countItems']);
        }
    });
}
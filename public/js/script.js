var $box = $(".cart-plus-minus-box.product-p");
$(".qtybutton.dec").on("click", function () {
    if ($box.val() > 1) {
        $box.val(Number($box.val()) - 1);
    }
});
$(".qtybutton.inc").on("click", function () {
    var max = $box.attr('max');
    if ($box.val() < Number(max)) {
        $box.val(Number($box.val()) + 1);
    }
});

$(".add-to-cart-btn").on("click", function () {
    $.ajax({
        url: BASE_URL + "/shop/add-to-cart",
        type: "POST",
        dataType: "html",
        data: {
            pid: Number($(this).data("pid")),
            qty: Number($box.val()) || 1,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function () {
            window.location.reload();
        },
    });
});

$(".btn-qty").on("click", function () {
    $.ajax({
        url: BASE_URL + "/shop/update-cart",
        type: "PUT",
        dataType: "html",
        data: {
            pid: Number($(this).data("pid")),
            op: String($(this).data("op")),
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function () {
            window.location.reload();
        },
    });
});

$(".btn-clear-cart").on("click", function () {
    $.ajax({
        url: BASE_URL + "/shop/clear-cart",
        type: "DELETE",
        dataType: "html",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function () {
            window.location.reload();
        },
    });
});

$.get("https://restcountries.eu/rest/v2/all", function (data) {
    var $select = $(".countries");
    data = data.map(function (x) {
        return x.name;
    });
    data.forEach(function (x) {
        $select.append("<option value=" + x + ">" + x + "</option>");
    });
});

$(".is-invalid").on("click", function () {
    $(this).removeClass("is-invalid");
});

$(".short-by .price").on("change", function () {
    console.log($(this).val());
    if ($(this).val() == "-1") document.location.search = "?orderBy=desc";
    if ($(this).val() == "1") document.location.search = "?orderBy=asc";
});

var searchOutput = $(".search-output");

$(".top-search-box > input").on("keyup", function (e) {
    var value = e.target.value;
    if (value.length >= 2) {
        $.ajax({
            url: BASE_URL + "/shop/product/search/" + value.toLowerCase(),
            type: "GET",
            dataType: "json",
            success: function (data) {
                if (data.length) {
                    var output = "";
                    data.forEach(function (e) {
                        output += "<li>";
                        output +=
                            "<a href=" +
                            BASE_URL +
                            "/shop/product/" +
                            e.purl +
                            ">" +
                            e.ptitle +
                            "</a>";

                        output += "</li>";
                    });
                    searchOutput.removeClass("d-none");
                    searchOutput.html(output);
                } else {
                    searchOutput.html("");
                    searchOutput.addClass("d-none");
                }
            },
        });
    } else {
        searchOutput.html("");
        searchOutput.addClass("d-none");
    }
});

function readUrl(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = (e) => {
            let imgData = e.target.result;
            let imgName = input.files[0].name;
            input.setAttribute("data-title", imgName);
            console.log(e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$('.add-to-wishlist').on('click', function () {
    console.log('works');
    $.ajax({
        url: BASE_URL + '/user/wishlist/add',
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            pid: $(this).data('pid')
        },
        success: function () {
            window.location.reload();
        }
    })
})

$('.remove-from-wishlist').on('click', function () {
    $.ajax({
        url: BASE_URL + '/user/wishlist/del',
        type: "DELETE",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            pid: $(this).data('pid')
        },
        success: function () {
            window.location.reload();
        }
    })
})

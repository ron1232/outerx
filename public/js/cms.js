$("#article").summernote({
    height: 300,
    maximumImageFileSize: 512 * 1024, // 25 KB
    callbacks: {
        onImageUploadError: function (msg) {
            var $msgBox = $(".note-status-output");
            $msgBox.html(
                '<div class="alert alert-danger">' + msg + " 512KB" + "</div>"
            );
            $msgBox.show();
            $msgBox.fadeOut(5000);
        },
    },
});

$(".note-status-output").on("click", function () {
    $(this).empty();
});

String.prototype.permaLink = function () {
    return this.trim().toLowerCase().replace(/\s/g, "-");
};

$(".is-invalid").on("click", function () {
    $(this).removeClass("is-invalid");
});

$(".origin-text").on("focusout", function () {
    $(".target-text").val($(this).val().permaLink());
});

$(".delete-link-btn").on("click", function () {
    var url = $(this).data("url");
    var title = $(this).data("title");
    $(".modal-title").html(
        'Are you sure you want to delete: "' + title + '" ?'
    );
    $(".to-delete").data("loc", url);
});

$(".to-delete").on("click", function () {
    $.ajax({
        url: $(this).data("loc"),
        type: "DELETE",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            window.location.reload();
        },
    });
});

$("#image-upload").change(function () {
    filename = this.files[0].name;
    $(".image-upload-label").html(filename);
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

$(".image-picker").imagepicker();

$.get("https://restcountries.eu/rest/v2/all", function (data) {
    var $select = $(".countries");
    data = data.map(function (x) {
        return x.name;
    });
    data.forEach(function (x) {
        $select.append("<option value=" + x + ">" + x + "</option>");
    });
});

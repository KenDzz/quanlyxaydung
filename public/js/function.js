$(document).ready(function () {

    $(".money-vnd").each(function() {
        var value = parseFloat($(this).text()); // Lấy giá trị số từ trường nhập liệu
        var formattedValue = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
        $(this).text(formattedValue); // Cập nhật trường nhập liệu với giá trị đã định dạng
    });


    $("#input-email-login").click(function () {
        if ($(this).hasClass("is-invalid")) {
            $(this).removeClass("is-invalid");
        }
    });

    $("#input-password-login").click(function () {
        if ($(this).hasClass("is-invalid")) {
            $(this).removeClass("is-invalid");
        }
    });


    $(".btn-add-work").click(function () {
        myDropzone.processQueue();
        myDropzone.on("success", function(file, response) {
            if (response["status"] == "true") {
                var idUpload = response["file_id"];
                var name = $("#name-work").val();
                var level = $("#level-work").val();
                var datestart = $("#start-date-work").val();
                var dateend = $("#end-date-work").val();
                var content =$('.summernote-work').summernote('code');
                var userwork = $("#user-work").val();
                var projectid = $("#id-work").val();
                $.ajax({
                    url: "/dashboard/addwork",
                    method: "post",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    data: {
                        name: name,
                        content: content,
                        userwork: userwork,
                        datestart: datestart,
                        dateend: dateend,
                        level: level,
                        idupload: idUpload,
                        projectid: projectid
                    },
                    beforeSend: function () {
                        Notiflix.Block.standard(".modal-work");
                    },
                    complete: function () {
                        Notiflix.Block.remove(".modal-work");
                    },
                })
                    .done(function (data) {
                        Notiflix.Notify.success(data);
                    })
                    .fail(function (jqXHR, ajaxOptions, thrownError) {
                        Notiflix.Notify.failure("Lỗi hệ thống! Vui lòng quay lại sao");
                    });

            }else{
                Notiflix.Notify.failure(
                    data["message"]
                );
            }
        });
    });

    $(".btn-add-project").click(function () {
        var name = $("#name-project").val();
        var desc = $("#desc-project").val();
        var group = $("#group-project").val();
        var useradmin = $("#user-admin").val();
        var userperform = $("#user-perform").val();
        var usermoniter = $("#user-moniter").val();
        var customer = $("#customer-project").val();
        var datestart = $("#start-date-project").val();
        var dateend = $("#end-date-project").val();
        var budget = $("#budget").val();
        var status = $("#status-project").val();
        $.ajax({
            url: "/dashboard/addproject",
            method: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                name: name,
                desc: desc,
                group: group,
                useradmin: useradmin,
                userperform: userperform,
                usermoniter: usermoniter,
                customer: customer,
                datestart: datestart,
                dateend: dateend,
                budget: budget,
                status: status
            },
            beforeSend: function () {
                Notiflix.Block.standard(".modal-content");
            },
            complete: function () {
                Notiflix.Block.remove(".modal-content");
            },
        })
            .done(function (data) {
                Notiflix.Notify.success(data);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                Notiflix.Notify.failure("Lỗi hệ thống! Vui lòng quay lại sao");
            });
    });

    $("#btn-login").click(function () {
        var email = $("#input-email-login").val();
        var password = $("#input-password-login").val();
        if (ValidateEmail(email) && ValidatePassword(password)) {
            $.ajax({
                url: "/login",
                method: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    email: email,
                    password: password,
                },
                beforeSend: function () {
                    Notiflix.Block.standard(".bg-login");
                },
                complete: function () {
                    Notiflix.Block.remove(".bg-login");
                },
            })
                .done(function (data) {
                    if (data["status"] == "true") {
                        Notiflix.Report.success(
                            "Thông báo",
                            data["content"],
                            "Đồng ý",
                            function cb() {
                                window.location.href = "/dashboard";
                            }
                        );
                    } else {
                        Notiflix.Report.failure(
                            "Thông báo",
                            data["content"],
                            "Đồng ý"
                        );
                    }
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    Notiflix.Notify.failure(
                        "Lỗi hệ thống! Vui lòng quay lại sao"
                    );
                });
        }
    });
});

function ValidatePassword(pass) {
    if (pass.length < 8) {
        $("#input-password-login").addClass("is-invalid");
        Notiflix.Notify.failure("Mật khẩu phải trên 8 ký tự");
        return false;
    } else {
        return true;
    }
}

function ValidateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
        return true;
    }
    $("#input-email-login").addClass("is-invalid");
    Notiflix.Notify.failure("Vui lòng nhập đúng định dạng email");
    return false;
}

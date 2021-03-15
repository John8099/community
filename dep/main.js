
$(document).ready(function () {
    if ($('#showPass').prop("checked") == true) {
        $('#pass').prop("type", "text")
    }
    else {
        $('#pass').prop("type", "password")
    }
    $('#showPass').click(function () {
        if ($('#showPass').prop("checked") == true) {
            $('#pass').prop("type", "text")
        }
        else {
            $('#pass').prop("type", "password")
        }
    })

    if ($('#checkDist').prop("checked") == true) {
        $('#address').hide()
    }
    else {
        $('#address').show()
    }
    $('#checkDist').click(function () {
        if ($('#checkDist').prop("checked") == true) {
            $('#address').hide()
        }
        else {
            $('#address').show()
        }
    })
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function () {
        readURL(this);
    });

    $("#btnPost").on('click', function () {
        let inputBrgy = $("#inputBrgy").val()
        let inputDist = $("#inputDist").val()
        let inputCity = $("#inputCity").val()
        let checkDist = $("#checkDist")
        if (checkDist.prop("checked") == false && inputBrgy == "" && inputDist == "" && inputCity == "") {
            alert("Please input all required fields.");
        }
        else {
            inputBrgy = ""
            inputDist = ""
            inputCity = ""
            $("#formSubmit").submit()
        }
    })
});

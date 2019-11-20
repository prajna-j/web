/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var carinfo;

$(document).ready(function () {

    $('#saveuser').click(function (evt) {
        evt.preventDefault();

        var name = $('#name').val();
        var contactno = $('#contactno').val();
        var email = $('#email').val();
        var address = $('#address').val();
        var username = $('#username').val();
        var password = $('#password').val();

        if (name === "") {
            alert("Please enter name");
            return false;
        }

        if (contactno === "" || isNaN(contactno) || contactno.length !== 10) {
            alert("Invalid contact number");
            return false;
        }

        if (email === "") {
            alert("Please enter email");
            return false;
        }

        if (address === "") {
            alert("Please enter address");
            return false;
        }

        if (username === "") {
            alert("Please enter user name");
            return false;
        }

        if (password === "") {
            alert("Please enter password");
            return false;
        }

        $.ajax({
            url: $('#userRegistrationForm').attr('action'),
            type: $('#userRegistrationForm').attr('method'),
            dataType: 'json',
            data: $('#userRegistrationForm').serialize(),
            success: function (data, textStatus, jqXHR) {
//                var m=JSON.parse(data);
                if (data.success) {
                    alert(data.mes);
                    window.location = '../User/login.php';
                } else {
                    alert(data.mes);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $('#savebuyer').click(function (evt) {
        evt.preventDefault();
        $.ajax({
            url: $('#userRegistrationForm').attr('action'),
            type: $('#userRegistrationForm').attr('method'),
            //dataType: 'json',
            data: $('#userRegistrationForm').serialize(),
            success: function (data, textStatus, jqXHR) {
//                var m=JSON.parse(data);
                datas = $.parseJSON(data);
                if (datas.success) {
                    alert(datas.mes);
                    window.location = '../User/buyerOrderConfirmation.php';
                } else {
                    alert(datas.mes);
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $('#loginUser').click(function (evt) {
        evt.preventDefault();
        $.ajax({
            url: $('#userloginform').attr('action'),
            type: $('#userloginform').attr('method'),
            //dataType: 'json',
            data: $('#userloginform').serialize(),
            success: function (data, textStatus, jqXHR) {
//                var m=JSON.parse(data);
                datas = $.parseJSON(data);
                if (datas.success) {

                    window.location = '../User/userHome.php';
                } else {
                    alert(datas.mes);
                    window.location = '../User/login.php'
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });


    $('#buyerlogin').click(function (evt) {
        evt.preventDefault();
        $.ajax({
            url: $('#userloginform').attr('action'),
            type: $('#userloginform').attr('method'),
            //dataType: 'json',
            data: $('#userloginform').serialize(),
            success: function (data, textStatus, jqXHR) {
//                var m=JSON.parse(data);
                datas = $.parseJSON(data);
                if (datas.success) {

                    window.location = '../User/buyerOrderConfirmation.php';
                } else {
                    alert(datas.mes);
                    window.location = '../User/buyerLogin.php'
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });


    $('#savecarButton').click(function (evt) {
        evt.preventDefault();

        var brandname = $('#brandname').val();
        var modelname = $('#modelname').val();
        var year = $('#year').val();
        var fueltype = $('#fueltype').val();
        var runkm = $('#runkm').val();
        var description = $('#description').val();
        var price = $('#price').val();
        var carimage = $('#carimage').val();

        if (brandname === "") {
            alert("Please enter brand name");
            return false;
        }

        if (modelname === "") {
            alert("Please enter model name");
            return false;
        }

        if (year === "" || isNaN(year) || year.length !== 4) {
            alert("Invalid year");
            return false;
        }

        if (fueltype === "-1") {
            alert("Please select fuel type");
            return false;
        }

        if (runkm === "" || runkm.length === 0 || runkm === "0") {
            alert("Kilometers driven is invalid");
            return false;
        }

        if (description === "") {
            alert("Please enter description");
            return false;
        }

        if (price === "" || isNaN(price) || price === "0") {
            alert("Invalid price");
            return false;
        }

        if (carimage === "") {
            alert("Please select an image");
            return false;
        }

        $.ajax({
            url: $('#addCarForm').attr('action'),
            type: $('#addCarForm').attr('method'),
            dataType: 'json',
            contentType: false,
            processData: false,
            data: new FormData($('#addCarForm')[0]),
            success: function (data, textStatus, jqXHR) {
                if (data.success) {
                    alert(data.mes);
                    window.location = '../User/userHome.php';
                } else {
                    alert(data.mes);
                    window.location = '../User/login.php'
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    $('#modalOrderButton').click(function () {
        $.ajax({
            url: $('#modalorderform').attr('action'),
            type: $('#modalorderform').attr('method'),

            data: $('#modalorderform').serialize(),
            success: function (data, textStatus, jqXHR) {
                if (data.success) {
                    window.location = '../User/buyerLogin.php';
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            },
        });
    });

});

function showBuyModel(user, contact, address, price, image, carid) {

    $('#buymodalimage').attr('src', '../uploads/' + image);
    $('#ownername').val('Onwer Name: ' + user);
    $('#ownercontactno').val('Contact NO : ' + contact);
    $('#owneraddress').val('Address : ' + address);
    $('#carprice').val('Price : ' + price);
    $('#carid').val(carid);
    $('#id').val(carid);

    $('#buycarModel').modal('show');
}


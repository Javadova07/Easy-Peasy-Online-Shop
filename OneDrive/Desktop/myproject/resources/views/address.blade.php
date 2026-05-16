<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Address</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- PHONE INPUT CSS -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/css/intlTelInput.css"/>
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-lg border-0 rounded-4 p-4">

                <h1 class="mb-4">
                    🚚 Delivery Address
                </h1>

                <form action="/save-address" method="POST">

                    @csrf

                    <!-- FULL NAME -->
                    <input type="text"
                           name="fullname"
                           class="form-control mb-3"
                           placeholder="Full Name"
                           required>

                    <!-- PHONE -->
                    <input type="tel"
                           id="phone"
                           name="phone"
                           class="form-control mb-3"
                           placeholder="** *** ** **"
                           maxlength="12"
                           required>

                    <!-- CITY -->
                    <input type="text"
                           name="city"
                           class="form-control mb-3"
                           placeholder="City"
                           required>

                    <!-- ADDRESS -->
                    <textarea name="address"
                              class="form-control mb-4"
                              placeholder="Full Address"
                              required></textarea>

                    <!-- BUTTON -->
                    <button type="submit"
                            class="btn btn-success w-100">
                        Continue To Payment 💳
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<!-- PHONE INPUT JS -->
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/js/intlTelInput.min.js"></script>

<script>

const phoneInput = document.querySelector("#phone");

window.intlTelInput(phoneInput, {

    initialCountry: "az",

    preferredCountries: ["az", "tr", "us", "gb"],

    separateDialCode: true,

    strictMode: true,

});

// FORMAT
phoneInput.addEventListener("input", function (e) {

    let value = e.target.value.replace(/\D/g, '');

    // MAX 9 RƏQƏM
    value = value.substring(0, 9);

    let formatted = '';

    // 50
    if(value.length > 0){
        formatted += value.substring(0,2);
    }

    // 666
    if(value.length >= 3){
        formatted += ' ' + value.substring(2,5);
    }

    // 66
    if(value.length >= 6){
        formatted += ' ' + value.substring(5,7);
    }

    // 66
    if(value.length >= 8){
        formatted += ' ' + value.substring(7,9);
    }

    e.target.value = formatted;

});

</script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <h1 class="mb-4">
        🛒 Your Cart
    </h1>

    @if(count($cart) > 0)

        @php $total = 0; @endphp

        @foreach($cart as $id => $item)

            @php
                $subtotal = $item['price'] * $item['qty'];
                $total += $subtotal;
            @endphp

            <div class="card mb-3 shadow-sm border-0 rounded-4">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <h4>{{ $item['name'] }}</h4>

                        <p class="mb-1">
                            Price: {{ $item['price'] }} AZN
                        </p>

                        <p>
                            Quantity: {{ $item['qty'] }}
                        </p>

                    </div>

                    <div class="d-flex gap-2">

                        <a href="/cart/increase/{{ $id }}"
                           class="btn btn-success">
                            +
                        </a>

                        <a href="/cart/decrease/{{ $id }}"
                           class="btn btn-warning">
                            -
                        </a>

                        <a href="/cart/remove/{{ $id }}"
                           class="btn btn-danger">
                            Remove
                        </a>

                    </div>

                </div>

            </div>

        @endforeach

        <!-- TOTAL -->
        <div class="card p-4 shadow border-0 rounded-4 mb-4">

            <h3>
                Total: {{ $total }} AZN
            </h3>

        </div>

        <!-- CONFIRM -->
        <div class="card p-4 shadow border-0 rounded-4 text-center">

            <h3 class="mb-4">
                Səbəti təsdiq etmək istəyirsiniz?
            </h3>

            <div class="d-flex justify-content-center gap-3">

                <button class="btn btn-success px-5"
                        onclick="showAddress()">

                    YES

                </button>

                <a href="/products"
                   class="btn btn-danger px-5">

                    NO

                </a>

            </div>

        </div>

        <!-- ADDRESS -->
        <div id="addressBox"
             class="card shadow-lg border-0 rounded-4 p-4 mt-4"
             style="display:none;">

            <h2 class="mb-4">
                🚚 Delivery Address
            </h2>

            <form action="/checkout"
      method="GET">

                @csrf
                <input type="hidden" name="hidden_fullname" id="hiddenFullname">

<input type="hidden" name="hidden_phone" id="hiddenPhone">

<input type="hidden" name="hidden_city" id="hiddenCity">

<input type="hidden" name="hidden_address" id="hiddenAddress">

                <!-- FULL NAME -->
                <input type="text"
                       name="fullname"
                       class="form-control mb-3"
                       placeholder="Full Name"
                       required>

                <!-- PHONE -->
<div class="input-group mb-3">

  <select class="form-select"
        style="max-width:220px;"
        id="countryCode">

    <option value="az">
        AZ +994
    </option>

    <option value="tr">
        TR +90
    </option>

    <option value="us">
        US +1
    </option>

    <option value="gb">
        GB +44
    </option>

</select>
    <input type="text"
           id="phone"
           name="phone"
           class="form-control"
           placeholder="** *** ** **"
           required>

</div>

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

                <!-- PAY -->
                <button type="submit"
                        class="btn btn-primary w-100 py-3">

                    Pay Now 💳

                </button>

            </form>

        </div>

    @else

        <div class="alert alert-info">

            Cart is empty

        </div>

    @endif

</div>

<script>

function showAddress() {

    document.getElementById('addressBox').style.display = 'block';

    window.scrollTo({

        top: document.body.scrollHeight,
        behavior: 'smooth'

    });
}

const phoneInput = document.getElementById('phone');

const countryCode = document.getElementById('countryCode');

countryCode.addEventListener('change', updatePlaceholder);

phoneInput.addEventListener('input', formatPhone);

updatePlaceholder();

function updatePlaceholder() {

    let country = countryCode.value;

    phoneInput.value = '';

    // AZERBAIJAN
    if(country === 'az') {

        phoneInput.placeholder = '** *** ** **';

        phoneInput.maxLength = 12;
    }

    // TURKEY
    else if(country === 'tr') {

        phoneInput.placeholder = '*** *** ** **';

        phoneInput.maxLength = 12;
    }

    // USA
    else if(country === 'us') {

        phoneInput.placeholder = '*** *** ****';

        phoneInput.maxLength = 12;
    }

    // UK
    else if(country === 'gb') {

        phoneInput.placeholder = '**** ******';

        phoneInput.maxLength = 11;
    }
}

function formatPhone(e) {

    let value = e.target.value.replace(/\D/g, '');

    let country = countryCode.value;

    // AZERBAIJAN
    if(country === 'az') {

        value = value.substring(0, 9);

        if(value.length > 2) {
            value = value.slice(0,2) + ' ' + value.slice(2);
        }

        if(value.length > 6) {
            value = value.slice(0,6) + ' ' + value.slice(6);
        }

        if(value.length > 9) {
            value = value.slice(0,9) + ' ' + value.slice(9);
        }
    }

    // TURKEY
    else if(country === 'tr') {

        value = value.substring(0, 10);

        if(value.length > 3) {
            value = value.slice(0,3) + ' ' + value.slice(3);
        }

        if(value.length > 7) {
            value = value.slice(0,7) + ' ' + value.slice(7);
        }

        if(value.length > 10) {
            value = value.slice(0,10) + ' ' + value.slice(10);
        }
    }

    // USA
    else if(country === 'us') {

        value = value.substring(0, 10);

        if(value.length > 3) {
            value = value.slice(0,3) + ' ' + value.slice(3);
        }

        if(value.length > 7) {
            value = value.slice(0,7) + ' ' + value.slice(7);
        }
    }

    // UK
    else if(country === 'gb') {

        value = value.substring(0, 10);

        if(value.length > 4) {
            value = value.slice(0,4) + ' ' + value.slice(4);
        }

        if(value.length > 8) {
            value = value.slice(0,8) + ' ' + value.slice(8);
        }
    }

    e.target.value = value;
}
document.querySelector('form').addEventListener('submit', function() {

    document.getElementById('hiddenFullname').value =
        document.querySelector('input[name="fullname"]').value;

    document.getElementById('hiddenPhone').value =
        document.querySelector('input[name="phone"]').value;

    document.getElementById('hiddenCity').value =
        document.querySelector('input[name="city"]').value;

    document.getElementById('hiddenAddress').value =
        document.querySelector('textarea[name="address"]').value;

});
</script>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>🛒 Your Cart</h2>

    @if(empty($cart))

        <div class="alert alert-warning">
            Cart is empty 🛒
        </div>

    @else

        <table class="table table-bordered mt-3">

            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>

            @php $grandTotal = 0; @endphp

            @foreach($cart as $item)

                @php
                    $total = $item['price'] * $item['qty'];
                    $grandTotal += $total;
                @endphp

                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['qty'] }}</td>
                    <td>{{ $item['price'] }} AZN</td>
                    <td>{{ $total }} AZN</td>
                </tr>

            @endforeach

            </tbody>

        </table>

        <div class="card p-3">
            <h4>🧾 Total: {{ $grandTotal }} AZN</h4>
        </div>

        <!-- PAY NOW BUTTON -->
        <button onclick="showPaymentForm()" class="btn btn-success mt-3">
            Pay Now 💳
        </button>

        <!-- PAYMENT FORM -->
        <div id="paymentForm" style="display:none;" class="mt-5">

            <h2>💳 Card Information</h2>

            <form method="POST" action="/checkout/pay">
                @csrf

                <input type="text"
                       name="card_name"
                       class="form-control mt-3"
                       placeholder="Card Holder Name"
                       required>

                <input type="text"
                       id="cardNumber"
                       name="card_number"
                       class="form-control mt-3"
                       placeholder="1234 5678 9012 3456"
                       maxlength="19"
                       required>

                <input type="text"
                       id="expiry"
                       name="expiry"
                       class="form-control mt-3"
                       placeholder="MM/YY"
                       maxlength="5"
                       required>

                <input type="text"
                       id="cvv"
                       name="cvv"
                       class="form-control mt-3"
                       placeholder="CVV"
                       maxlength="3"
                       required>

                <button type="submit" class="btn btn-success mt-4">
                    Confirm Payment 💳
                </button>

            </form>

        </div>

    @endif

</div>

<script>
function showPaymentForm() {
    document.getElementById('paymentForm').style.display = 'block';
}

// CARD NUMBER FORMAT (4-4-4-4)
document.getElementById('cardNumber').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    value = value.substring(0,16);
    value = value.replace(/(.{4})/g, '$1 ').trim();
    e.target.value = value;
});

// EXPIRY FORMAT MM/YY
document.getElementById('expiry').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if(value.length > 2){
        value = value.substring(0,2) + '/' + value.substring(2,4);
    }
    e.target.value = value;
});

// CVV ONLY 3 DIGITS
document.getElementById('cvv').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    e.target.value = value.substring(0,3);
});

// VALIDATION ON SUBMIT
document.querySelector('form').addEventListener('submit', function(e) {

    let card = document.getElementById('cardNumber').value.replace(/\s/g, '');
    let expiry = document.getElementById('expiry').value;
    let cvv = document.getElementById('cvv').value;

    let expiryPattern = /^\d{2}\/\d{2}$/;

    if(card.length !== 16 || !expiryPattern.test(expiry) || cvv.length !== 3) {
        e.preventDefault();
        alert('Kart məlumatlari səhvdir ❌');
    }

});
</script>

</body>
</html>
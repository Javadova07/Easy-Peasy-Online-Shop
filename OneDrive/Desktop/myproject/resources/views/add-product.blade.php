<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-lg border-0 rounded-4 p-4">

                <h1 class="mb-4 text-center fw-bold">
                    ➕ Add Product
                </h1>

                <form action="/store-product"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <!-- CATEGORY -->
                    <select name="category"
                            id="category"
                            class="form-control mb-3"
                            required>

                        <option value="">
                            Məhsul növü seç
                        </option>

                        <option value="clothes">
                            👕 Geyim
                        </option>

                        <option value="tech">
                            💻 Texniki avadanlıq
                        </option>

                        <option value="makeup">
                            💄 Makiyaj məhsulu
                        </option>

                        <option value="shoes">
                            👟 Ayaqqabı
                        </option>

                    </select>

                    <!-- NAME -->
                    <input type="text"
                           name="name"
                           class="form-control mb-3"
                           placeholder="Product Name"
                           required>

                    <!-- PRICE -->
                    <input type="number"
                           name="price"
                           class="form-control mb-3"
                           placeholder="Price"
                           required>

                    <!-- DESCRIPTION -->
                    <textarea name="description"
                              class="form-control mb-3"
                              placeholder="Description"
                              required></textarea>

                    <!-- DYNAMIC -->
                    <div id="dynamic-fields"></div>

                    <!-- MULTIPLE IMAGES -->
                    <label class="fw-bold mb-2">
                        Product Images
                    </label>

                    <input type="file"
                           name="images[]"
                           multiple
                           class="form-control mb-4">

                    <!-- BUTTON -->
                    <button type="submit"
                            class="btn btn-success w-100 py-3 fw-bold rounded-3">

                        Save Product 🚀

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

document.getElementById('category').addEventListener('change', function () {

    let category = this.value;

    let fields = document.getElementById('dynamic-fields');

    fields.innerHTML = '';

    // CLOTHES
    if(category === 'clothes') {

        fields.innerHTML = `

            <input type="text"
                   name="size"
                   class="form-control mb-3"
                   placeholder="Ölçü">

            <input type="text"
                   name="color"
                   class="form-control mb-3"
                   placeholder="Rəng">

            <input type="text"
                   name="material"
                   class="form-control mb-3"
                   placeholder="Material">

        `;
    }

    // TECH
    else if(category === 'tech') {

        fields.innerHTML = `

            <input type="text"
                   name="ram"
                   class="form-control mb-3"
                   placeholder="RAM">

            <input type="text"
                   name="storage"
                   class="form-control mb-3"
                   placeholder="Storage">

            <input type="text"
                   name="processor"
                   class="form-control mb-3"
                   placeholder="Processor">

            <input type="text"
                   name="color"
                   class="form-control mb-3"
                   placeholder="Color">

        `;
    }

    // MAKEUP
    else if(category === 'makeup') {

        fields.innerHTML = `

            <input type="text"
                   name="tone"
                   class="form-control mb-3"
                   placeholder="Ton">

            <input type="text"
                   name="weight"
                   class="form-control mb-3"
                   placeholder="Qram">

            <input type="text"
                   name="skin_type"
                   class="form-control mb-3"
                   placeholder="Dəri tipi">

        `;
    }

    // SHOES
    else if(category === 'shoes') {

        fields.innerHTML = `

            <input type="text"
                   name="shoe_size"
                   class="form-control mb-3"
                   placeholder="Ayaqqabı ölçüsü">

            <input type="text"
                   name="color"
                   class="form-control mb-3"
                   placeholder="Rəng">

            <input type="text"
                   name="material"
                   class="form-control mb-3"
                   placeholder="Material">

        `;
    }

});

</script>

</body>
</html>
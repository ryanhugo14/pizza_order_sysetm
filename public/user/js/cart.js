const quantities = document.querySelectorAll(".quantity");

[...quantities].forEach(function(quantity) {
    const minusButton = quantity.querySelector(".minus");
    const plusButton = quantity.querySelector(".plus");
    const inputField = quantity.querySelector(".count");

    minusButton.addEventListener("click", function minusProduct() {
        const currentValue = Number(inputField.value);
        if (currentValue > 0) {
            inputField.value = currentValue - 1;
        } else inputField.value = 0;
    });

    plusButton.addEventListener("click", function plusProduct() {
        const currentValue = Number(inputField.value);
        inputField.value = currentValue + 1;
    });
});

$(document).ready(function() {
    // plus, miuse, inputField
    $(".plus").click(function() {
        $parentNode = $(this).parents("tr");
        $price = Number(
            $parentNode.find("#pizzaPrice").text().replace("MMK", "")
        );
        $inputField = Number($parentNode.find("#count").val());
        $pizzaTotal = $price * $inputField;

        $parentNode.find("#total").html($pizzaTotal + " MMK");

        summaryCaculation();
    });

    $(".minus").click(function() {
        $parentNode = $(this).parents("tr");
        $price = Number(
            $parentNode.find("#pizzaPrice").text().replace("MMK", "")
        );
        $inputField = Number($parentNode.find("#count").val());
        $pizzaTotal = $price * $inputField;

        $parentNode.find("#total").html($pizzaTotal + " MMK");

        summaryCaculation();
    });

    // surrmaryCaculation
    function summaryCaculation() {
        $total = 0;

        $("#dataTable tr").each((index, row) => {
            $total += Number($(row).find("#total").text().replace("MMK", ""));
        });

        $("#subTotal").html($total + " " + "MMK");
        if ($total != 0) {
            $("#finalTotal").html($total + 3000 + " " + "MMK");
        } else {
            $("#finalTotal").html(0);
        }
    }
});
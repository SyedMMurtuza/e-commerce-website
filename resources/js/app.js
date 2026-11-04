
const qtyInput = document.getElementById('qty_input');
const maxQty = parseInt(qtyInput.max);

document.getElementById('qty_plus').addEventListener('click', function () {
    const current = parseInt(qtyInput.value);
    if (current < maxQty) {
        qtyInput.value = current + 1;
    }
});

document.getElementById('qty_minus').addEventListener('click', function () {
    const current = parseInt(qtyInput.value);
    if (current > 1) {
        qtyInput.value = current - 1;
    }
});

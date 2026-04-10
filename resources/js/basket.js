// document.addEventListener("DOMContentLoaded", () => {
//     const productsList = document.querySelector(".products-list");
//     const totalBox = document.querySelector(".basket-order");
//     const totalPriceNode = document.querySelector(".total-price");

//     function updateTotal() {
//         const products = document.querySelectorAll(".product");
//         if (products.length === 0) {
//             totalBox.style.display = "none";
//             productsList.innerHTML = '<div class="empty-basket" style="font-size: 28px; margin-top: 40px; color:gray">Корзина пуста</div>';
//             return;
//         }
//         let total = 0;
//         products.forEach(p => {
//             const priceText = p.querySelector(".product-price").textContent.replace("₽","").trim().replace(/\s/g,'');
//             const price = parseInt(priceText);
//             const countText = p.querySelector(".count-change:first-child").nextSibling.textContent.trim();
//             const count = parseInt(countText);
//             total += price * count;
//         });
//         totalPriceNode.textContent = total.toLocaleString("ru-RU") + "₽";
//     }

//     document.querySelectorAll(".product").forEach(product => {
//         const minusBtn = product.querySelector(".count-change:first-child");
//         const plusBtn = product.querySelector(".count-change:last-child");
//         const removeBtn = product.querySelector("#remove-product");
//         let countNode = minusBtn.nextSibling;

//         function removeCard() {
//             product.remove();
//             updateTotal();
//         }

//         minusBtn.addEventListener("click", () => {
//             let count = parseInt(countNode.textContent.trim());
//             if (count > 1) {
//                 count--;
//                 countNode.textContent = " " + count + " ";
//                 updateTotal();
//             } else if (count === 1) {
//                 removeCard();
//                 updateTotal();
//             }
//         });

//         plusBtn.addEventListener("click", () => {
//             let count = parseInt(countNode.textContent.trim());
//             count++;
//             countNode.textContent = " " + count + " ";
//             updateTotal();
//         });

//         removeBtn.addEventListener("click", () => {
//             removeCard();
//             updateTotal();
//         });
//     });
// });




document.addEventListener("DOMContentLoaded", () => {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // ============================================
    // УДАЛЕНИЕ ТОВАРА ИЗ КОРЗИНЫ
    // ============================================



    const removeFromCartForms = document.querySelectorAll('.removeFromCartForm');

    for (let removeFromCartForm of removeFromCartForms) {
        removeFromCartForm.addEventListener('submit', (e) => {
            e.preventDefault();
            fetch('/order/item', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    product_id: removeFromCartForm.querySelector('#product_id').value,
                    characteristic: removeFromCartForm.querySelector('#characteristic').value
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.count == 0) {
                        document.getElementById('basket-count').classList.add('invisible');
                        document.querySelector('.main-container').innerHTML = `
                                <div class="headline">КОРЗИНА</div>
                                <p>Корзина пуста</p>
                                <a href="/categories">Выберите товары</a>   
                        `;

                    } else {
                        document.getElementById('basket-count').textContent = data.count;
                        document.querySelector(".total-price").textContent = data.cost + '₽';
                    }
                    removeFromCartForm.closest('.product').outerHTML = '';
                })
                .catch(error => console.error('Error:', error));
        })
    }

    // ============================================
    // УВЕЛИЧЕНИЕ ПОЗИЦИЙ ТОВАРА 
    // ============================================

    const plusBtns = document.querySelectorAll('.count-change-plus');
    for (let plusBtn of plusBtns) {
        plusBtn.addEventListener('click', (e) => {
            e.preventDefault();

            const params = {
                product_id: plusBtn.closest('.product-count').dataset.id,
                characteristic: plusBtn.closest('.product-count').dataset.characteristic
            };
            const queryString = new URLSearchParams(params).toString();
            fetch(`/order/plus-item?${queryString}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                }
            })
                .then(response => response.json())
                .then(data => {
                    plusBtn.closest('.product-count').querySelector('span').textContent = data.quantity;
                    document.getElementById('basket-count').textContent = data.count;
                    document.querySelector(".total-price").textContent = data.cost + '₽';
                    plusBtn.closest('.product').querySelector('.product-price').textContent = data.positionCost + '₽';
                })
                .catch(error => console.error('Error:', error));
        })
    }

    const minusBtns = document.querySelectorAll('.count-change-minus');
    for (let minusBtn of minusBtns) {
        minusBtn.addEventListener('click', (e) => {
            e.preventDefault();

            const params = {
                product_id: minusBtn.closest('.product-count').dataset.id,
                characteristic: minusBtn.closest('.product-count').dataset.characteristic
            };
            const queryString = new URLSearchParams(params).toString();
            fetch(`/order/minus-item?${queryString}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.count == 0) {
                        document.getElementById('basket-count').classList.add('invisible');
                        document.querySelector('.main-container').innerHTML = `
                                <div class="headline">КОРЗИНА</div>
                                <p>Корзина пуста</p>
                                <a href="/categories">Выберите товары</a>   
                        `;

                    } else {
                        if(data.quantity == null){
                            minusBtn.closest('.product').outerHTML = '';
                        } else {
                            minusBtn.closest('.product-count').querySelector('span').textContent = data.quantity;
                        }
                        
                        document.getElementById('basket-count').textContent = data.count;
                        document.querySelector(".total-price").textContent = data.cost + '₽';
                        minusBtn.closest('.product').querySelector('.product-price').textContent = data.positionCost + '₽';
                    }
                })
                .catch(error => console.error('Error:', error));
        })
    }
});
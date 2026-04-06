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
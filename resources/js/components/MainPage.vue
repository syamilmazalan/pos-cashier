<template>
    <div class="container-fluid">
        <div class="row vh-100">
            <template v-if="loading">
                <div
                    class="text-center text-danger my-5 d-flex flex-column justify-content-center align-items-center vw-100"
                >
                    <div
                        class="spinner-border align-middle"
                        role="status"
                    ></div>
                    <p>Loading...</p>
                </div>
            </template>

            <template v-else>
                <div class="col-7">
                    <div class="p-3">
                        <div
                            class="d-flex flex-column align-items-center mt-5 mb-3"
                        >
                            <h5>POS</h5>
                            <h6>Cashier</h6>
                        </div>
                        <cart-table
                            :selectedProducts="selectedProducts"
                            :cartItems="cartItems"
                            @reduce-clicked="handleReduceClicked"
                            @add-clicked="handleAddClicked"
                        ></cart-table>
                        <cart-total
                            :subTotal="subTotal"
                            :numberOfItems="numberOfItems"
                            :taxPercent="taxPercent"
                        ></cart-total>
                    </div>
                    <div
                        class="row border-top p-3 justify-content-between mb-5"
                    >
                        <div class="col-3 ml-5">
                            Total
                        </div>
                        <div class="col-3 d-flex justify-content-center">
                            RM {{ totalPrice }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <button
                                @click="resetCart"
                                class="btn btn-lg btn-danger mr-5"
                            >
                                Cancel
                            </button>
                            <button
                                type="button"
                                class="btn btn-lg btn-primary ml-5"
                                data-toggle="modal"
                                data-target="#checkoutModal"
                            >
                                Check Out
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col border-left p-3">
                    <div class="d-flex flex-column align-items-center my-5">
                        <h5>
                            Products
                        </h5>
                    </div>
                    <product-list
                        :selectedProducts="selectedProducts"
                        @product-clicked="handleProductClicked"
                    ></product-list>
                </div>
            </template>

            <checkout-modal
                :totalPrice="totalPrice"
                @payment-method-selected="handleSelect($event)"
                @transaction-submitted="handleSubmit"
            ></checkout-modal>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loading: false,
            selectedProducts: [],
            cartItems: [
                {
                    product: "P1",
                    price: 1,
                    quantity: 0,
                    cost: 0
                },
                {
                    product: "P2",
                    price: 2,
                    quantity: 0,
                    cost: 0
                },
                {
                    product: "P3",
                    price: 3,
                    quantity: 0,
                    cost: 0
                },
                {
                    product: "P4",
                    price: 4,
                    quantity: 0,
                    cost: 0
                }
            ],
            taxPercent: 6,
            serviceCharge: 0,
            isWalkIn: true,
            paymentMethod: "Cash"
        };
    },

    computed: {
        subTotal: function() {
            // Map all selected costs into an array
            const costArray = this.cartItems.map(item => {
                return item.cost;
            });

            // Reduce cost array to get sub total
            return costArray.reduce((total, current) => total + current);
        },

        numberOfItems: function() {
            // Map all selected quantity into an array
            const quantityArray = this.cartItems.map(item => {
                return item.quantity;
            });

            // Reduce quantity array to get sub total
            return quantityArray.reduce((total, current) => total + current);
        },

        totalPrice: function() {
            // Subtotal + tax
            return (
                this.subTotal +
                this.subTotal * (this.taxPercent / 100)
            ).toFixed(2);
        }
    },

    methods: {
        handleProductClicked(value) {
            // Add selected products
            this.selectedProducts.push(value);

            // Get selected cart item
            const item = this.cartItems.find(item => item.product === value);

            // Increase quantity of cart item to 1
            item.quantity++;

            // Calculate item cost
            item.cost = item.price * item.quantity;
        },

        handleReduceClicked(value) {
            // Get selected cart item
            const item = this.cartItems.find(item => item.product === value);

            // Decrease quantity
            item.quantity--;

            // Calculate item cost
            item.cost = item.price * item.quantity;

            // Remove item if quantity == 0
            if (item.quantity === 0) {
                for (let i = 0; i < this.selectedProducts.length; i++) {
                    if (this.selectedProducts[i] === value) {
                        this.selectedProducts.splice(i, 1);
                    }
                }
            }
        },

        handleAddClicked(value) {
            // Get selected cart item
            const item = this.cartItems.find(item => item.product === value);

            // Increase quantity
            item.quantity++;

            // Calculate item cost
            item.cost = item.price * item.quantity;
        },

        resetCart() {
            // Reset state
            this.selectedProducts = [];

            this.cartItems = [
                {
                    product: "P1",
                    price: 1,
                    quantity: 0,
                    cost: 0
                },
                {
                    product: "P2",
                    price: 2,
                    quantity: 0,
                    cost: 0
                },
                {
                    product: "P3",
                    price: 3,
                    quantity: 0,
                    cost: 0
                },
                {
                    product: "P4",
                    price: 4,
                    quantity: 0,
                    cost: 0
                }
            ];

            this.paymentMethod = "Cash";
        },

        handleSelect(event) {
            this.paymentMethod = event.target.value;
        },

        async handleSubmit(paidAmount) {
            this.loading = true;

            const orderItems = this.cartItems.filter(item => item.quantity > 0);

            await axios
                .post("/api/transactions", {
                    tax: this.taxPercent,
                    service_charge: this.serviceCharge,
                    total_amount_cents: this.totalPrice * 100,
                    is_walkin: this.isWalkIn,
                    order_items: orderItems,
                    payment_method: this.paymentMethod,
                    paid_amount_cents: paidAmount * 100
                })
                .then(res => {
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                });

            this.resetCart();
            this.loading = false;
        }
    }
};
</script>

<style lang="scss" scoped></style>

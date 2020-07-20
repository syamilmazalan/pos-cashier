<template>
    <div class="container-fluid">
        <div class="row vh-100">
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
                <div class="row border-top p-3 justify-content-between mb-5">
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

            <checkout-modal :totalPrice="totalPrice"></checkout-modal>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
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
            taxPercent: 6
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
            return (this.subTotal + this.subTotal * (this.taxPercent / 100)).toFixed(2);
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
        }
    }
};
</script>

<style lang="scss" scoped></style>

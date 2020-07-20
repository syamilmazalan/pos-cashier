<template>
    <table class="table table-borderless mb-5">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Price (RM)</th>
                <th scope="col">Quantity</th>
                <th scope="col">Cost (RM)</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="product in selectedProducts" :key="product">
                <td>{{ productName(product) }}</td>
                <td>{{ productPrice(product) }}</td>
                <td>
                    <svg
                        @click="$emit('reduce-clicked', product)"
                        width="2em"
                        height="2em"
                        viewBox="0 0 16 16"
                        class="bi bi-dash-circle"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"
                        /></svg
                    ><span class="px-3">{{ productQuantity(product) }}</span
                    ><svg
                        @click="$emit('add-clicked', product)"
                        width="2em"
                        height="2em"
                        viewBox="0 0 16 16"
                        class="bi bi-plus-circle"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                        />
                    </svg>
                </td>
                <td>{{ productCost(product) }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: {
        selectedProducts: Array,
        cartItems: Array
    },

    data() {
        return {};
    },

    methods: {
        productName: function(name) {
            const item = this.cartItems.find(item => item.product === name);

            return item.product;
        },

        productPrice: function(name) {
            const item = this.cartItems.find(item => item.product === name);

            return item.price;
        },

        productQuantity: function(name) {
            const item = this.cartItems.find(item => item.product === name);

            return item.quantity;
        },

        productCost: function(name) {
            const item = this.cartItems.find(item => item.product === name);

            return item.cost;
        }
    }
};
</script>

<style lang="scss" scoped>
th,
td {
    text-align: center;
}

.bi-dash-circle {
    &:hover {
        cursor: pointer;

        path {
            stroke: black;
        }
    }
}

.bi-plus-circle {
    &:hover {
        cursor: pointer;

        path {
            stroke: black;
        }
    }
}
</style>

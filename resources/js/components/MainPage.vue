<template>
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-7">
                <div class="p-3">
                    <div class="d-flex flex-column align-items-center mt-5 mb-3">
                        <h5>
                            POS
                        </h5>
                        <h6>
                            Cashier
                        </h6>
                    </div>
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
                            <tr>
                                <td>P1</td>
                                <td>2</td>
                                <td>
                                    <svg
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
                                    ><span class="px-3">1</span
                                    ><svg
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
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>P2</td>
                                <td>2</td>
                                <td>2</td>
                                <td>4</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row justify-content-between mb-3">
                        <div class="col-3 ml-5">
                            Subtotal
                        </div>
                        <div class="col-3 d-flex justify-content-center">
                            RM 6.00
                        </div>
                    </div>
                    <div class="row justify-content-between mb-3">
                        <div class="col-3 ml-5">
                            No of items
                        </div>
                        <div class="col-3 d-flex justify-content-center">
                            3
                        </div>
                    </div>
                    <div class="row justify-content-between mb-3">
                        <div class="col-3 ml-5">
                            Tax
                        </div>
                        <div class="col-3 d-flex justify-content-center">
                            6%
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-3 ml-5">
                            Service charge
                        </div>
                        <div class="col-3 d-flex justify-content-center">
                            -
                        </div>
                    </div>
                </div>
                <div class="row border-top p-3 justify-content-between mb-5">
                    <div class="col-3 ml-5">
                        Total
                    </div>
                    <div class="col-3 d-flex justify-content-center">
                        RM 6.36
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <button class="btn btn-lg btn-danger mr-5">
                            Cancel
                        </button>
                        <button class="btn btn-lg btn-primary ml-5">
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
                <div class="row">
                    <div class="col-6 d-flex justify-content-center mb-5">
                        <button class="btn btn-lg btn-secondary product-btn">P1</button>
                    </div>
                    <div class="col-6 d-flex justify-content-center mb-5">
                        <button class="btn btn-lg btn-secondary product-btn">P2</button>
                    </div>
                    <div class="col-6 d-flex justify-content-center mb-5">
                        <button class="btn btn-lg btn-secondary product-btn">P3</button>
                    </div>
                    <div class="col-6 d-flex justify-content-center mb-5">
                        <button class="btn btn-lg btn-secondary product-btn">P4</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    }
};
</script>

<style lang="scss" scoped>
th,
td {
    text-align: center;
}

.product-btn {
    padding: 2rem 7rem;
}
</style>

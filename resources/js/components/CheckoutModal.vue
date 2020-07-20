<template>
    <div class="modal fade" id="checkoutModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModalLabel">
                        Checkout Cart
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="paidAmount" class="col col-form-label">
                            Total Paid Amount
                        </label>
                        <div class="col">
                            <input
                                type="number"
                                class="form-control"
                                id="paidAmount"
                                v-model="paidAmount"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="totalDue" class="col col-form-label">
                            Total Due
                        </label>
                        <div class="col">
                            <input
                                type="text"
                                class="form-control-plaintext"
                                id="totalDue"
                                :value="totalDue"
                                readonly
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="paymentMethod" class="col col-form-label">
                            Payment Method
                        </label>
                        <div class="col">
                            <select class="form-control" id="paymentMethod">
                                <option value="Cash">Cash</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="E-Wallet">E-Wallet</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="change" class="col col-form-label">
                            Change
                        </label>
                        <div class="col">
                             <input
                                type="text"
                                class="form-control-plaintext"
                                id="change"
                                :value="change"
                                readonly
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <button class="btn btn-danger mr-5">Close</button>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        totalPrice: Number
    },

    data() {
        return {
            paidAmount: 0
        }
    },

    computed: {
        totalDue: function() {
            return `RM ${this.totalPrice}`;
        },

        change: function() {
            const change = (this.paidAmount - this.totalPrice).toFixed(2);

            return `RM ${change}`;
        }
    }
};
</script>

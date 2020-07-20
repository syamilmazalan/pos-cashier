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
                                type="text"
                                class="form-control"
                                id="paidAmount"
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
                    <div class="row">
                        <div class="col">
                            Payment Method
                        </div>
                        <div class="col">
                            <select>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Change
                        </div>
                        <div class="col">
                            0
                        </div>
                    </div>
                    <div class="row">
                        <button>Close</button>
                        <button>Submit</button>
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

    computed: {
        totalDue: function() {
            return `RM ${this.totalPrice}`;
        }
    }
};
</script>

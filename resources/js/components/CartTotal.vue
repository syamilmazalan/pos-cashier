<template>
    <div>
        <div class="row justify-content-between mb-3">
            <div class="col-3 ml-5">
                Subtotal
            </div>
            <div class="col-3 d-flex justify-content-center">
                RM {{ subTotal.toFixed(2) }}
            </div>
        </div>
        <div class="row justify-content-between mb-3">
            <div class="col-3 ml-5">
                No of items
            </div>
            <div class="col-3 d-flex justify-content-center">
                {{ numberOfItems }}
            </div>
        </div>
        <div class="row justify-content-between mb-3">
            <div class="col-3 ml-5">
                Tax
            </div>
            <div class="col-3 d-flex justify-content-center">
                {{taxPercent}}%
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
</template>

<script>
export default {
    props: {
        subTotal: Number,
        numberOfItems: Number,
        taxPercent: Number
    }
};
</script>

<style lang="scss" scoped></style>

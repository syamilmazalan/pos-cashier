<template>
    <div class="row">
        <div class="col-6 d-flex justify-content-center mb-5">
            <button
                class="btn btn-lg btn-secondary product-btn"
                :disabled="selectedProducts.includes('P1')"
                @click="$emit('product-clicked', $event.target.outerText)"
            >
                P1
            </button>
        </div>
        <div class="col-6 d-flex justify-content-center mb-5">
            <button
                class="btn btn-lg btn-secondary product-btn"
                :disabled="selectedProducts.includes('P2')"
                @click="$emit('product-clicked', $event.target.outerText)"
            >
                P2
            </button>
        </div>
        <div class="col-6 d-flex justify-content-center mb-5">
            <button
                class="btn btn-lg btn-secondary product-btn"
                :disabled="selectedProducts.includes('P3')"
                @click="$emit('product-clicked', $event.target.outerText)"
            >
                P3
            </button>
        </div>
        <div class="col-6 d-flex justify-content-center mb-5">
            <button
                class="btn btn-lg btn-secondary product-btn"
                :disabled="selectedProducts.includes('P4')"
                @click="$emit('product-clicked', $event.target.outerText)"
            >
                P4
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        selectedProducts: Array
    }
};
</script>

<style lang="scss" scoped>
.product-btn {
    padding: 2rem 7rem;
}
</style>

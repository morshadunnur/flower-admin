<div class="modal fade" id="editProductPrice" tabindex="-1" role="dialog" aria-labelledby="editProductPriceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductLabel">Update Product Price</h5>
                <button type="button" class="close" @click="resetProductPrice" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="editName">Batch Number</label>
                    <input type="text" v-model="editProductPrice.sku_uuid" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="editSlug">Cost Price</label>
                    <input type="text" v-model="editProductPrice.cost_price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="editSlug">Selling Price</label>
                    <input type="text" v-model="editProductPrice.selling_price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="editSlug">Quantity</label>
                    <input type="text" v-model="editProductPrice.quantity" class="form-control">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="resetProductPrice">Close</button>
                <button type="button" @click="updateProductPrice('{{ route('api.product.price.update') }}')" class="btn btn-primary"  data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>

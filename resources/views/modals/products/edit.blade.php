<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="editProductLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductLabel">Update Product</h5>
                <button type="button" class="close" @click="resetProduct" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="editName">Product Name</label>
                    <input type="text" v-model="product.title" id="editName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="editSlug">Sku</label>
                    <input type="text" v-model="product.sku" id="editSlug" class="form-control">
                </div>
                <div class="form-group">
                    <label for="edit_parent_cat">Product Category</label>
                    <select class="form-control" id="edit_parent_cat" v-model="product.category_id">
                        <option v-for="(category, index) in categories" :value="category.id" :selected="category.id == product.category_id">@{{ category.name }}</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="resetProduct">Close</button>
                <button type="button" class="btn btn-primary" @click="updateProduct('{{ route('product.update', ':id') }}'.replace(':id', product.id))" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>

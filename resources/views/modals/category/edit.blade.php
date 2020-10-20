 <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryLabel">Update Category</h5>
                    <button type="button" class="close" @click="resetCategory" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editName">Category Name</label>
                        <input type="text" v-model="category.name" id="editName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editSlug">Category Slug</label>
                        <input type="text" v-model="category.slug" id="editSlug" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit_parent_cat">Parent Category</label>
                        <select class="form-control" id="edit_parent_cat" v-model="category.parent_id">
                            <option v-for="(category, index) in categories" :value="category.id">@{{ category.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="resetCategory">Close</button>
                    <button type="button" class="btn btn-primary" @click="updateCategory('{{ route('categories.update', ':id') }}'.replace(':id', category.id))" data-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>

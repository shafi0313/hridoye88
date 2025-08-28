<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.literatures.store') }}" method="post"
                onsubmit="ajaxStoreModal(event, this, 'createModal')" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Book Name <span class="t_r">*</span></label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="writer">Writer <span class="t_r">*</span></label>
                                <input type="text" name="writer" class="form-control" id="writer" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price <span class="t_r">*</span></label>
                                <input type="text" name="price" class="form-control" id="price" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input type="text" name="discount" class="form-control" id="discount">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="publisher">publisher</label>
                                <input type="text" name="publisher" class="form-control" id="publisher">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="published_at">Published at</label>
                                <input type="date" name="published_at" class="form-control" id="published_at">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="" rows="4" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cover_img">Cover Image </label>
                                <input type="file" name="cover_img" id="cover_img" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="back_cover_img">Back Cover Image </label>
                                <input type="file" name="back_cover_img" id="back_cover_img" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

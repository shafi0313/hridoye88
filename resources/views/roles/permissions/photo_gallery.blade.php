<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">Photo Gallery @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>Do you want to allow Photo Galleries of this role to manage Photo Gallery plugin.</p>
        <div>
            <input type="checkbox" value="photo-gallery-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManagePhotoGallery" name="permissions[]" id="ManagePhotoGallery"
                @if($permissions['photo-gallery-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManagePhotoGallery">
                Yes, allow Photo Galleries in this role to manage Photo Gallery .

            </label>
        </div>
        <div style="@if($permissions['photo-gallery-manage'] == 1) display:block @else display:none @endif"
            id="childOfManagePhotoGallery">
            <div>
                <input type="checkbox" value="photo-gallery-add" class="flat-red " name="permissions[]" id="createPhotoGallery"
                    @if($permissions['photo-gallery-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createPhotoGallery">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="photo-gallery-edit" class="flat-red " name="permissions[]" id="editPhotoGallery"
                    @if($permissions['photo-gallery-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editPhotoGallery">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="photo-gallery-delete" class="flat-red " name="permissions[]" id="deletePhotoGallery"
                    @if($permissions['photo-gallery-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deletePhotoGallery">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>

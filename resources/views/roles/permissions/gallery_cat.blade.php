<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">Gallery Category @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>Do you want to allow Photo Galleries of this role to manage Gallery Category plugin.</p>
        <div>
            <input type="checkbox" value="gallery-category-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageGalleryCat" name="permissions[]" id="ManageGalleryCat"
                @if($permissions['gallery-category-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageGalleryCat">
                Yes, allow Photo Galleries in this role to manage Gallery Category .

            </label>
        </div>
        <div style="@if($permissions['gallery-category-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageGalleryCat">
            <div>
                <input type="checkbox" value="gallery-category-add" class="flat-red " name="permissions[]" id="createGalleryCat"
                    @if($permissions['gallery-category-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createGalleryCat">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="gallery-category-edit" class="flat-red " name="permissions[]" id="editGalleryCat"
                    @if($permissions['gallery-category-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editGalleryCat">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="gallery-category-delete" class="flat-red " name="permissions[]" id="deleteGalleryCat"
                    @if($permissions['gallery-category-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteGalleryCat">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>

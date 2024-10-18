<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">Video Gallery @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>Do you want to allow Video Galleries of this role to manage Video Gallery plugin.</p>
        <div>
            <input type="checkbox" value="video-gallery-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageVideoGallery" name="permissions[]" id="ManageVideoGallery"
                @if($permissions['video-gallery-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageVideoGallery">
                Yes, allow Video Galleries in this role to manage Video Gallery .

            </label>
        </div>
        <div style="@if($permissions['video-gallery-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageVideoGallery">
            <div>
                <input type="checkbox" value="video-gallery-add" class="flat-red " name="permissions[]" id="createVideoGallery"
                    @if($permissions['video-gallery-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createVideoGallery">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="video-gallery-edit" class="flat-red " name="permissions[]" id="editVideoGallery"
                    @if($permissions['video-gallery-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editVideoGallery">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="video-gallery-delete" class="flat-red " name="permissions[]" id="deleteVideoGallery"
                    @if($permissions['video-gallery-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteVideoGallery">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>

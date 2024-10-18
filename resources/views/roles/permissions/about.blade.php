<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">About @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>Do you want to allow about of this role to manage About plugin.</p>
        <div>
            <input type="checkbox" value="about-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageAbout" name="permissions[]" id="ManageAbout"
                @if($permissions['about-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageAbout">
                Yes, allow about in this role to manage About .
            </label>
        </div>
    </div>
</div>

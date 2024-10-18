<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">Profession @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>Do you want to allow professions of this role to manage Profession plugin.</p>
        <div>
            <input type="checkbox" value="profession-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageProfession" name="permissions[]" id="ManageProfession"
                @if($permissions['profession-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageProfession">
                Yes, allow professions in this role to manage Profession .

            </label>
        </div>
        <div style="@if($permissions['profession-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageProfession">
            <div>
                <input type="checkbox" value="profession-add" class="flat-red " name="permissions[]" id="createProfession"
                    @if($permissions['profession-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createProfession">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="profession-edit" class="flat-red " name="permissions[]" id="editProfession"
                    @if($permissions['profession-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editProfession">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="profession-delete" class="flat-red " name="permissions[]" id="deleteProfession"
                    @if($permissions['profession-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteProfession">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>

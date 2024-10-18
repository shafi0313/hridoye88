<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">Header @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>Do you want to allow members of this role to manage Header plugin.</p>
        <div>
            <input type="checkbox" value="header-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageHeader" name="permissions[]" id="ManageHeader"
                @if($permissions['header-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageHeader">
                Yes, allow members in this role to manage Header .

            </label>
        </div>
        <div style="@if($permissions['header-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageHeader">
            <div>
                <input type="checkbox" value="header-add" class="flat-red " name="permissions[]" id="createHeader"
                    @if($permissions['header-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createHeader">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="header-edit" class="flat-red " name="permissions[]" id="editHeader"
                    @if($permissions['header-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editHeader">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="header-delete" class="flat-red " name="permissions[]" id="deleteHeader"
                    @if($permissions['header-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteHeader">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>

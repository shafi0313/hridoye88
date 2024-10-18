<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">Menu @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>Do you want to allow menus of this role to manage Menu plugin.</p>
        <div>
            <input type="checkbox" value="menu-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageMenu" name="permissions[]" id="ManageMenu"
                @if($permissions['menu-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageMenu">
                Yes, allow menus in this role to manage Menu .

            </label>
        </div>
        <div style="@if($permissions['menu-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageMenu">
            <div>
                <input type="checkbox" value="menu-add" class="flat-red " name="permissions[]" id="createMenu"
                    @if($permissions['menu-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createMenu">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="menu-edit" class="flat-red " name="permissions[]" id="editMenu"
                    @if($permissions['menu-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editMenu">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="menu-delete" class="flat-red " name="permissions[]" id="deleteMenu"
                    @if($permissions['menu-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteMenu">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>

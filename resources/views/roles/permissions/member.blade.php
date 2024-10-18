<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">Member @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>Do you want to allow members of this role to manage Member plugin.</p>
        <div>
            <input type="checkbox" value="member-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageMember" name="permissions[]" id="ManageMember"
                @if($permissions['member-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageMember">
                Yes, allow members in this role to manage Member .

            </label>
        </div>
        <div style="@if($permissions['member-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageMember">
            <div>
                <input type="checkbox" value="member-add" class="flat-red " name="permissions[]" id="createMember"
                    @if($permissions['member-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createMember">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="member-edit" class="flat-red " name="permissions[]" id="editMember"
                    @if($permissions['member-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editMember">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="member-delete" class="flat-red " name="permissions[]" id="deleteMember"
                    @if($permissions['member-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteMember">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>

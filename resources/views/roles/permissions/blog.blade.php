<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">Blog @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>Do you want to allow blogs of this role to manage Blog plugin.</p>
        <div>
            <input type="checkbox" value="blog-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageBlog" name="permissions[]" id="ManageBlog"
                @if($permissions['blog-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageBlog">
                Yes, allow blogs in this role to manage Blog .

            </label>
        </div>
        <div style="@if($permissions['blog-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageBlog">
            <div>
                <input type="checkbox" value="blog-add" class="flat-red " name="permissions[]" id="createBlog"
                    @if($permissions['blog-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createBlog">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="blog-edit" class="flat-red " name="permissions[]" id="editBlog"
                    @if($permissions['blog-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editBlog">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="blog-delete" class="flat-red " name="permissions[]" id="deleteBlog"
                    @if($permissions['blog-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteBlog">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>

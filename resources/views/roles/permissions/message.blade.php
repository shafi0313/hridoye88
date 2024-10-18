<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">Message @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>Do you want to allow messages of this role to manage Message plugin.</p>
        <div>
            <input type="checkbox" value="message-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageMessage" name="permissions[]" id="ManageMessage"
                @if($permissions['message-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageMessage">
                Yes, allow messages in this role to manage Message .
            </label>
        </div>
    </div>
</div>

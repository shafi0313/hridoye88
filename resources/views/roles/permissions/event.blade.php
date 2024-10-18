<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">Event @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>Do you want to allow events of this role to manage Event plugin.</p>
        <div>
            <input type="checkbox" value="event-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageEvent" name="permissions[]" id="ManageEvent"
                @if($permissions['event-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageEvent">
                Yes, allow events in this role to manage Event .

            </label>
        </div>
        <div style="@if($permissions['event-manage'] == 1) display:block @else display:none @endif"
            id="childOfManageEvent">
            <div>
                <input type="checkbox" value="event-add" class="flat-red " name="permissions[]" id="createEvent"
                    @if($permissions['event-add']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="createEvent">
                    @lang('app.create')
                </label>
            </div>
            <div>
                <input type="checkbox" value="event-edit" class="flat-red " name="permissions[]" id="editEvent"
                    @if($permissions['event-edit']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="editEvent">
                    @lang('app.edit')
                </label>
            </div>
            <div>
                <input type="checkbox" value="event-delete" class="flat-red " name="permissions[]" id="deleteEvent"
                    @if($permissions['event-delete']==1) checked @endif>
                <label class="chk-label-margin mx-1" for="deleteEvent">
                    @lang('app.delete')
                </label>
            </div>
        </div>
    </div>
</div>

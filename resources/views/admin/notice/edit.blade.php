<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Notice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onsubmit="ajaxStoreModal(event, this, 'editModal')"
                action="{{ route('admin.notices.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="row gy-2">
                        <div class="col-md-12">
                            <label for="title" class="form-label required">Title </label>
                            <input type="text" name="title" value="{{ $notice->title }}" class="form-control"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="date" class="form-label required">date </label>
                            <input type="date" name="date" value="{{ $notice->date }}" class="form-control"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="file" class="form-label">file </label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="content" class="form-label">Content </label>
                            <textarea name="content" class="form-control note_content">{!! $notice->content !!}</textarea>
                        </div>
                        <div class="col-md-4 form-check form-switch">
                            <label for="is_active" class="form-label status_label d-block">Status </label>
                            <input class="form-check-input" type="checkbox" id="is_active_input" value="1"
                                name="is_active" checked>
                            <label class="form-check-label" for="is_active_input" id="is_active_label">Active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.layouts.includes.summer-note-with-image')

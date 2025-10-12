<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Notice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.notices.update', $notice->id) }}" method="post"
                onsubmit="ajaxStoreModal(event, this, 'editModal')" enctype="multipart/form-data"
                class="form-horizontal">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="required">title </label>
                                <input type="text" name="title" value="{{ $notice->title }}" class="form-control"
                                    id="title" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_id" class="required">Publisher </label>
                                <select name="user_id" id="user_id" class="form-control" required>
                                    <option value="" selected disabled>Select Publisher</option>
                                    @foreach ($users as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ $id == $notice->user_id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date" class="required">Date </label>
                                <input type="date" name="date" value="{{ $notice->date }}" class="form-control"
                                    id="date" required>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="image">Old Image </label>
                                <img src="{{ imagePath('humanitarian', $notice->image) }}" alt="" width="80px">
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="image">Image </label>
                                <input type="file" name="image" class="form-control" id="image" >
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content" class="required">Content </label>
                                <textarea name="content" id="content" class="form-control note_content" required>{!! $notice->content !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.layouts.includes.summer-note-with-image', ['height' => 300])

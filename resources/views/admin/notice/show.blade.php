<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showModalLabel">Show Notice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-md-12">
                        <h4>{{ $notice->title }}</h4>
                        <P style="color: gray">@lang('Published on'): {{ bdDate($notice->date) }}</P><br>

                        @if ($notice->file)
                            @php
                                if (File::extension($notice->file) == 'pdf') {
                                    $file = 'PDF';
                                    $icon = '<i class="fa-solid fa-file-pdf"></i>';
                                } elseif (in_array(File::extension($notice->file), ['doc', 'docx'])) {
                                    $file = 'Word';
                                    $icon = '<i class="fa-solid fa-file-word"></i>';
                                } elseif (in_array(File::extension($notice->file), ['xls', 'xlsx'])) {
                                    $file = 'Excel';
                                    $icon = '<i class="fa-solid fa-file-excel"></i>';
                                } elseif (in_array(File::extension($notice->file), ['jpg', 'jpeg', 'png', 'gif'])) {
                                    $file = 'Image';
                                    $icon = '<i class="fa-solid fa-file-image"></i>';
                                } else {
                                    $file = 'File';
                                    $icon = '<i class="fa-solid fa-file"></i>';
                                }
                            @endphp

                            <a href="{{ asset('uploads/images/notice/' . $notice->file) }}"
                                download="{{ $notice->file }}" class="btn btn-primary">{!! $icon !!} Download
                                {{ $file }}</a>
                            <a href="{{ route('admin.notices.notice_pdf_view', $notice->id) }}"
                                target="_blank" class="btn btn-success">{!! $icon !!} View
                                {{ $file }}</a>
                            <br>
                            <br>
                        @endif

                        {!! $notice->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.includes.summer-note-with-image')

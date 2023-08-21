<div class="modal fade" id="removeAllArticlesModal" tabindex="-1" aria-labelledby="removeAllArticlesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="removeAllArticlesModalLabel">{{__('Deletion Confirmation')}}</h5>
                <button type="button" class="bg-transparent" data-bs-dismiss="modal"><i class="fs-1 bi bi-x-lg"></i></button>
            </div>
            <div class="modal-body">
                <h5>{{ __('Do you really want to delete it?') }}</h5>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-target="#userSettings" data-bs-toggle="modal">{{__('Cancel')}}</button>
                <form action="{{ route('articles.removeAll') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('Bulk deletion') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
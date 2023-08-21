<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">{{__('Delete Account')}}</h5>
        <button type="button" class="bg-transparent" data-bs-dismiss="modal"><i class="fs-1 bi bi-x-lg"></i></button>
      </div>
      <div class="modal-body">
        <p>{{__('Deleting your account is permanent and cannot be undone.')}}</p>
        <p>{{__('For security reasons, the same email address cannot be reused.')}}</p>
        <p>{{__('Please note that article data may remain in our database for a certain period of time after account deletion.')}}</p>
        <form id="delete-account-form" action="{{ route('delete-account') }}" method="post">
          @csrf
          <p style="user-select: none;">{{__('To proceed, type「DeleteNote-KiriAccount」 in the input field below.')}}</p>
          <input type="text" class="form-control text-dark" id="confirmationInput" name="confirmationInput" placeholder="DeleteNote-KiriAccount">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li class="text-dark">{{ __($error) }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-target="#userSettings" data-bs-toggle="modal">{{__('Cancel')}}</button>
        <button type="submit" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-account-form').submit();">{{__('Delete Account')}}</button>
      </div>
    </div>
  </div>
</div>


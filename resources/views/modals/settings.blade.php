<!-- モーダル本体 -->
<div class="modal fade" id="userSettings" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-md">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h2>{{__('Settings')}}</h2>
        <button type="button" class="bg-transparent" data-bs-dismiss="modal"><i class="fs-1 bi bi-x-lg"></i></button>
      </div>

      <!-- ページの内容 -->
      <div class="modal-body">
        
        <div class="container-fluid">
          <div class="row">
            <!-- ページ切り替え用のナビゲーション -->
            <div class="col-md-4">
              <ul class="nav nav-underline border-bottom-0 gap-3" role="tablist">
                <li class="nav-item">
                  <button class="rounded nav-link text-light active" data-bs-toggle="tab" href="#general" aria-selected="true"><i class="bi bi-gear"></i>  {{__('General')}}</button>
                </li>
                <li class="nav-item">
                  <button class="rounded nav-link text-light" data-bs-toggle="tab" href="#database" aria-selected="false"><i class="bi bi-database-gear"></i>  {{__('Data controls')}}</button>
                </li>
              </ul>
            </div>

            <div class="col-md-8">
              <div class="tab-content">
                <div class="tab-pane fade show active" id="general">
                  <!-- ページ1の内容 -->
                  <div class="d-flex flex-column">
                    <div class="mb-3 mt-3">
                      <div class="d-flex align-items-center justify-content-between">
                        <div>{{__('Delete all articles')}}</div>
                        <button class="btn btn-danger" data-bs-target="#removeAllArticlesModal" data-bs-toggle="modal">{{__('Delete')}}</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="database">
                  <!-- ページ2の内容 -->
                  <div class="d-flex flex-column gap-4 pt-2">
                    <div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div>{{__('Shared links')}}</div>
                        <a href="{{ route('shared.index') }}" class="btn btn-primary">{{__('Manage')}}</a>
                      </div>
                    </div>

                    <div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div>{{__('Delete Account')}}</div>
                        <button class="btn btn-danger" data-bs-target="#deleteModal" data-bs-toggle="modal">{{__('Delete')}}</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('modals.remove_all_articles')
@include('modals.delete_account')
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
              <ul class="nav nav-tabs border-bottom-0 gap-3" role="tablist">
                <li class="nav-item">
                  <button class="bg-transparent rounded" data-bs-toggle="tab" href="#general"><i class="bi bi-gear"></i>  {{__('General')}}</button>
                </li>
                <li class="nav-item">
                  <button class="bg-transparent rounded" data-bs-toggle="tab" href="#database"><i class="bi bi-database-gear"></i>  {{__('Data controls')}}</button>
                </li>
              </ul>
            </div>

            <div class="col-md-8">
              <div class="tab-content">
                <div class="tab-pane fade" id="general">
                  <!-- ページ1の内容 -->
                  <div class="d-flex flex-column">
                    <div class="pb-3 mt-3">
                      <div class="d-flex align-items-center justify-content-between">
                        <div>{{__('Clear all articles')}}</div>
                        <button class="btn btn-danger" data-bs-target="#removeAllArticlesModal" data-bs-toggle="modal">{{__('Clear')}}</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="database">
                  <!-- ページ2の内容 -->
                  <div class="d-flex flex-column">
                    <div class="pb-3 mt-3">
                      <div class="d-flex align-items-center justify-content-between">
                        <div>{{__('Shared links')}}</div>
                        <a href="{{ route('shared.index') }}" class="btn btn-primary">{{__('Manage')}}</a>
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
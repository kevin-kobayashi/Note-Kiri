<header class="d-flex align-items-center justify-content-between">
    <button href="#" data-bs-target="#sidebar" data-bs-toggle="offcanvas" class="bg-transparent d-flex rounded-3 p-1"><i class="fs-1 bi bi-book px-1"></i><i class="fs-1 bi bi-arrow-bar-right px-1"></i></button>
    <button class="bg-transparent rounded-3 p-1" href="#" data-bs-toggle="modal" data-bs-target="#userSettings" data-toggle="tooltip" title="{{__('Settings')}}">
        <i class="fs-1 bi bi-gear-wide-connected py-2 px-1"></i>
    </button>
</header>
@include('modals.settings')
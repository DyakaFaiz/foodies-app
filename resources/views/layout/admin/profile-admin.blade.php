<div class="popup-wrap user type-header">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button"
            id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="header-user wg-user">
                <span class="image">
                    <img src="{{ url('') }}/assets/images-admin/avatar/user-1.png" alt="">
                </span>
                <span class="flex flex-column">
                    <span class="body-title mb-2">{{ auth()->user()->name }}</span>
                    <span class="text-tiny">Admin</span>
                </span>
            </span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end has-content"
            aria-labelledby="dropdownMenuButton3">
            <li>
                <div class="user-item">
                    <div class="icon">
                        <i class="icon-log-out"></i>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="body-title-2 border-0">Log out</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>

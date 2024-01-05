<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary ">
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>

        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto overflow-x-hidden">
            {{-- profile --}}
            <div class="row d-block mb-4">
                <div class="col d-flex justify-content-center mb-2">
                    <img src="{{ asset('img/dipa.jpg') }}" alt="photo" width="100px" class="rounded-circle">
                </div>
                <div class="col d-flex justify-content-center">
                    <h5>{{ auth()->user()->nama }}</h5>
                </div>
                <div class="col d-flex justify-content-center">
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 text-body-secondary text-uppercase">
                        <span>{{ (auth()->user()->role == 1) ? 'admin' : 'user' }}</span>
                    </h6>
                </div>
            </div>

            {{-- Menu --}}
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active' : '' }}"
                        aria-current="page" href="/dashboard">
                        <svg class="bi">
                            <use xlink:href="#house-fill" />
                        </svg>
                        HOME
                    </a>
                </li>
            </ul>

            {{-- Menu Administrator --}}
            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Administrator</span>
            </h6>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/user*') ? 'active' : '' }}"
                        href="/dashboard/user">
                        <svg class="bi">
                            <use xlink:href="#people" />
                        </svg>
                        User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/golongan*') ? 'active' : '' }}"
                        href="/dashboard/golongan">
                        <svg class="bi">
                            <use xlink:href="#grid" />
                        </svg>
                        Riwayat Pemesanan 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/pelanggan*') ? 'active' : '' }}"
                        href="/dashboard/pelanggan">
                        <svg class="bi">
                            <use xlink:href="#people" />
                        </svg>
                        Pemesanan
                    </a>
                </li>
            </ul>

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/logout"
                        onclick="return confirm('Yakin ingin logout?');">
                        <svg class="bi">
                            <use xlink:href="#door-closed" />
                        </svg>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
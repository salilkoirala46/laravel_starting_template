<template>
    <aside
        className="app-sidebar bg-body-secondary shadow"
        data-bs-theme="dark"
    >
        <!--begin::Sidebar Brand-->
        <div className="sidebar-brand">
            <a href="./index.html" className="brand-link">
                <img
                    src="dist/assets/img/AdminLTELogo.png"
                    alt="AdminLTE Logo"
                    className="brand-image opacity-75 shadow"
                />
                <span className="brand-text fw-light">Car Sales</span>
            </a>
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div className="sidebar-wrapper">
            <nav className="mt-2">
                <!--begin::Sidebar Menu-->
                <ul
                    className="nav sidebar-menu flex-column"
                    data-lte-toggle="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    <li className="nav-item menu-open">
                        <router-link to="/" className="nav-link active">
                            <i className="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </router-link>
                    </li>
                    <li className="nav-item">
                        <a href="./generate/theme.html" className="nav-link">
                            <i className="nav-icon bi bi-palette"></i>
                            <p>Theme Generate</p>
                        </a>
                    </li>
                </ul>
                <!--end::Sidebar Menu-->
            </nav>
        </div>
        <!--end::Sidebar Wrapper-->
    </aside>
</template>

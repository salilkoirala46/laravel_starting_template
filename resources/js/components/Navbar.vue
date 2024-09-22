<template>
    <nav className="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div className="container-fluid">
            <!--begin::Start Navbar Links-->
            <ul className="navbar-nav">
                <li className="nav-item">
                    <a
                        className="nav-link"
                        data-lte-toggle="sidebar"
                        href="#"
                        role="button"
                    >
                        <i className="bi bi-list"></i>
                    </a>
                </li>
                <li className="nav-item d-none d-md-block">
                    <a href="#" className="nav-link">Home</a>
                </li>
            </ul>
            <!--end::Start Navbar Links-->
            <!--begin::End Navbar Links-->
            <ul className="navbar-nav ms-auto">
                <!--begin::Navbar Search-->
                <li className="nav-item">
                    <a
                        className="nav-link"
                        data-widget="navbar-search"
                        href="#"
                        role="button"
                    >
                        <i className="bi bi-search"></i>
                    </a>
                </li>
                <!--end::Navbar Search-->
                <!--begin::User Menu Dropdown-->
                <li className="nav-item dropdown user-menu">
                    <a
                        href="#"
                        className="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown"
                    >
                        <img
                            src="dist/assets/img/user2-160x160.jpg"
                            className="user-image rounded-circle shadow"
                            alt="User Image"
                        />
                        <span className="d-none d-md-inline"
                            >Alexander Pierce</span
                        >
                    </a>
                    <ul
                        className="dropdown-menu dropdown-menu-lg dropdown-menu-end"
                    >
                        <!--begin::User Image-->
                        <li className="user-header text-bg-primary">
                            <img
                                src="dist/assets/img/user2-160x160.jpg"
                                className="rounded-circle shadow"
                                alt="User Image"
                            />
                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2023</small>
                            </p>
                        </li>
                        <!--end::User Image-->
                    </ul>
                </li>
                <!--end::User Menu Dropdown-->
            </ul>
            <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
    </nav>
</template>

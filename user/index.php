<?php
require('template/header.php');
?>
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper container">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Dashboard</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"><i
                                                        class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Panel</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Selamat Datang</h5>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn dropdown-toggle btn-icon"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal"></i>
                                                </button>
                                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item full-card"><a href="#!"><span><i
                                                                    class="feather icon-maximize"></i>
                                                                maximize</span><span style="display:none"><i
                                                                    class="feather icon-minimize"></i>
                                                                Restore</span></a>
                                                    </li>
                                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                                                    class="feather icon-minus"></i> collapse</span><span
                                                                style="display:none"><i class="feather icon-plus"></i>
                                                                expand</span></a></li>
                                                    <li class="dropdown-item reload-card"><a href="#!"><i
                                                                class="feather icon-refresh-cw"></i> reload</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">Selamat Datang <?= $usr['nama'] ?> di Panel User!
                                            </h4>
                                            <p>Ini Adakah dashboard Pengajuan Duplikat buku nikah</p>
                                            <hr>
                                            <p class="mb-0"></p>
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
<!-- [ Main Content ] end -->
<?php
require('template/footer.php');
?>
<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürünün fotoğrafları
            <a href="#" type="button" class="btn pull-right btn-primary btn-xs btn-outline"><i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">

            <div class="widget-body">


                <form action="../api/dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '../api/dropzone'}">
                    <div class="dz-message">
                        <h3 class="m-h-lg">Drop files here or click to upload.</h3>
                        <p class="m-b-lg text-muted">(This is just a demo dropzone. Selected files are not actually uploaded.)</p>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>

<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürünün fotoğrafları
            <a href="#" type="button" class="btn pull-right btn-primary btn-xs btn-outline"><i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">

            <div class="widget-body">

                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <th>#id</th>
                        <th>Görsel</th>
                        <th>Resim Adı</th>
                        <th>Durumu</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1</td>
                            <td><img width="30" src="<?php echo base_url();?>201.jpg" alt="" class="img-responsive" </td>
                            <td>deneme-urunu.jpg</td>
                            <td>
                                <input
                                        data-url="<?php echo base_url("product/isActiveSetter/"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        data-size="small"
                                    <?php echo (true) ? "checked" : ""; ?>
                                />
                            </td>
                            <td>
                                <button
                                        data-url="<?php echo base_url("product/delete/"); ?>" type="button"
                                        class="btn btn-danger btn-xs btn-outline remove-btn">
                                    <i class="fa fa-trash"></i> Sil
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#1</td>
                            <td><img width="30" src="<?php echo base_url();?>201.jpg" alt="" class="img-responsive" </td>
                            <td>deneme-urunu.jpg</td>
                            <td>
                                <input
                                        data-url="<?php echo base_url("product/isActiveSetter/"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        data-size="small"
                                    <?php echo (true) ? "checked" : ""; ?>
                                />
                            </td>
                            <td>
                                <button
                                        data-url="<?php echo base_url("product/delete/"); ?>" type="button"
                                        class="btn btn-danger btn-xs btn-outline remove-btn">
                                    <i class="fa fa-trash"></i> Sil
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#1</td>
                            <td><img width="30" src="<?php echo base_url();?>201.jpg" alt="" class="img-responsive" </td>
                            <td>deneme-urunu.jpg</td>
                            <td>
                                <input
                                        data-url="<?php echo base_url("product/isActiveSetter/"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        data-size="small"
                                    <?php echo (true) ? "checked" : ""; ?>
                                />
                            </td>
                            <td>
                                <button
                                        data-url="<?php echo base_url("product/delete/"); ?>" type="button"
                                        class="btn btn-danger btn-xs btn-outline remove-btn">
                                    <i class="fa fa-trash"></i> Sil
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#1</td>
                            <td><img width="30" src="<?php echo base_url();?>201.jpg" alt="" class="img-responsive" </td>
                            <td>deneme-urunu.jpg</td>
                            <td>
                                <input
                                        data-url="<?php echo base_url("product/isActiveSetter/"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        data-size="small"
                                    <?php echo (true) ? "checked" : ""; ?>
                                />
                            </td>
                            <td>
                                <button
                                        data-url="<?php echo base_url("product/delete/"); ?>" type="button"
                                        class="btn btn-danger btn-xs btn-outline remove-btn">
                                    <i class="fa fa-trash"></i> Sil
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>



            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>
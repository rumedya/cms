<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün Listesi
            <a href="<?php echo base_url("product/new_form"); ?>" type="button" class="btn pull-right btn-primary btn-xs btn-outline"><i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if(empty($items)){?>
                <div class="alert">
                    <div class="alert alert-info alert-dismissible text-center">
                        <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("product/new_form"); ?>">tıklayınız.</a></p>
                    </div>
                </div>
            <?php }else{ ?>

            <table class="table table-hover table-striped">
                <thead>
                    <th><i class="fa fa-reorder"></i></th>
                    <th>#id</th>
                    <th>Başlık</th>
                    <th>Url</th>
                    <th>Açıklama</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?php echo base_url("product/rankSetter");?>">


                <?php foreach ($items as $item){?>

                <tr id="ord-<?php echo $item->id; ?>">
                    <td><i class="fa fa-reorder"></i></td>
                    <td>#<?php echo $item->id; ?></td>
                    <td><?php echo $item->title; ?></td>
                    <td><?php echo $item->url; ?></td>
                    <td><?php echo $item->description; ?></td>
                    <td>
                        <input
                                data-url="<?php echo base_url("product/isActiveSetter/$item->id"); ?>"
                                class="isActive"
                                type="checkbox"
                                data-switchery
                                data-color="#10c469"
                                data-size="small"
                                <?php echo ($item->isActive) ? "checked" : ""; ?>
                        />
                    </td>
                    <td>
                        <button
                                data-url="<?php echo base_url("product/delete/$item->id"); ?>" type="button"
                                class="btn btn-danger btn-xs btn-outline remove-btn">
                                <i class="fa fa-trash"></i> Sil
                        </button>
                        <a href="<?php echo base_url("product/update_form/$item->id"); ?>" type="button" class="btn btn-info btn-xs btn-outline"><i class="fa fa-pencil"></i> Düzenle</a>
                        <a href="<?php echo base_url("product/image_form/$item->id"); ?>" type="button" class="btn btn-dark btn-xs btn-outline"><i class="fa fa-image"></i> Resimler</a>
                    </td>
                </tr>

                <?php }?>
                </tbody>

            </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>
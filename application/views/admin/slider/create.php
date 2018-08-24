<div class="container-fluid">
    <div class="block-header">
        <h2>
            <?= $title; ?>
        </h2>
    </div>
    <!-- Basic Examples -->
    <?= form_open_multipart('cb-admin/create/slider'); ?>
        <div class="row clearfix">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                    	<div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="title" value="" placeholder="" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="radio-container">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <input name="slide-type" value="type1" type="radio" id="type1" class="with-gap radio-col-black d-none" checked/>
                                    <label for="type1" class="d-none">Type 1</label>
                                    <img class="img-responsive thumbnail type1" src="<?php echo base_url(); ?>assets/uploads/type1.jpg"/>
                                </div>
                                <div class="col-md-6">
                                    <input name="slide-type" value="type2" type="radio" id="type2" class="with-gap radio-col-black d-none" />
                                    <label for="type2" class="d-none">Type 2</label>
                                    <img class="img-responsive thumbnail type2" src="<?php echo base_url(); ?>assets/uploads/type2.png"/>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <p><strong>Slide Image</strong></p>
                                <input name="file" type="file" id="fileUpload" />
                                <img src="" class="imgFile img-responsive thumbnail d-none"/>
                            </div>
                            <div class="col-md-6">
                                <p class="m-t-10"><strong>Star Rating</strong></p>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="star_rating">
                                            <option>--Select Rating--</option>
                                            <?php for ($i = 5; $i <= 100; $i++ ): 
                                                if ($i % 5 == 0): 
                                            ?>
                                                  <option value="<?= $i; ?>%"><?= $i; ?>%</option>
                                            <?php 
                                                endif;
                                            endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="type1Form d-none">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Price</label>
                                                <input type="text" class="form-control" name="price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Discounted Price</label>
                                                <input type="text" class="form-control" name="discount">
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                 <div class="panel-group" id="accordion_2" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne_2">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#publish-panel" href="#publish-panel" aria-expanded="true" aria-controls="collapseOne_2">
                                    Publish <span class="pull-right"><i class="material-icons">keyboard_arrow_down</i></span>
                                </a>
                            </h5>
                        </div>
                        <div id="publish-panel" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                <button type="button" class="btn btn-default waves-effect">Save Draft</button><span class="pull-right"><button type="button" class="btn btn-default waves-effect">Preview</button></span>
                                <div class="m-t-10 demo-icon-container">
                                    <p class="m-t-10 demo-google-material-icon"><i class="material-icons">vpn_key</i>
                                        <span class="icon-name">
                                        Status: <strong>Draft</strong> <a href="javascript:void(0);">Edit</a>
                                    </span></p>

                                    <p class="m-t-10 demo-google-material-icon"><i class="material-icons">visibility</i>
                                        <span class="icon-name">
                                        Visibility: <strong>Draft</strong> <a href="javascript:void(0);">Edit</a>
                                    </span></p>

                                    <p class="m-t-10 demo-google-material-icon"><i class="material-icons">date_range</i>
                                        <span class="icon-name">
                                        Publish: <strong>immediately</strong> <a href="javascript:void(0);">Edit</a>
                                    </span></p>
                                    <hr>
                                    <button type="submit" class="btn btn-primary waves-effect pull-right">Publish</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion_3" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne_3">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#categories-panel" href="#categories-panel" aria-expanded="true" aria-controls="collapseOne_2">
                                    Categories <span class="pull-right"><i class="material-icons">keyboard_arrow_down</i></span>
                                </a>
                            </h5>
                        </div>
                        <div id="categories-panel" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                <?php foreach($categories as $c): ?>
                                    <input type="checkbox" id="md_checkbox_<?= $c->id; ?>" class="chk-col-black"/>
                                    <label for="md_checkbox_<?= $c->id; ?>" style="width:100%;"><?= $c->name; ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion_3" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne_3">
                            <h5 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#featured-image-panel" href="#featured-image-panel" aria-expanded="true" aria-controls="collapseOne_2">
                                    Featured Image <span class="pull-right"><i class="material-icons">keyboard_arrow_down</i></span>
                                </a>
                            </h5>
                        </div>
                        <div id="featured-image-panel" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                <a href="javascript:void(0);">Set Featured Image</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    <?= form_close(); ?>
</div>
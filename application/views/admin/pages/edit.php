<div class="container-fluid">
    <div class="block-header">
        <h2>
            <?= $title; ?>
        </h2>
    </div>
    <!-- Basic Examples -->
    <?= form_open_multipart('cb-admin/edit/page/'.$data->id); ?>
        <div class="row clearfix">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                    	<div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="title" value="<?= $data->title; ?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                        	<a href="<?= base_url() . $data->slug; ?>"><?=  base_url() . $data->slug; ?></a>
                        </div>
                    </div>
                    <div class="body">
                         <textarea id="summernote" name="body">
                            <?= $data->body; ?>
                        </textarea>
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
                                <div class="m-t-10 demo-icon-container">
                                    <p class="m-t-10 demo-google-material-icon"><i class="material-icons">vpn_key</i>
                                        <span class="icon-name">
                                        Status: <strong>Published</strong> <a href="javascript:void(0);">Edit</a>
                                    </span></p>

                                    <p class="m-t-10 demo-google-material-icon"><i class="material-icons">visibility</i>
                                        <span class="icon-name">
                                        Visibility: <strong>Public</strong> <a href="javascript:void(0);">Edit</a>
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